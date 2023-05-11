<?php
get_header();

$coaches = new WP_Term_Query( [
    'taxonomy'   => 'coach',
    'hide_empty' => false,
] );
?>
    <div class="top-block op-block—shorter" style="background-image: url(<?=get_template_directory_uri();?>/img/basketback.jpg)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                    </a>
                    <a class="breadcrumbs__link">
                        Тренера
                    </a>
                </div>
                <h1 class="top-block__title">
                    Тренера
                </h1>
            </div>
        </div>
    </div>
    <?php
        get_template_part('template-parts/content', 'coach', [ 'coaches' => $coaches]);
    ?>

<?php get_footer();
