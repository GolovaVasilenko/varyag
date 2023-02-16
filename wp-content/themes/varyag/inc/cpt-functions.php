<?php

function cptui_register_my_taxes() {

    /**
     * Taxonomy: Тренера.
     */

    $labels = [
        "name" => esc_html__( "Тренера", "varyag" ),
        "singular_name" => esc_html__( "Тренер", "varyag" ),
    ];


    $args = [
        "label" => esc_html__( "Тренера", "varyag" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'coach', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "coach",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "coach", [ "discipline" ], $args );

    /**
     * Taxonomy: Сервисы.
     */

    $labels = [
        "name" => esc_html__( "Сервисы", "varyag" ),
        "singular_name" => esc_html__( "Сервис", "varyag" ),
    ];


    $args = [
        "label" => esc_html__( "Сервисы", "varyag" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'services', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "services",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "services", [ "discipline" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


function cptui_register_my_cpts_discipline() {

    /**
     * Post Type: Disciplines.
     */

    $labels = [
        "name" => esc_html__( "Disciplines", "varyag" ),
        "singular_name" => esc_html__( "Discipline", "varyag" ),
        "menu_name" => esc_html__( "Дисциплины", "varyag" ),
        "all_items" => esc_html__( "Дисциплины", "varyag" ),
        "add_new" => esc_html__( "Добавить", "varyag" ),
        "add_new_item" => esc_html__( "Добавить Дисциплину", "varyag" ),
        "edit_item" => esc_html__( "Редактировать", "varyag" ),
        "new_item" => esc_html__( "Дисциплина", "varyag" ),
        "view_item" => esc_html__( "Дисциплину", "varyag" ),
        "view_items" => esc_html__( "Дисциплины", "varyag" ),
        "search_items" => esc_html__( "Дисциплину", "varyag" ),
        "not_found" => esc_html__( "Дисциплины", "varyag" ),
    ];

    $args = [
        "label" => esc_html__( "Disciplines", "varyag" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "discipline",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "discipline", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
        "taxonomies" => [ "coach", "services" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "discipline", $args );

    $labels = [
        "name" => esc_html__( "Sales", "varyag" ),
        "singular_name" => esc_html__( "Sale", "varyag" ),
        "menu_name" => esc_html__( "Акции", "varyag" ),
        "all_items" => esc_html__( "Акции", "varyag" ),
        "add_new" => esc_html__( "Добавить", "varyag" ),
        "add_new_item" => esc_html__( "Добавить Акцию", "varyag" ),
        "edit_item" => esc_html__( "Редактировать", "varyag" ),
        "new_item" => esc_html__( "Акция", "varyag" ),
        "view_item" => esc_html__( "Акцию", "varyag" ),
        "view_items" => esc_html__( "Акции", "varyag" ),
        "search_items" => esc_html__( "Акцию", "varyag" ),
        "not_found" => esc_html__( "Акции", "varyag" ),
    ];

    $args = [
        "label" => esc_html__( "Sales", "varyag" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "sales",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "sales", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
        "taxonomies" => [],
        "show_in_graphql" => false,
    ];
    register_post_type("sales", $args );
}

add_action( 'init', 'cptui_register_my_cpts_discipline' );

