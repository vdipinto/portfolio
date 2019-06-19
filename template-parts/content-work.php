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
	

	
		
  		
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;?>
		</header><!-- .entry-header -->
		<?php //portfolio_the_category_list(); ?>

		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="featured-image">
				<a href="<?php esc_url( the_permalink() ) ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</figure>
		<?php } ?>
		
		<div class="card-content">
			<?php
			if ( is_home() ) {
				portfolio_the_category_list();
				the_excerpt();
			}
			?>

			<!-- Description custom field  for work-->
			<?php if (get_post_meta($post->ID, 'description', true)) : ?>
				<div class="description-work">
					<?php echo get_post_meta($post->ID, 'description', true) ?>
				</div><!-- .description-work -->
			<?php endif; ?>
		</div> <!-- .card-content -->

			
		
			<?php if (is_page( 'mywork' ) ): ?>
				<footer class="entry-footer">
				<a class="button" href="<?php esc_url( the_permalink() ) ?>">
				see more <?php get_template_part( 'assets/inline', 'right_icon.svg' );?></a>
				</footer><!-- .entry-footer --> 
			<?php endif;
			?>
			

		
		

		
		
</article><!-- #post-<?php the_ID(); ?> -->