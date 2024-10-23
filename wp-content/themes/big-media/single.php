<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Big_Bob
 */

get_header();


		if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu('menu-2')) :
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

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'big-media' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'big-media' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar('sidebar-1');
get_sidebar('sidebar-2');
get_footer();
	?>
	</div><!--the squeeze-->
	<?php