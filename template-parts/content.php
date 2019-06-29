<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<p><?php echo get_post_meta($post->ID, 'description', true); ?></p>

		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="featured-image">
				<a href="<?php esc_url( the_permalink() ) ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</figure>
		<?php } ?>

		<?php if ( get_post_meta($post->ID, 'linkedpageurl', true) )  : ?>
			<div class="link-to-page">			
				<a class="button" href="<?php echo get_post_meta($post->ID, 'linkedpageurl', true); ?>"><?php echo get_post_meta($post->ID, 'linkedpagename', true); ?>
				<?php get_template_part( 'assets/inline', 'right_icon.svg' );?></a>
			</div><!-- .link-to-page -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'portfolio' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
