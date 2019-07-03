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
        <div id="post-<?php the_ID(); ?>" <?php post_class('front-page'); ?>>

            <?php





            $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post__in' => array( 748,750,746 ),
                'post_parent'    => $post->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
            );


            // execute the main query
            $front_page = new WP_Query( $args );

            // go main query
            if ( $front_page->have_posts() ) : ?>
            
                
            
                <!-- the loop -->
                <?php while ( $front_page->have_posts() ) : $front_page->the_post();
                    get_template_part( 'template-parts/content', 'home' );
                endwhile; ?>
                
            
                <?php wp_reset_postdata(); ?>
            
            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            
           
        </div><!-- #front-page -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();