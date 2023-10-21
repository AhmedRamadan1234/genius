<?php
/**
 * Template Name: Full Screen Slider Two
 */
get_header();
    ?>
    <div id="wavescroll">
        <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        ?>
    </div>
    <?php
get_footer('slide');