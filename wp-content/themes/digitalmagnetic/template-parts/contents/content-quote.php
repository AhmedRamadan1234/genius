<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */
?>
<blockquote>
    <?php wavee_get_html_tag('blockquote', get_the_content()) ?>
    <div class="author"><?php the_author() ?></div>
</blockquote>
