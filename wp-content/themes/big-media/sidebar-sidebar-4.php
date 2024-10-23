<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Big_Bob
 */

if ( (!is_active_sidebar( 'sidebar-3' ) && !has_nav_menu('menu-4')) || !is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<aside id="bb-secondSide" class="sideStick widget-area bb-alignrightstyle">
	<?php 
	dynamic_sidebar( 'sidebar-4' ); ?>
</aside><!-- #secondary -->
