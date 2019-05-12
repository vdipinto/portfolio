

<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<div class="link-to-page">			
				<a class="button" href="<?php echo get_post_meta($post->ID, 'linkedpageurl', true); ?>"><?php echo get_post_meta($post->ID, 'linkedpagename', true); ?>
				<?php get_template_part( 'assets/inline', 'right_icon.svg' );?>
			</a>
		</div><!-- .link-to-page -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'portfolio' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>

				
			</footer><!-- .entry-footer -->
		<?php endif; ?>


		<?php //portfolio_post_thumbnail('profile-thumb' , array( 'class' => 'thumbnail-frontpage')) ; ?>
	
</article><!-- #post-<?php the_ID(); ?> -->

