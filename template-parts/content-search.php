<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-card clearfix'); ?>>
	<div class="search-content">
		
	<div class="textual-search-content">
		
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			
			<div class="entry-meta">
				<?php the_time('jS F Y') ?><br />
			</div><!-- .entry-meta -->
			
		</header><!-- .entry-header -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div><!-- .textual-search-content -->

		
	
	



	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="featured-image">
			<a href="<?php esc_url( the_permalink() ) ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure>
	<?php } ?>
	</div><!-- .search-content -->

	<footer class="entry-footer">
			<a class="button" href="<?php esc_url( the_permalink() ) ?>">see more <?php get_template_part( 'assets/inline', 'right_icon.svg' );?></a>
	</footer><!-- .entry-footer -->
	

	
</article><!-- #post-<?php the_ID(); ?> -->
