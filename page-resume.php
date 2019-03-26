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
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'social-nav-resume',
			) );
		?>

		<?php

		$post_types = array('courses', 'jobs', 'interests'); //$post_types = array('courses', 'jobs', 'interests');

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

					<?php //$post_types = get_post_types(); ?>

					<?php switch($post_type) {
						case "courses": //case "courses":
							echo "<h2>Education</h2>";
							break;
						case "jobs": //case "jobs":
							echo "<h2>Employment History</h2>";
							break;
						case "interests":
							echo "<h2>Interests</h2>";
							break;
					} ?>

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

