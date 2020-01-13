<?php /* force UTF-8 : éàè */
/**
 * @package WordPress
 * @subpackage _basique-enfant
 **/

the_post()
?>
	<section id="post-<?php the_ID() ?>" <?php post_class( 'container' ) ?>>
		<header class="entry-header section-header">
			<?php if ( $thumb = get_the_post_thumbnail( get_the_ID(), 'medium' ) ) {
				echo '<div class="entry-thumbnail">' . $thumb . '</div>';
			} ?>
			<?php _basique_page_title( array(
				'before' => '<h1 class="entry-header section-header entry-title section-title">',
			)) ?>
			<div class="entry-meta section-meta entry-meta-top section-meta-top">
				<div class="entry-published"><?php printf( __( 'Published on %1$s at %2$s', '_basique-enfant' ), get_the_date( __( 'Y/m/d', '_basique-enfant' ) ), get_the_time( __( 'G:i', '_basique-enfant' ) ) ) ?></div>
				<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ?><div class="entry-share at-above-post addthis-toolbox addthis-toolbox-_basique-enfant"><?php _e( 'Share', '_basique-enfant' ); ADDTOANY_SHARE_SAVE_KIT( array( 'linkname' => get_the_title(), 'linkurl' => wp_get_shortlink() ) ); ?></div><?php } ?>
			</div>
		</header>
		<div class="entry-content section-content">
			<?php the_content() ?>
		</div><!-- .entry-content -->
		<footer class="entry-footer section-footer">
<?php
			edit_post_link( __( '(Edit)', '_basique' ), '<div class="entry-edit"><span class="edit-link">', '</span></div>' . PHP_EOL );

			wp_link_pages( apply_filters( '_basique_entry_pagination', array(
				'before'           => '<div class="pagination container"><span class="label">' . __( 'Pages : ', '_basique' ) . '</span>',
				'after'            => '</div>' . PHP_EOL,
				'link_before'      => '<span class="page-number">',
				'link_after'       => '</span>',
				'nextpagelink'     => '<span class="next-page">' . __( 'Next page <span class="meta-nav">&raquo;</span>', '_basique' ) . '</span>',
				'previouspagelink' => '<span class="previous-page">' . __( '<span class="meta-nav">&laquo;</span> Previous page', '_basique' ) . '</span>',
			)));
?>
			<div class="entry-meta section-meta entry-meta-bottom section-meta-bottom">
				<div class="entry-published"><?php printf( __( 'Published on %1$s at %2$s', '_basique-enfant' ), get_the_date( __( 'Y/m/d', '_basique-enfant' ) ), get_the_time( __( 'G:i', '_basique-enfant' ) ) ) ?></div>
				<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ?><div class="entry-share at-below-post addthis-toolbox addthis-toolbox-_basique-enfant"><?php _e( 'Share', '_basique-enfant' ); ADDTOANY_SHARE_SAVE_KIT( array( 'linkname' => get_the_title(), 'linkurl' => wp_get_shortlink() ) ); ?></div><?php } ?>
			</div>
		</footer><!-- .entry-footer -->
	</section><!-- #post-<?php the_ID() ?> -->
<?php
get_template_part( 'partials/navigations/single', 'post' );

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template( '/partials/comments/comments.php' );
endif;
?>
