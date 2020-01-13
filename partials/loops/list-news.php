<?php /* force UTF-8 : éàè */
/**
 * @package WordPress
 * @subpackage _basique-enfant
 **/

?>
	<section id="page-list" class="container">
		<?php _basique_page_title() ?>
<?php
		/* Permet l'affichage du lien "lire la suite..." lorsque le tag <!--more--> est présent */
		global $more;

		/* Requête personnalisée */
		$args = apply_filters( '_basique_news_page_template_query_args', array(
			'post_type' => 'post',
			'paged'     => $paged,
		));
		$wp_query = new WP_Query( $args );
?>
		<ul class="posts-list section-content">
<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post(); 
?>
					<li id="post-<?php the_ID() ?>" <?php post_class() ?>>
						<?php if ( $thumb = get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) ) {
							echo '<div class="entry-thumbnail"><a href="'. get_permalink() . '">' . $thumb . '</a></div>';
						} ?>

						<h2 class="entry-header entry-title">
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</h2>
<?php
							/* Permet l'affichage du lien "lire la suite..." lorsque le tag <!--more--> est présent */
							$more = 0;
?>
						<div class="entry-content">
							<?php _basique_enfant_excerpt( '_basique_enfant_excerptlength_index', '_basique_enfant_excerptmore', '_basique_enfant_excerptreadmore' ) ?>
						</div>
					</li>
<?php
				endwhile;

			/* liste vide */
			else :
?>
			<li id="post-0" class="not-found last first post-0 post type-post status-publish format-standard hentry">
				<h2 class="entry-header entry-title">
					<?php _e( 'Not Found', '_basique' ) ?>
				</h2>
				<p class="entry-content"><?php _e( 'Sorry, but you are looking for something that isn&#8217;t here.', '_basique' ) ?></p>
			</li>
<?php
			endif;
?>
		</ul>
		<footer class="section-footer">
<?php
			get_template_part( 'partials/navigations/list', 'news' );
?>
		</footer>
<?php
		/* Retour à la requête WordPress originale */
		wp_reset_query();
?>
	</section><!-- #page-list -->
