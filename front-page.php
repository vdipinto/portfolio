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
                while($front_page->have_posts()) { 
                $front_page->the_post(); 

                get_template_part( 'template-parts/content', 'home' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

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