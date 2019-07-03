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

        <?php

        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $post->ID,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
        );

        // execute the main query
        $mypages = new WP_Query( $args );
        // go main query
        if($mypages->have_posts()) { 
            while($mypages->have_posts()) { 
            $mypages->the_post(); 

            get_template_part( 'template-parts/content', 'ma' );
                

            } // endwhile
            wp_reset_postdata(); // VERY VERY IMPORTANT
        }

        // define the inner query
        $inner_args = array(
            'post_type'  	=> array('post','movie','actor'),
            'post_per_page' => 10,
            'meta_key'		=> 'date',
            'orderby'		=> 'meta_value',
            'order'			=> 'DESC'
        );
        // execute the inner query
        $courses = new WP_Query($inner_args);
        // go inner query
        if($courses->have_posts()) {
            while($courses->have_posts()) {
                $courses->the_post();

                get_template_part( 'template-parts/content', 'resume' );

            } // endwhile
            wp_reset_postdata(); // VERY VERY IMPORTANT
        }?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>