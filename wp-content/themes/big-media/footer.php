<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Big_Bob
 */

?>
	<?php
	if ( ((!is_active_sidebar( 'sidebar-3' ) && !has_nav_menu('menu-4')) && is_page())
		|| (is_page_template('page-no-sidebar.php') ||
			((is_active_sidebar( 'sidebar-3' ) || has_nav_menu('menu-4')) && is_page() &&
				( ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Home Only') && is_front_page()) 
					|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Except Home') && !is_front_page()) )  ) ) ):
		?>
		<footer id="colophon" class="site-footer bb-aligncenterstyle bb-wide-footer">
		<?php
	else :
		?>
		<footer id="colophon" class="site-footer bb-aligncenterstyle">
		<?php
	endif;
		wp_nav_menu( 
			array(
				'theme_location' => 'menu-3',
				'menu_id'        => 'bb-footer-menu',
				'menu_class' => 'bb-foot-menu',
				'fallback_cb' => false
				) 
			); 
		get_sidebar('footer-1'); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'big-media' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Powered by %s', 'big-media' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'big-media' ), '<a href="https://wordpress.org/themes/big-media/">Big Media</a>', '<a href="https://bigbobnetwork.com/">BigBobNetWork</a>' );
				?>
		</div><!-- .site-info -->
		<a id="bb-back-to-top" href="#" class="btn btn-light btn-lg bb-back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
