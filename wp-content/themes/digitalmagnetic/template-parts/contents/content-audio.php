<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */
$allowed_html = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
    'iframe' => array(
        'src' => array(),
    )
);
$opt = get_option('wavee_opt');
$read_more = !empty($opt['read_more_btn']) ? $opt['read_more_btn'] : esc_html__('Read More', 'wavee');
$audio_url = function_exists('get_field') ? get_field('audio_url') : '';
?>
<div <?php post_class( 'blog_audio_item' ) ?>>
    <?php if ($audio_url) : ?>
        <audio id="player2" class="mejs__player" preload="none" controls>
            <source src="<?php echo esc_url($audio_url) ?>" type="audio/mp3">
        </audio>
    <?php endif; ?>
    <div class="b_inner">
        <div class="blog_list_content">
            <div class="b_post_info">
                <div class="p_tag">
                    <?php the_category( ' ' ); ?>
                </div>
                <div class="p_date" onclick="window.location='<?php wavee_day_link() ?>';">
                    <img src="<?php echo WAVEE_DIR_IMG ?>/blog/calendar.svg" alt="<?php esc_attr_e( 'date image icon', 'wavee'); ?>">
                    <?php echo get_the_date() ?>
                </div>
            </div>
            <a href="<?php the_permalink() ?>">
                <h2> <?php the_title() ?> </h2>
            </a>
            <div class="d-flex justify-content-between">
                <a href="<?php the_permalink() ?>" class="read_btn">
                    <?php echo esc_html( $read_more ) ?>
                    <i class="arrow_triangle-right"></i>
                </a>
                <a href="<?php the_permalink() ?>" class="comment_btn">
                    <img src="<?php echo WAVEE_DIR_IMG ?>/blog/comment-icon.svg" alt="<?php esc_attr_e( 'comment image icon', 'wavee' ); ?>">
                    <?php wavee_comment_count( get_the_ID() ); ?>
                </a>
            </div>
        </div>
    </div>
</div>