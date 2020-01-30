<?php /* force UTF-8 : éàè */
/**
 * @package WordPress
 * @subpackage _basique-enfant
 */

// Are there comments to navigate through?
if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation" aria-label="<?php _e( 'Previous and next comments', '_basique-enfant' ) ?>">
        <h2 class="screen-reader-text">
            <?php _e( 'Comment navigation', '_basique-enfant' ); ?></h2>
        <div class="nav-links">
            <?php
            if ( $prev_link = get_previous_comments_link( __( 'Older Comments', '_basique-enfant' ) ) ) :
                printf( '<div class="nav-previous">%s</div>', $prev_link );
            endif;

            if ( $next_link = get_next_comments_link( __( 'Newer Comments', '_basique-enfant' ) ) ) :
                printf( '<div class="nav-next">%s</div>', $next_link );
            endif;
            ?>
        </div><!-- .nav-links -->
    </nav><!-- .comment-navigation -->
    <?php
endif;
