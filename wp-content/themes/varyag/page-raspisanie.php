<?php
get_header();

?>

<?php the_content();?>
    <div class="container">
        <div class="calendar-block">
            <div class="calendar-block__img">
                <img src="<?=get_template_directory_uri();?>/img/schedule.png" alt="raspisanie" width="100%">
            </div>
        </div>
    </div>
<?php get_footer();
