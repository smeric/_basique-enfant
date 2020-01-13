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
		<h2 class="comments-title"><?php
			printf( _nx(
				'One thought on &ldquo;%2$s&rdquo;',
				'%1$s thoughts on &ldquo;%2$s&rdquo;',
				get_comments_number(),
				'comments title',
				'_basique-enfant' ),
				number_format_i18n( get_comments_number() ),
				get_the_title()
			)
		?></h2>
<?php
		get_template_part( 'partials/navigations/comments' )
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
		get_template_part( 'partials/navigations/comments' )
?>
	</section><!-- #comments -->
<?php
}
?>
	<section id="social" class="comment-form">
<?php
		if ( comments_open() ) {
			if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
?>
		<p class="must-log-in"><?php
			printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', '_basique-enfant' ),
				wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
			)
		?></p>
<?php
				do_action( 'comment_form_must_log_in_after' );
			}

			echo Social_Comment_Form::instance( get_the_ID() );
		}
		else {
			do_action( 'comment_form_comments_closed' );
?>
		<p class="nocomments"><?php _e( 'Comments are closed.', '_basique-enfant' ) ?></p>
<?php
		}
?>
	</section><!-- #social -->
