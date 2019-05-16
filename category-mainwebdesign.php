<?php
/**
 * The template file for the category-mainwebdesign.php
 *
 * This is the template for the category page with slug mainwebdesign
 * It is used to display the category page for the MA in Web Design Category. Remind you that the Template Hierachy for Category pages is as follow:
 * 
 * 1.category-slug.php
 * 2.category-ID.php
 * 3.category.ph
 * 4.archive.php
 * 5.index.php
 * 
 *
 *
 * @link https://codex.wordpress.org/Category_Templates
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
 
		<header class="page-header">
			<h1 class="category-title"><?php single_cat_title( '', true ); ?></h1>
 		
		
		
		<?php
		// Display optional category description
		if ( category_description() ) : ?>
		<div class="archive-meta"><?php echo category_description(); ?></div>
		<?php endif; ?>
		</header><!-- .page-header-->
		
		<div class="core_courses_MA">
		<?php
		
		// The Loop
		
		while ( have_posts() ) : the_post(); ?>

		<?php if ( has_post_thumbnail()) : ?>
			<div class="core_course">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					<?php the_post_thumbnail('category-thumb'); ?>
				</a>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
 			</div><!-- .core_course-->
		<?php endif; ?>
	

	
		
		
		<?php endwhile; 
		
		else: ?>
		<p>Sorry, no posts matched your criteria.</p>
		
		
		<?php endif; ?>
	</div><!-- .core_courses_MA -->
	</div>
	</section>
		
		
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
