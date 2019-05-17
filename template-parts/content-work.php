<?php
/**
 * Template part for displaying work example posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<div class="card-container">
		<a href="<?php esc_url( the_permalink() ) ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;?>
		</header><!-- .entry-header -->
		<?php portfolio_the_category_list(); ?>
		
		<?php if ( is_page('Blog') ): ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		
		
		<!-- Description custom field  -->
		<?php if (get_post_meta($post->ID, 'description', true)) : ?>
			<div class="description-work">
			 	<?php echo get_post_meta($post->ID, 'description', true) ?>
			 </div><!-- .description-work -->
		<?php endif; ?>
		

			<footer class="entry-footer">
			<a class="button" href="<?php esc_url( the_permalink() ) ?>">
			<?php get_template_part( 'assets/inline', 'right_icon.svg' );?>
			see more</a>
		</footer><!-- .entry-footer -->
		</div><!-- .card-container -->
</article><!-- #post-<?php the_ID(); ?> -->