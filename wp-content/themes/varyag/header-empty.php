<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri();?>/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri();?>/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri();?>/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?=get_template_directory_uri();?>/favicon/site.webmanifest" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div class="wrapper">
