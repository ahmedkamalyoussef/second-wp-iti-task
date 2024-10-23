<?php
/**
 * Footer widgets
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Big_Bob
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="bb-footer-widgets" class="widget-area">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #secondary -->
