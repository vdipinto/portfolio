<?php
/**
 * The template for displaying the resume page
 *
 * This is the template that displays  the resume page
 *
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			$args = array(
				'post_type'  	=> 'course',
				'post_per_page' => 10,
				'meta_key'		=> 'date',
				'orderby'		=> 'meta_value',
				'order'			=> 'DESC'
			);
			$courses = new WP_Query( $args );?>

	<!-- the loop -->
	<?php if ( $courses->have_posts() ) : while ( $courses->have_posts() ) : $courses->the_post(); 
			get_template_part( 'template-parts/content-resume', get_post_type() );
	endwhile; ?>
	<!-- end of the loop -->

	<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
