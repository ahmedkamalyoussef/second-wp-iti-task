<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Big_Bob
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses big_bob_header_style()
 */
function big_bob_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'big_bob_custom_header_args',
			array(
				'default-text-color' => '000',
				'width'              => 2000,
				'height'             => 1200,
				'flex-height'        => true,
				'flex-width'         => true,
				'wp-head-callback'   => 'big_bob_header_style',
				'video' => true,
			)
		)
	);

}


// Enable video header support on mobile devices
add_filter( 'header_video_settings', function( $args ) {

	$args['minWidth'] = 0;
	$args['minHeight'] = 0;

	return $args;

} );

add_action( 'after_setup_theme', 'big_bob_custom_header_setup' );

if ( ! function_exists( 'big_bob_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see big_bob_custom_header_setup().
	 */
	function big_bob_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		
			<?php
		//remove wp-custom header references for customizer; set to deault
		//since .wp-cusotm-header isn't empty in customizer, the margin for top-padding needs replacement
		//Has the text been hidden?
		//$custom_header = get_custom_header_markup();
		if (!get_header_image() && !has_header_video() && !display_header_text() && !is_front_page() && !(( (has_post_thumbnail() && (get_theme_mod( 'big_bob_highlight_feature_image', 'Featured Images Only' ) == 'Featured Images Only')) || (get_theme_mod( 'big_bob_highlight_feature_image', 'Featured Images Only' ) == 'On')) && !is_front_page() && (is_page() || is_single()) ) ) :
			?>
			.wp-custom-header,
			.wp-custom-header img,
			.wp-custom-header video {
				width: auto;
				height: auto;
				min-width: 0; 
				min-height: 0;
				max-width: none; 
				max-height: none; 
			}
			.wp-custom-header {
				margin: 160px;
			}
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			.site-branding {
				margin-bottom: 20px;
			}
			.bb-top-padding {
				margin: 160px;
			}
			<?php
			if ((get_theme_mod('big_bob_center_nav', "On") == "On") && (get_theme_mod('big_bob_menu_size', "Medium") == "Medium") ):
				?>
				 @media screen and (min-width: 1065px) {
					.no-results .bb-top-padding,
                    .search-results .bb-top-padding,
                    .error404 .bb-top-padding,
                    .search-no-results .bb-top-padding {
						margin: 180px;
					}
				}
				<?php
			endif;
		elseif (( get_theme_mod( 'video_on_phone', 'On' ) == 'Off' ) && !get_header_image() && has_header_video() && !display_header_text() && !(( (has_post_thumbnail() && (get_theme_mod( 'big_bob_highlight_feature_image', 'Featured Images Only' ) == 'Featured Images Only')) || (get_theme_mod( 'big_bob_highlight_feature_image', 'Featured Images Only' ) == 'On')) && !is_front_page() && (is_page() || is_single()) )) :
			?>
			@media screen and (max-width: 500px) {
				.wp-custom-header,
				.wp-custom-header img,
				.wp-custom-header video {
					width: auto;
					height: auto;
					min-width: 0; 
					min-height: 0;
					max-width: none; 
					max-height: none; 
				}
				.wp-custom-header {
					margin: 160px;
				}
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
					}
				.site-branding {
					margin-bottom: 20px;
				}
				.bb-top-padding {
					margin: 160px;
				}
			}
		<?php
		endif;
		// Has the text been hidden?
		if ( !display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			.site-branding {
				margin-bottom: 20px;
			}
			.bb-top-padding {
				margin: 160px;
			}
			<?php
			if ((get_theme_mod('big_bob_center_nav', "On") == "On") && (get_theme_mod('big_bob_menu_size', "Medium") == "Medium") ):
				?>
				@media screen and (min-width: 1065px) {
					.no-results .bb-top-padding,
                    .search-results .bb-top-padding,
                    .error404 .bb-top-padding,
                    .search-no-results .bb-top-padding {
						margin: 180px;
					}
				}
				<?php
			endif;
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.bb-site-title-top a {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}
		<?php endif;
		//if there is a featured image and a featured video, then set display to none, so it isn't loaded on smart mobile browsers.
		if (has_post_thumbnail()) {
			?>
				@media screen and (max-width: 1180px) {
					.is-style-bb-background video,
					.bb-fv {
						display: none;
					}
				}
			<?php
		}
		?>
		</style>
		<?php
	}
endif;
add_action( 'wp_head', 'big_bob_header_style' );