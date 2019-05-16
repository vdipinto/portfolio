<?php
/**
 * The template file for the category-work.php
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

		<article id="post-<?php the_ID(); ?>" <?php post_class('works'); ?>>
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
			
			
			<header class="page-header">
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
			</article><!-- #post-<?php the_ID(); ?> -->
    	</main><!-- #main -->
	</div><!-- #primary -->
    
<?php get_footer(); ?>