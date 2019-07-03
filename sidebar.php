<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolio
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="primary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'Sidebar' ); ?>
</aside><!-- #secondary -->
