<?php
add_action('template_redirect', function () {
    if (is_product()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
});


// Хлебные крошки
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_filter('woocommerce_breadcrumb_defaults', 'wpbl_breadcrumbs');
function wpbl_breadcrumbs()
{
    return array(
        'delimiter' => ' | ', // Меняем разделитель
        'wrap_before' => '<nav class="woocommerce-breadcrumb wpbl_custom" itemprop="breadcrumb">', // Добавляем CSS класс wpbl_custom
        'wrap_after' => '</nav>',
        'before' => '<span>',
        'after' => '</span>',
        'home' => _x('Главнвя', 'breadcrumb', 'woocommerce')
    );
}

function custom_pre_get_posts_query($query)
{
    if ($query->is_main_query() && !is_admin() && $query->is_post_type_archive('product')) {
        $tax_query = (array)$query->get('tax_query');
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array('abonementy'),
            'operator' => 'NOT IN'
        );
        $query->set('tax_query', $tax_query);
    }
}

add_action('woocommerce_product_query', 'custom_pre_get_posts_query');

if (wp_doing_ajax()) {
    add_action('wp_ajax_alx_cart_recalculate_price_by_qty', 'alx_cart_recalculate_price_by_qty');
    add_action('wp_ajax_nopriv_alx_cart_recalculate_price_by_qty', 'alx_cart_recalculate_price_by_qty');
}
function alx_cart_recalculate_price_by_qty()
{
    $status = 0;
    setcookie('_recalculate', null, time() - 3600,);
    $_COOKIE['_recalculate'] = null;
    $qty = trim($_POST["qty"]);
    $product_id = trim($_POST["product_id"]);
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item["product_id"] == $product_id) {
            if (WC()->cart->set_quantity($cart_item_key, $qty)) {
                $status = 1;
            }
        }
    }
    $result = recalculate_price_by_bonuses();

    echo json_encode(['status' => 1, 'data' => ['total_cost' => $result['total_cost'], 'bonuses' => $result['bonuses']]]);
    wp_die();
}

//if (wp_doing_ajax()) {
add_action('wp_ajax_alx_cart_recalculate_price_by_bonuses', 'alx_cart_recalculate_price_by_bonuses');
add_action('wp_ajax_nopriv_alx_cart_recalculate_price_by_bonuses', 'alx_cart_recalculate_price_by_bonuses');
//}

function alx_cart_recalculate_price_by_bonuses()
{
    $result = recalculate_price_by_bonuses();
    if (empty($result)) {
        echo json_encode(['status' => 0, 'data' => ['message' => 'У вас недостаточное<br> количество бонусов!']]);
    } else {
        echo json_encode(['status' => 1, 'data' => ['total_cost' => $result['total_cost'], 'bonuses' => $result['bonuses']]]);
    }

    wp_die();
}

function get_bonuses_info()
{
    $user_id = (int)wp_get_current_user()->id;
    $user_bonuses = new \inc\Classes\UserBonuses();
    $bonuses = (int)($user_bonuses->getAllUserBonuses($user_id))->bonuses;
    $total_cost = (int)WC()->cart->get_cart_contents_total();

    $percent = (int)WC()->cart->get_total_discount() ?? floor((20 / $total_cost) * 100);
    if ($bonuses >= $percent) {
        $total_cost_new = $total_cost - $percent;
        return ['total_cost' => $total_cost, 'diff' => $total_cost - $total_cost_new, 'total_cost_new' => $total_cost_new];
    } else {
        return [];
    }
}


function get_percent_sum($total_cost, $bonuses, $max_percent)
{
    $full_percent = 100;
    $percent_current = $bonuses / ($total_cost / $full_percent);
    $factual_percent = ($bonuses / $total_cost) * 100;
    $percent_to_calculation = $max_percent;

    if ($factual_percent < $max_percent)
        $percent_to_calculation = $factual_percent;

    return ($total_cost / $full_percent) * $percent_to_calculation;

}

function allow_percent($total_cost, $bonuses, $max_percent)
{
    $percent_current = $bonuses / ($total_cost / 100);
    return $percent_current;

}

function recalculate_price_by_bonuses()
{
    $cart = WC()->cart;
    $item_count = $cart->get_cart_contents_count();

    $max_percent = 20;
    $data_cookie = [];
    $user_id = (int)wp_get_current_user()->id;
    $user_bonuses = new \inc\Classes\UserBonuses();
    if (empty($_COOKIE['_recalculate'])) {
        $bonuses = (int)($user_bonuses->getAllUserBonuses($user_id))->bonuses;
    } else {
        $bonuses = json_decode(base64_decode($_COOKIE['_recalculate']), true)[$user_id]['user_bonuses'];
    }

    $total_cost = (int)WC()->cart->get_displayed_subtotal();
    $allow_percent = allow_percent($total_cost, $bonuses, $max_percent);
    if ($user_bonuses) {

        $percent_sum = (int)get_percent_sum($total_cost, $bonuses, $max_percent);

        $total_cost_new = $total_cost - $percent_sum;
        $cart_total_session = WC()->session->get('cart_totals');
        $cart_total_session['total'] = $total_cost_new;
        $cart_total_session['cart_contents_total'] = $total_cost_new;
        $cart_total_session['subtotal'] = $total_cost_new;
        WC()->session->set('cart_totals', $cart_total_session);

        $data_cookie[$user_id] = [
            'total_cost_new' => $total_cost_new,
            'user_bonuses' => $bonuses,
            'user_id' => $user_id,
            'item_count' => $item_count,
            'allowed_user_bonuses' => $percent_sum,
            'total_cost' => $total_cost,
            'percent' => $allow_percent,
            'finish' => 0,
        ];

        WC()->cart->set_cart_contents_total((string)$total_cost_new);
        WC()->cart->set_discount_total($allow_percent);
        WC()->cart->calculate_totals();
        WC()->cart->maybe_set_cart_cookies();

        $data_cookie_serialized = base64_encode(json_encode($data_cookie));
        setcookie('_recalculate', $data_cookie_serialized, time() + 3600 * 24, '/');
        $bonuses = json_decode(base64_decode($_COOKIE['_recalculate']), true)[$user_id];

        return ['total_cost' => $total_cost_new, 'bonuses' => $total_cost - $total_cost_new];
    } else {
        return [];
    }
}


add_action('woocommerce_cart_calculate_fees', 'add_custom_total_sum');
function add_custom_total_sum($cart)
{
    $user_id = (int)wp_get_current_user()->id;

    if (!empty($_COOKIE['_recalculate'])) {
        $cookies_data = json_decode(base64_decode($_COOKIE['_recalculate']), true)[$user_id];

        $cart->add_fee('Списаные бонусы', $cookies_data['allowed_user_bonuses'] * -1);
    }


}


add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_update_order_meta');

function my_custom_checkout_update_order_meta($order_id)
{
    $user_id = (int)wp_get_current_user()->id;
    $cookies_data = json_decode(base64_decode($_COOKIE['_recalculate']), true)[$user_id];
    $user_bonuses = new \inc\Classes\UserBonuses();
    $user_bonuses->setUserBonusByUserId($cookies_data['user_bonuses'] - $cookies_data['allowed_user_bonuses'], $cookies_data['user_id']);
    $user_bonuses = json_decode(base64_decode($_COOKIE['_recalculate']), true)[$user_id]['allowed_user_bonuses'];
}

//TODO потом удалить, сначала тест (ЛЕША Я ПОМНЮ)
//add_filter('woocommerce_calculated_total', 'alx_custom_calculated_total', 10, 2);
//function alx_custom_calculated_total($total, $cart)
//{
//    // Вычисляем новую общую стоимость заказа
//    $new_total = 199;
//
//    // Возвращаем новую общую стоимость заказа
//    return $new_total;
//}


if (wp_doing_ajax()) {
    add_action('wp_ajax_alx_cart_clear', 'alx_cart_clear');
    add_action('wp_ajax_nopriv_alx_cart_clear', 'alx_cart_clear');
}
function alx_cart_clear()
{
    $cart = new WC_Cart();
    $cart->empty_cart($clear_persistent_cart = true);
    setcookie('_recalculate', null, time() - 3600,);
    $_COOKIE['_recalculate'] = null;
    wp_die();
}

//Forms
if (!function_exists('woocommerce_form_field')) {

    /**
     * Outputs a checkout/address form field.
     *
     * @param string $key Key.
     * @param mixed $args Arguments.
     * @param string $value (default: null).
     * @return string
     */
    function woocommerce_form_field_alx($key, $args, $value = null)
    {
        $defaults = array(
            'type' => 'text',
            'label' => '',
            'description' => '',
            'placeholder' => '',
            'maxlength' => false,
            'required' => false,
            'autocomplete' => false,
            'id' => $key,
            'class' => array(),
            'label_class' => array(),
            'input_class' => array(),
            'return' => false,
            'options' => array(),
            'custom_attributes' => array(),
            'validate' => array(),
            'default' => '',
            'autofocus' => '',
            'priority' => '',
        );

        $args = wp_parse_args($args, $defaults);
        $args = apply_filters('woocommerce_form_field_args', $args, $key, $value);

        if (is_string($args['class'])) {
            $args['class'] = array($args['class']);
        }

        if ($args['required']) {
            $args['class'][] = 'validate-required';
            $required = '&nbsp;<abbr class="required" title="' . esc_attr__('required', 'woocommerce') . '">*</abbr>';
        } else {
            $required = '&nbsp;<span class="optional">(' . esc_html__('optional', 'woocommerce') . ')</span>';
        }

        if (is_string($args['label_class'])) {
            $args['label_class'] = array($args['label_class']);
        }

        if (is_null($value)) {
            $value = $args['default'];
        }

        // Custom attribute handling.
        $custom_attributes = array();
        $args['custom_attributes'] = array_filter((array)$args['custom_attributes'], 'strlen');

        if ($args['maxlength']) {
            $args['custom_attributes']['maxlength'] = absint($args['maxlength']);
        }

        if (!empty($args['autocomplete'])) {
            $args['custom_attributes']['autocomplete'] = $args['autocomplete'];
        }

        if (true === $args['autofocus']) {
            $args['custom_attributes']['autofocus'] = 'autofocus';
        }

        if ($args['description']) {
            $args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
        }

        if (!empty($args['custom_attributes']) && is_array($args['custom_attributes'])) {
            foreach ($args['custom_attributes'] as $attribute => $attribute_value) {
                $custom_attributes[] = esc_attr($attribute) . '="' . esc_attr($attribute_value) . '"';
            }
        }

        if (!empty($args['validate'])) {
            foreach ($args['validate'] as $validate) {
                $args['class'][] = 'validate-' . $validate;
            }
        }

        $field = '';
        $label_id = $args['id'];
        $sort = $args['priority'] ? $args['priority'] : '';
        $field_container = '<div class="form__input form-row %1$s" id="%2$s" data-priority="' . esc_attr($sort) . '">%3$s</div>';

        switch ($args['type']) {
            case 'country':
                $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

                if (1 === count($countries)) {

                    $field .= '<strong>' . current(array_values($countries)) . '</strong>';

                    $field .= '<input type="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="' . current(array_keys($countries)) . '" ' . implode(' ', $custom_attributes) . ' class="country_to_state" readonly="readonly" />';

                } else {
                    $data_label = !empty($args['label']) ? 'data-label="' . esc_attr($args['label']) . '"' : '';

                    $field = '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="country_to_state country_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder'] ? $args['placeholder'] : esc_attr__('Select a country / region&hellip;', 'woocommerce')) . '" ' . $data_label . '><option value="">' . esc_html__('Select a country / region&hellip;', 'woocommerce') . '</option>';

                    foreach ($countries as $ckey => $cvalue) {
                        $field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . esc_html($cvalue) . '</option>';
                    }

                    $field .= '</select>';

                    $field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__('Update country / region', 'woocommerce') . '">' . esc_html__('Update country / region', 'woocommerce') . '</button></noscript>';

                }

                break;
            case 'state':
                /* Get country this state field is representing */
                $for_country = isset($args['country']) ? $args['country'] : WC()->checkout->get_value('billing_state' === $key ? 'billing_country' : 'shipping_country');
                $states = WC()->countries->get_states($for_country);

                if (is_array($states) && empty($states)) {

                    $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

                    $field .= '<input type="hidden" class="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="" ' . implode(' ', $custom_attributes) . ' placeholder="' . esc_attr($args['placeholder']) . '" readonly="readonly" data-input-classes="' . esc_attr(implode(' ', $args['input_class'])) . '"/>';

                } elseif (!is_null($for_country) && is_array($states)) {
                    $data_label = !empty($args['label']) ? 'data-label="' . esc_attr($args['label']) . '"' : '';

                    $field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="state_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder'] ? $args['placeholder'] : esc_html__('Select an option&hellip;', 'woocommerce')) . '"  data-input-classes="' . esc_attr(implode(' ', $args['input_class'])) . '" ' . $data_label . '>
						<option value="">' . esc_html__('Select an option&hellip;', 'woocommerce') . '</option>';

                    foreach ($states as $ckey => $cvalue) {
                        $field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . esc_html($cvalue) . '</option>';
                    }

                    $field .= '</select>';

                } else {

                    $field .= '<input type="text" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($value) . '"  placeholder="' . esc_attr($args['placeholder']) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" ' . implode(' ', $custom_attributes) . ' data-input-classes="' . esc_attr(implode(' ', $args['input_class'])) . '"/>';

                }

                break;
            case 'textarea':
                $field .= '<div class="form__input form__input--area">
                        <textarea id="text" name="' . esc_attr($key) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '" ' . (empty($args['custom_attributes']['rows']) ? ' rows="2"' : '') . (empty($args['custom_attributes']['cols']) ? ' cols="5"' : '') . implode(' ', $custom_attributes) . '>' . esc_textarea($value) . '</textarea>
                        </div>';

                break;
            case 'checkbox':
                $field = '<label class="checkbox ' . implode(' ', $args['label_class']) . '" ' . implode(' ', $custom_attributes) . '>
						<input type="' . esc_attr($args['type']) . '" class="input-checkbox ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="1" ' . checked($value, 1, false) . ' /> ' . $args['label'] . $required . '</label>';

                break;
            case 'text':
                $field .= '<div class="form__input">
                        <input type="' . esc_attr($args['type']) . '" name="' . esc_attr($key) . '" id="name"  placeholder="' . esc_attr($args['placeholder']) . '"  value="' . esc_attr($value) . '" ' . implode(' ', $custom_attributes) . ' />
                        </div>';
                break;
            case 'password':
            case 'datetime':
            case 'datetime-local':
            case 'date':
            case 'month':
            case 'time':
            case 'week':
            case 'number':
            case 'email':
            case 'url':
            case 'tel':
                $field .= '<div class="form__input">
                    <input id="phone" type="' . esc_attr($args['type']) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '"  value="' . esc_attr($value) . '" ' . implode(' ', $custom_attributes) . ' />
                    </div>';

                break;
            case 'hidden':
                $field .= '<input type="' . esc_attr($args['type']) . '" class="input-hidden ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="' . esc_attr($value) . '" ' . implode(' ', $custom_attributes) . ' />';

                break;
            case 'select':
                $field = '';
                $options = '';

                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        if ('' === $option_key) {
                            // If we have a blank option, select2 needs a placeholder.
                            if (empty($args['placeholder'])) {
                                $args['placeholder'] = $option_text ? $option_text : __('Choose an option', 'woocommerce');
                            }
                            $custom_attributes[] = 'data-allow_clear="true"';
                        }
                        $options .= '<option value="' . esc_attr($option_key) . '" ' . selected($value, $option_key, false) . '>' . esc_html($option_text) . '</option>';
                    }

                    $field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder']) . '">
							' . $options . '
						</select>';
                }

                break;
            case 'radio':
                $label_id .= '_' . current(array_keys($args['options']));

                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        $field .= '<input type="radio" class="input-radio ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($option_key) . '" name="' . esc_attr($key) . '" ' . implode(' ', $custom_attributes) . ' id="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '"' . checked($value, $option_key, false) . ' />';
                        $field .= '<label for="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '" class="radio ' . implode(' ', $args['label_class']) . '">' . esc_html($option_text) . '</label>';
                    }
                }

                break;
        }

        if (!empty($field)) {
            $field_html = '';

            if ( $args['label'] && 'checkbox' !== $args['type'] ) {
                $field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . wp_kses_post( $args['label'] ) . $required . '</label>';
            }

            $field_html .= '<span class="woocommerce-input-wrapper">' . $field;

            if ($args['description']) {
                $field_html .= '<span class="description" id="' . esc_attr($args['id']) . '-description" aria-hidden="true">' . wp_kses_post($args['description']) . '</span>';
            }

            $field_html .= '</span>';

            $container_class = esc_attr(implode(' ', $args['class']));
            $container_id = esc_attr($args['id']) . '_field';
            $field = sprintf($field_container, $container_class, $container_id, $field_html);
        }

        /**
         * Filter by type.
         */
        $field = apply_filters('woocommerce_form_field_' . $args['type'], $field, $key, $args, $value);

        /**
         * General filter on form fields.
         *
         * @since 3.4.0
         */
        $field = apply_filters('woocommerce_form_field', $field, $key, $args, $value);

        if ($args['return']) {
            return $field;
        } else {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $field;
        }
    }
}
