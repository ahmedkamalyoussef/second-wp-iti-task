<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Bob
 */

?>

<?php 
if (!is_home() && !is_front_page() && (is_page() || is_single() || is_singular())):
	?>
	<div id="bb-feature-image">
	<?php
	big_bob_post_thumbnail();
	?>
	</div>
	<?php
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
	if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu('menu-2')) :
		?>
		<header class="entry-header bb-alignleftstyle">
		<?php
	else :
		?>
		<header class="entry-header bb-aligncenterstyle">
		<?php
	endif;
	?>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				big_bob_posted_on();
				big_bob_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu('menu-2')) :
		?>
		<div class="entry-content bb-alignleftstyle">
		<?php
	else :
		?>
		<div class="entry-content bb-aligncenterstyle">
		<?php
	endif;
	?>
	<?php 
		if ((get_theme_mod( 'big_bob_fearued_post_page', 'Off' ) == 'On' ) && !(!is_home() && !is_front_page() && (is_page() || is_single() || is_singular()))):
	?>
		<div class="bb-center-image">
		<?php big_bob_post_thumbnail();
		?>
		</div>
		<?php
		endif;
        if ((is_home() || is_front_page() || is_archive()) && (get_theme_mod( 'big_bob_excerpt_mode', 'On' ) == 'On' )) {
            the_excerpt();
        } else {
            the_content(
                sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'big-media'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
            );
        }

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'big-media' ),
				'after'  => '</div>',
			)
		);
		?>
		<div class="bb-negative"></div>
	</div><!-- .entry-content -->

	<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) :
		?>
		<footer class="entry-footer bb-alignleftstyle">
		<?php
	else :
		?>
		<footer class="entry-footer bb-aligncenterstyle">
		<?php
	endif;
	?>
		<?php big_bob_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
