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
		<?php the_post_thumbnail(); ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;?>
		</header><!-- .entry-header -->
		<div class="description-work">
			<p><?php echo get_post_meta($post->ID, 'description', true); ?></p>
		</div><!-- .inner -->
			<footer class="entry-footer">
			<a href="<?php esc_url( the_permalink() ) ?>">
				<span class="underline">see more</span>
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="icon-arrow-right"
						width="16px" height="17.6px" viewBox="0 0 16 17.6" style="enable-background:new 0 0 16 17.6;" xml:space="preserve">
						<path d="M15.4,7.4L8.6,0.6c-0.8-0.8-2-0.8-2.8,0s-0.8,2,0,2.8l3.5,3.5L2,6.7c0,0,0,0,0,0c-1.1,0-2,0.9-2,2c0,1.1,0.9,2,2,2l7.1,0.1
						l-3.4,3.4c-0.8,0.8-0.8,2,0,2.8c0.4,0.4,0.9,0.6,1.4,0.6c0.5,0,1-0.2,1.4-0.6l6.8-6.8C15.7,9.9,16,9.4,16,8.8S15.8,7.8,15.4,7.4z"/>
					</svg>
			</a>
		</footer><!-- .entry-footer -->
		</div><!-- .card-container -->
</article><!-- #post-<?php the_ID(); ?> -->