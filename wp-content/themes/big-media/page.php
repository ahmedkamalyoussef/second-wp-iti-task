<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Bob
 */

get_header();


	if ( (is_active_sidebar( 'sidebar-3' ) || has_nav_menu('menu-4')) && 
		((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Off') 
			|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Home Only') && !is_front_page()) 
			|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Except Home') && is_front_page()) ) ) :
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

		
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
if 		((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Off') 
		|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Home Only') && !is_front_page()) 
		|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Except Home') && is_front_page()) ) {
    get_sidebar('sidebar-3');
	get_sidebar('sidebar-4');
}
get_footer();
?>
</div><!--the squeeze-->
<?php
