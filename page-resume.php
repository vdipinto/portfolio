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
		<div id="post-<?php the_ID(); ?>" <?php post_class('resume'); ?>>


		<header class="page-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .page-header -->
		<div class="resume-container">
			<div class="column-1">
				<!-- add social navigation -->
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-3',
						'menu_id'        => '',
					) );
				?>
				<!-- end social navigation  -->
				<div class="personal-statement">
					<?php $personal_statement = new WP_Query("page_id=742"); while($personal_statement->have_posts()) : $personal_statement->the_post();?>
							<?php the_title( '<h2>', '</h2>' ); ?>
							<?php the_content(); ?>
					<?php endwhile; ?>
				</div><!-- .personal-statement -->

				<hr>

				<?php

				$post_types = array('courses', 'jobs', 'interests'); 

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



							<?php switch($post_type) {
								case "courses": 
									echo "<h2>Education</h2>";
									break;
								case "jobs": 
									echo "<h2>Employment History</h2>";
									break;
								case "interests":
									echo "<h2>Interests</h2>";
									break;
							} ?>

							<?php while ( $resume_items->have_posts() ) : $resume_items->the_post(); ?>
								
									<?php if(get_post_type() == "{$post_type}") {
										get_template_part( 'template-parts/content', 'resume' );
									} ?>
									
							<?php endwhile; ?>
							<!-- end of the loop -->

						</div>

					<?php endforeach;

				wp_reset_postdata();
				
				else :
				get_template_part( 'template-parts/content', 'none' );
							
				endif; ?>
				<!-- Get side for the resume -->
			</div><!-- column-1 -->
			<div class="column-2">
				<?php get_sidebar('resume'); ?>
			</div><!--.column-2 -->
			</div><!-- resume-container -->
		
		</div><!-- #post-<?php the_ID(); ?> -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
get_sidebar();
get_footer();




