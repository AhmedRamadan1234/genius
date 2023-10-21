<?php
/**
 * Template Name: Full Screen Slider Three
 */
get_header();
    ?>
    <div class="full-screen-slider">
        <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        ?>
    </div>
    <?php
get_footer('slide');