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

		$post_types = array('education', 'careers', 'interests');

		$args = array(
			'post_type'		=> $post_types,
			'post_per_page' => '-1',
			'orderby'       => 'post_type',
			'order'         => 'ASC'
		);
		
		$resume_items = new WP_Query( $args );
		
		if ( $resume_items->have_posts() ) :

			foreach ($post_types as $post_type) : ?>

			<div id='<?php echo $post_type?>'>

			<?php while ( $resume_items->have_posts() ) : $resume_items->the_post(); ?>
				
					<?php if(get_post_type() == "{$post_type}") {
						get_template_part( 'template-parts/content', 'ma' );
					} ?>
					
				<?php endwhile; ?>
				<!-- end of the loop -->

			</div>

			<?php endforeach;

		wp_reset_postdata();
		
		else :
        get_template_part( 'template-parts/content', 'none' );
                    
        endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

