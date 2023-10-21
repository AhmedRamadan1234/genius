<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
$is_comments = get_comments_number() > 0 ? 'have_comments' : 'no_comments';
?>

<?php if ( have_comments() ) : ?>
    <div class="comment_list_info <?php echo esc_attr($is_comments); ?>">

        <h2 class="c_title"> <?php wavee_comment_count( get_the_ID() ) ?> </h2>

        <ul class="p_comment_list list-unstyled">
            <?php
            wp_list_comments(
                array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'callback'    => 'wavee_comments',
                ),
                get_comments(array(
                    'post_id' => get_the_ID(),
                ))
            );
            the_comments_navigation();
            ?>
        </ul>
    </div>
<?php endif; ?>

<div class="comment_box">
    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wavee' ); ?></p>
    <?php
    endif;
    ?>
    <?php
    $commenter      = wp_get_current_commenter();
    $req            = get_option( 'require_name_email' );
    $aria_req       = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '<div class="col-lg-6"> <div class="form-group text_box"> <input type="text" name="author" id="name" value="'.esc_attr($commenter['comment_author']).'" placeholder="'.esc_attr__('Your Name', 'wavee').'" '.$aria_req.'></div> </div>',
        'email'	=> '<div class="col-lg-6"> <div class="form-group text_box"> <input type="email" name="email" id="email" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="'.esc_attr__('Your Email', 'wavee').'" '.$aria_req.'> </div></div>',
    );

    $comments_args = array(
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
        'id_form'               => 'contactForm',
        'class_form'            => 'row contact_form_box',
        'class_submit'          => 'p_btn',
        'label_submit'          => esc_html__( 'Submit Now', 'wavee' ),
        'title_reply_before'    => '<h2 class="c_title">',
        'title_reply'           => esc_html__('Leave a comment', 'wavee'),
        'title_reply_after'     => '</h2>',
        'comment_notes_before'  => '',
        'comment_field'         => '<div class="text_area col-lg-12"> <div class="form-group text_box"> <textarea name="comment" id="comment" placeholder="'.esc_attr__('Enter Your Comment . . .', 'wavee').'"></textarea> </div></div>',
        'comment_notes_after'   => '',
    );
    comment_form($comments_args);
    ?>
</div>