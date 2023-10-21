<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */
?>
<blockquote <?php post_class( 'blockquote_two' ) ?>>
   <a href="<?php the_permalink() ?>">
           <p> <?php the_title() ?></p>
    </a>
</blockquote>

