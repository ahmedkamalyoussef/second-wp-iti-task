<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Bob
 */

get_header();
if ( is_active_sidebar( 'sidebar-1' )  || has_nav_menu('menu-2') ) :
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
			if ( have_posts() ) : ?>
				<?php
				if ( is_active_sidebar( 'sidebar-1' )  || has_nav_menu('menu-2') ) :
					?>
					<header class="page-header bb-alignleftstyle">
					<?php
				else :
					?>
					<header class="page-header bb-aligncenterstyle">
					<?php
				endif;
				?>
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_pagination( array(
				'mid_size' => 3,
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar('sidebar-1');
get_sidebar('sidebar-2');
get_footer();
	?>
	</div><!--the squeeze-->
	<?php
