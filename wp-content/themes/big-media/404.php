<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Big_Bob
 */

get_header();

	if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu('menu-2') ) :
		?>
		<div class="bb-theSqueeze">
		<main id="primary" class="site-main bb-indie-left">
		<?php
	else :
		?>
		<div class="bb-theSqueeze">
		<main id="primary" class="site-main">
		<?php
	endif;

		if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu('menu-2')) :
		?>
		<section class="error-404 not-found bb-alignleftstyle">
		<?php
		else :
		?>
		<section class="error-404 not-found bb-aligncenterstyle">
		<?php
		endif;
		?>
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'big-media' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the menu links or a search.', 'big-media' ); ?></p>

					<?php
					get_search_form();
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_sidebar('sidebar-1');
get_sidebar('sidebar-2');
get_footer();
	?>
	</div><!--the squeeze-->
	<?php