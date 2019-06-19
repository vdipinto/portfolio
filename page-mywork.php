<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div id="post-<?php the_ID(); ?>" <?php post_class('my-work'); ?>>
		
		
		

        
        <header class="page-header">
		    <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	    </header><!-- .entry-header -->

		


		


		<?php

		$args = array(
            'post_type'		=> 'mywork',
			'post_per_page' => '10',
			'orderby'       => 'date',
			'order'         => 'ASC'
		);

		$the_query = new WP_Query($args);

		

		
		if ( $the_query->have_posts() ) : ?>

		<div class="cards">	
		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-work', get_post_type() );
		endwhile; 
		
	

			the_posts_navigation();

			wp_reset_postdata();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div><!-- .work-posts -->
		</div><!-- #post-<?php the_ID(); ?> -->
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
