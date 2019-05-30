<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolio
 */

?>

	</div><!-- #content -->
</div><!-- #page -->
<footer id="colophon" class="site-footer">
		<div class="site-info">
			<!-- add social navigation -->
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-3',
					'menu_id'        => '',
				) );
			?>
			<!-- end social navigation  -->
			<small>&copy; Copyright <?php echo date('Y'); ?>
			<?php bloginfo( 'name' );?></small>

			

			
		</div><!-- .site-info -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>
