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

		<?php 

			//get custom field titled "alternative-image"
			$alternative_post_image = get_post_meta($post->ID, 'alternative-image', $single = true);

		
			//if custom field isn't blank
			
			if ($alternative_post_image !== '' ) { ?>
	
				<img src="<?php echo $alternative_post_image; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		
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


		
		<footer class="entry-footer">
			<a class="button" href="<?php esc_url( the_permalink() ) ?>">see more <?php get_template_part( 'assets/inline', 'right_icon.svg' );?></a>
		</footer><!-- .entry-footer --> 
		
		<a class="card-permalink" href="<?php esc_url( the_permalink() ) ?>"></a>
		
				
		
			

		
		

		
		
</article><!-- #post-<?php the_ID(); ?> -->