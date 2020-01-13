<?php /* force UTF-8 : éàè */
/**
 * @package WordPress
 * @subpackage _basique-enfant
 */

$prev_text = __( '<span class="meta-nav">&laquo;</span> %title', '_basique' );
$next_text = __( '%title <span class="meta-nav">&raquo;</span>', '_basique' );

// Links to previous post
$previous_post = get_adjacent_post();
$next_post = get_adjacent_post( false, '', false );

if ( $previous_post || $next_post ):
?>
	<div id="single-post-previous-next-navigation" class="container previous-next-navigation" role="navigation" aria-label="<?php _e( 'Previous and next entries', '_basique' ) ?>">
<?php
	if ( $previous_post ) :
?>
		<div class="previous">
<?php
		previous_post_link( '%link', $prev_text )
?>
		</div>
<?php
	endif;

	if ( $next_post ) :
?>
		<div class="next">
<?php
		next_post_link( '%link', $next_text )
?>
		</div>
<?php
	endif
?>
	</div><!-- #single-post-previous-next-navigation -->
<?php
endif
?>
