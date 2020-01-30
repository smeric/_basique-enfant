<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage _basique-enfant
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

if ( have_comments() ) {
    ?>
    <section id="comments" class="comments-area">
        <h2 class="comments-title">
            <?php
            printf( _nx(
                'One thought on &ldquo;%2$s&rdquo;',
                '%1$s thoughts on &ldquo;%2$s&rdquo;',
                get_comments_number(),
                'comments title',
                '_basique-enfant' ),
                number_format_i18n( get_comments_number() ),
                get_the_title()
            );
            ?>
        </h2>
        <?php
        get_template_part( 'partials/navigations/comments' );
        ?>
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 56,
            ))
            ?>
        </ol><!-- .comment-list -->
        <?php
        get_template_part( 'partials/navigations/comments' );
        ?>
    </section><!-- #comments -->
<?php
}
?>

<section id="comment-form" class="comments-area">
<?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', '_basique-enfant' ) ?></p>
        <?php
    }

    $post_id        = get_the_ID();
    $commenter      = wp_get_current_commenter();
    $user           = wp_get_current_user();
    $user_identity  = $user->exists() ? $user->display_name : '';
    $req            = get_option( 'require_name_email' );
    $aria_req       = ( $req ? " aria-required='true'" : '' );
    $html_req       = ( $req ? " required='required'" : '' );
    $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
    $html5          = 'html5' === $args['format'];
    $required_text  = sprintf( ' ' . __('Required fields are marked %s', '_basique-enfant'), '<span class="required">*</span>' );

    $fields   =  array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', '_basique-enfant' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', '_basique-enfant' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
    );

    $args = array(
        'fields'               => $fields,
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" required="required"></textarea></p>',
        /** This filter is documented in wp-includes/link-template.php */
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', '_basique-enfant' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        /** This filter is documented in wp-includes/link-template.php */
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', '_basique-enfant' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.', '_basique-enfant' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
        'comment_notes_after'  => '',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_submit'         => 'submit',
        'name_submit'          => 'submit',
        'title_reply'          => __( 'Leave a Reply', '_basique-enfant' ),
        'title_reply_to'       => __( 'Leave a Reply to %s', '_basique-enfant' ),
        'cancel_reply_link'    => __( 'Cancel reply', '_basique-enfant' ),
        'label_submit'         => __( 'Post Comment', '_basique-enfant' ),
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'format'               => 'xhtml',
    );

    comment_form( $args );
?>
</section><!-- #comment-form -->


