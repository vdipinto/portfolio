<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div id="front-page">

            <?php


            $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
            );


            // execute the main query
            $front_page = new WP_Query( $args );

            // go main query
           
            if($front_page->have_posts()) {
                $count = 0; //set up counter variable
                while($front_page->have_posts()) { 
                $front_page->the_post();

                $count++; //increment the variable by 1 each time the loop executes

                if ($count==1) {
                
                    get_template_part( 'template-parts/inline', 'web_designer_desk.svg' );
                
                }

                elseif ($count==2) {
                
                    get_template_part( 'template-parts/inline', 'featured_work.svg' );
                
                }

                elseif ($count==3) {
                
                    get_template_part( 'template-parts/inline', 'what_I_do.svg' );
                
                }

              

                
                else {
                    get_template_part( 'template-parts/content', 'home' );
                }

            
    


                } // endwhile

            wp_reset_postdata(); // VERY VERY IMPORTANT
            }
            ?>
        </div><!-- #front-page -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();