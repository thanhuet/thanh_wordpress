<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "body-content-wrapper" div.
 *
 * @subpackage Landshafting
 * @author ayatemplates
 * @since Landshafting 1.0.0
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="body-content-wrapper">
			
			<header id="header-main-fixed">

				<div id="header-content-wrapper">

					<div id="header-top">
						<ul class="header-social-widget">
							<?php landshafting_display_social_sites(); ?>
						</ul>
					</div>
					<div class="clear"></div>

					<div id="header-logo">
						<?php landshafting_show_website_logo_image_and_title(); ?>
					</div><!-- #header-logo -->

					<nav id="navmain">
						<?php wp_nav_menu( array( 'theme_location' => 'primary',
												  'fallback_cb'    => 'wp_page_menu',
												  
												  ) ); ?>
					</nav><!-- #navmain -->
					
					<div class="clear">
					</div><!-- .clear -->

				</div><!-- #header-content-wrapper -->

			</header><!-- #header-main-fixed -->

			<?php if ( is_front_page() && get_theme_mod('landshafting_slider_display', 0) == 1 ) :
			
						landshafting_display_slider();
			
				  endif; ?>
