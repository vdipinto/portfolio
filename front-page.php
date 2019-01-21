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

		<?php
		// Check if there are any posts to display
		if ( have_posts() ) : ?>
		
		<div class="work-posts">
            <?php
            
            // The Loop
            
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content-work', get_post_type() );
            
            endwhile; 
            
        else: ?>
            <p>Sorry, no posts matched your criteria.</p>
            
            
        <?php endif; ?>
	    </div><!-- .work-posts -->
    </div>
    
<?php get_footer(); ?>