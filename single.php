<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package portfolio
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			?>



			
			<!-- <div class="navigation">
				<div class="navleft"><?php //get_template_part( 'assets/inline', 'left_icon_nanbar.svg' );?><?php //previous_post_link( '%link', '%title', true ); ?></div>
				<div class="navright"><?php //next_post_link( '%link', '%title', true );  ?><?php //get_template_part( 'assets/inline', 'right_icon_nanbar.svg' );?></div>
			</div> -->


	
			<div class="navigation">
				<?php if (strlen(get_previous_post()->post_title) > 0) { ?>
					<div class="navleft"><?php get_template_part( 'assets/inline', 'left_icon_nanbar.svg' );?><?php previous_post_link( '%link', '%title', true ) ?>
				<?php } ?>
			</div>

				<?php if (strlen(get_next_post()->post_title) > 0) { ?>
					<div class="navright"><?php next_post_link( '%link', '%title', true ) ?><?php get_template_part( 'assets/inline', 'right_icon_nanbar.svg' );?></div>
				<?php } ?>
			</div>

			

			<?php
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
