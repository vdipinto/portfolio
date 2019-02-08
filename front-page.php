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
        // the query
        
        $sticky = get_option( 'sticky_posts' );
        $args = array (
        'category_name' => 'frontpage',      
        'wpse_is_home' => true,
        );


        

        $front_page_query = new WP_Query( $args,  'p=' . $sticky[0] ); ?>
        
        <?php if ( $front_page_query->have_posts() ) : ?>
        
            <!-- pagination here -->
        
            <!-- the loop -->
            <?php while ( $front_page_query->have_posts() ) : $front_page_query->the_post();
                get_template_part( 'template-parts/content-home', get_post_type() );
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







