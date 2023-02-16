<?php

class OptionPage
{
    protected $option_fields = array (
        array (
            'option_name'   => 'vk_link',
            'option_title'  => 'Ссылка на страницу ВКонтакте',
            'section_id'    => 'social_links_id',
            'section_title' => 'Социальные сети',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'yt_link',
            'option_title'  => 'Ссылка на канал в YouTube',
            'section_id'    => 'social_links_id',
            'section_title' => 'Социальные сети',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'whatsaap_link',
            'option_title'  => 'Whatsaap',
            'section_id'    => 'messanger_links_id',
            'section_title' => 'Мессанжеры',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'telegram_link',
            'option_title'  => 'Telegram',
            'section_id'    => 'messanger_links_id',
            'section_title' => 'Мессанжеры',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'tel_1',
            'option_title'  => 'Телефон 1',
            'section_id'    => 'tel_links_id',
            'section_title' => 'Номера телефонов',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'tel_2',
            'option_title'  => 'Телефон 2',
            'section_id'    => 'tel_links_id',
            'section_title' => 'Номера телефонов',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'tel_3',
            'option_title'  => 'Телефон 3',
            'section_id'    => 'tel_links_id',
            'section_title' => 'Номера телефонов',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'email',
            'option_title'  => 'Email',
            'section_id'    => 'address_id',
            'section_title' => 'Арес и режим паботы',
            'callback'      =>  'option_text_field_html'
        ),
        array (
            'option_name'   => 'address',
            'option_title'  => 'Адрес',
            'section_id'    => 'address_id',
            'section_title' => 'Арес и режим паботы',
            'callback'      =>  'option_area_field_html'
        ),
        array (
            'option_name'   => 'work_schedule',
            'option_title'  => 'Режим работы',
            'section_id'    => 'address_id',
            'section_title' => 'Арес и режим паботы',
            'callback'      =>  'option_area_field_html'
        )
    );

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        add_action( 'admin_init',  array( $this,'options_register_setting') );
    }

    public function admin_menu () {
        add_options_page( 'Option Page','Options','manage_options','options_page_slug', array( $this, 'settings_page' ) );
    }

    public function  settings_page () {
        echo '<div class="wrap"><h1>Option Page</h1>';
        echo '<form method="post" action="options.php" novalidate="novalidate">';

        settings_fields( 'custom_option_settings' ); // settings group name
        do_settings_sections( 'options_page_slug' ); // just a page slug
        submit_button();

        echo '</form></div>';
    }

    public function options_register_setting()
    {
        foreach($this->option_fields as $option) {
            $this->register_option_field(
                $option['option_name'],
                $option['option_title'],
                $option['section_id'],
                $option['section_title'],
                $option['callback']
            );
        }
    }

    public function register_option_field($option_id, $option_title, $section_id, $section_title, $callback)
    {
        register_setting(
            'custom_option_settings', // settings group name
            $option_id, // option name
            'sanitize_text_field' // sanitization function
        );
        add_settings_section(
            $section_id, // section ID
            $section_title, // title (if needed)
            '', // callback function (if needed)
            'options_page_slug' // page slug
        );
        add_settings_field(
            $option_id,
            $option_title,
            [$this, $callback], // function which prints the field
            'options_page_slug', // page slug
            $section_id, // section ID
            array(
                'label_for' => $option_id,
                'class' => "{$option_id}-class",
                'name' => $option_id,
            )
        );
    }

    public function option_text_field_html( $args )
    {
        $text = get_option( $args['name'], null );
        printf(
            '<input type="text" id="' . $args['name'] . '" name="' . $args['name'] . '" value="%s" />',
            esc_attr( $text )
        );
    }

    public function option_area_field_html( $args )
    {
        $area = get_option( $args['name'], null );

        wp_editor( $area, $args['name'], ['textarea_rows'=> 4]);
            /*'<textarea id="' . $args['name'] . '" name="' . $args['name'] . '"> %s </textarea>'*/


    }
}

new OptionPage();
