<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page'); ?>>
    <?php the_post_thumbnail( 'profile-thumb' , array( 'class' => 'alignleft' ) ); ?>
	 

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
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


	<div class="link-to-page">		
		<div class="archive-meta"><?php echo category_description(); ?></div>	
				<svg width="120" height="120">
					<!-- <a href="<?php //echo get_page_link(112); ?>"> -->
					<a href="<?php echo get_post_meta($post->ID, 'linkedpageurl', true); ?>">
						<circle cx="60"
								cy="60"
								r="60"
								fill="#007BFF" />
					
						<text x="60"
							y="60"
							fill="#FFFFFF"
							text-anchor="middle"
							alignment-baseline="middle">
							<?php echo get_post_meta($post->ID, 'linkedpagename', true); ?>
						</text>
					</a>
				</svg>
	</div><!-- .link-to-page -->

	<footer class="entry-footer">
		<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
		<polygon fill="#66cccc" points="0,100 100,0 100,100"/>
		</svg> -->
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
