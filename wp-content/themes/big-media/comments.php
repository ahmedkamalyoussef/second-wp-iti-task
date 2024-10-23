<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Bob
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php
	if ( ( (is_active_sidebar( 'sidebar-1' ) || has_nav_menu('menu-2')) && !is_page() )
		|| (!is_page_template('page-no-sidebar.php') &&
			(((is_active_sidebar( 'sidebar-3' ) || has_nav_menu('menu-4')) && is_page()
				&& ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Off')
					|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Home Only') && !is_front_page()) 
						|| ((get_theme_mod( 'big_bob_blog_sidebar_only', 'Off' ) == 'Except Home') && is_front_page()) ) ) ) ) ) :
		?>
		<div id="comments" class="comments-area bb-alignleftstyle">
		<?php
	else :
		?>
		<div id="comments" class="comments-area bb-aligncenterstyle">
		<?php
	endif;
	?>

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$big_bob_comment_count = get_comments_number();
			if ( '1' === $big_bob_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'big-media' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $big_bob_comment_count, 'comments title', 'big-media' ) ),
					number_format_i18n( $big_bob_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'big-media' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
