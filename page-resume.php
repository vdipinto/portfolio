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
		
		$courses = new WP_Query( $args ); ?>

		<?php if ( $courses->have_posts() ) : ?>

		<?php while ( $courses->have_posts() ) : $courses->the_post();
			get_template_part( 'template-parts/content', 'ma' );
		endwhile; ?>
		<!-- end of the loop -->
                
        <!-- pagination here -->
		
		<?php wp_reset_postdata();
		
		else :
        get_template_part( 'template-parts/content', 'none' );
                    
        endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();




