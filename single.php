<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package portfolio
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			?>

			

				

				<div class="navigation">

				<?php
				$prev_post = get_previous_post();
				if ( ! empty( $prev_post ) ): ?>
					<div class="navleft"><?php get_template_part( 'assets/inline', 'left_icon_nanbar.svg' );?><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo apply_filters( 'the_title', $prev_post->post_title ); ?></a></div>
				<?php endif; ?>
				


				<?php
				$next_post = get_next_post();
				if (!empty( $next_post )): ?>
				<div class="navright"><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a><?php get_template_part( 'assets/inline', 'right_icon_nanbar.svg' );?></div>
				<?php endif; ?>



				
				</div><!-- .navigation -->

				
	
			

			<?php
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
