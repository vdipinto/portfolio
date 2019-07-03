

<?php
/**
 * Template part for displaying page containing images in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php portfolio_post_thumbnail('profile-thumb' , array( 'class' => 'thumbnail-frontpage')) ; ?>
</article><!-- #post-<?php the_ID(); ?> -->

