<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */
$opt = get_option('wavee_opt');
$read_more = !empty($opt['read_more_btn']) ? $opt['read_more_btn'] : esc_html__('Read More', 'wavee');
?>
<div class="col-lg-4">
<div <?php post_class( 'blog_list_item' ) ?>>
    <?php
    if ( has_post_thumbnail( ) ) {
        echo '<a href="'.get_the_permalink().'">';
            the_post_thumbnail('wavee_710x400');
        echo '</a>';
    }
    ?>
	<style>
	.bottom-left {
		  position: absolute;
		  bottom: 20px;
		  left: 16px;
		padding-right: 20px;
		}.wp-post-image{
			height: 390px !important; width: 100% !important; object-fit: cover !important;    opacity: .7;
		}
</style>
    <div class="b_inner">
        <div class="blog_list_content">
            <div class="b_post_info">
                <div class="p_date" onclick="window.location='<?php wavee_day_link() ?>';">
                    <img class="mainblogimage" src="<?php echo WAVEE_DIR_IMG ?>/blog/calendar.svg" alt="<?php esc_attr_e( 'date image icon', 'wavee'); ?>">
					<div class="bottom-left">
						<a href="<?php the_permalink() ?>">
							<h5 style="color:white;    padding-top: 15px;"><?php the_title() ?></h5>
							<span style="color: white"><?php echo get_the_date() ?></span>
						</a>
					</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
