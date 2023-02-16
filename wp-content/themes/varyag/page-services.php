<?php
get_header();
?>

    <main id="primary" class="site-main">

        <?php
        if ( have_posts() ) :

            get_template_part( 'template-parts/content', 'page_services' );

        endif; // End of the loop.
        ?>

    </main><!-- #main -->

<?php
get_footer();
