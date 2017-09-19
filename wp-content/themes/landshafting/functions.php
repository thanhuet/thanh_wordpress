<?php
/**
 * Landshafting functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @subpackage Landshafting
 * @author ayatemplates
 * @since Landshafting 1.0.0
 *
 */

require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'landshafting_setup' ) ) :
/**
 * Landshafting setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function landshafting_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'landshafting', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	// This theme uses wp_nav_menu() in header menu
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'landshafting' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'commentlist',
		'gallery',
		'caption',
	) );

	// add the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css', get_template_directory_uri() . '/css/font-awesome.min.css' ) );

	// add custom background				 
	add_theme_support( 'custom-background', 
				   array ('default-color'  => '#f7f7f7')
				 );

	// add content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

	// add custom header
    add_theme_support( 'custom-header', array (
                       'default-image'          => '',
                       'random-default'         => '',
                       'flex-height'            => true,
                       'flex-width'             => true,
                       'uploads'                => true,
                       'width'                  => 900,
                       'height'                 => 100,
                       'default-text-color'     => '#555555',
                       'wp-head-callback'       => 'landshafting_header_style',
                    ) );

    // add custom logo
    add_theme_support( 'custom-logo', array (
                       'width'                  => 145,
                       'height'                 => 36,
                       'flex-height'            => true,
                       'flex-width'             => true,
                    ) );

}
endif; // landshafting_setup
add_action( 'after_setup_theme', 'landshafting_setup' );

/**
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function landshafting_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Register theme settings in the customizer
 */
function landshafting_customize_register( $wp_customize ) {

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'landshafting_social_section',
		array(
			'title'       => __( 'Social Sites', 'landshafting' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_facebook',
		__( 'Facebook Page URL', 'landshafting' ), '#');

	// Add google+ url
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_google',
		__( 'Google+ Page URL', 'landshafting' ), '#');

	// Add twitter url
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_twitter',
		__( 'Twitter URL', 'landshafting' ), '#');

	// Add LinkedIn
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_linkedin',
		__( 'LinkedIn', 'landshafting' ), '#');

	// Add Instagram
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_instagram',
		__( 'Instagram', 'landshafting' ), '#');

	// Add RSS Feeds url
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_rss',
		__( 'RSS Feeds URL', 'landshafting' ), get_bloginfo( 'rss2_url' ));

	// Add Tumblr Text Control
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_tumblr',
		__( 'Tumblr', 'landshafting' ), '#');

	// Add YouTube channel url
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_youtube',
		__( 'YouTube channel URL', 'landshafting' ), '#');

	// Add Pinterest Text Control
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_pinterest',
		__( 'Pinterest', 'landshafting' ), '#');

	// Add VK Text Control
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_vk',
		__( 'VK', 'landshafting' ), '#');

	// Add Flickr Text Control
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_flickr',
		__( 'Flickr', 'landshafting' ), '#');

	// Add Vine Text Control
	landshafting_customize_add_social_site($wp_customize, 'landshafting_social_vine',
		__( 'Vine', 'landshafting' ), '#');

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'landshafting_slider_section',
		array(
			'title'       => __( 'Slider', 'landshafting' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add display slider option
	$wp_customize->add_setting(
			'landshafting_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'landshafting_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landshafting_slider_display',
							array(
								'label'          => __( 'Display Slider', 'landshafting' ),
								'section'        => 'landshafting_slider_section',
								'settings'       => 'landshafting_slider_display',
								'type'           => 'checkbox',
							)
						)
	);

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'landshafting_footer_section',
		array(
			'title'       => __( 'Footer', 'landshafting' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'landshafting_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'landshafting_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'landshafting' ),
            'section'        => 'landshafting_footer_section',
            'settings'       => 'landshafting_footer_copyright',
            'type'           => 'text',
            )
        )
	);
}

add_action('customize_register', 'landshafting_customize_register');

/**
 * Add Social Site control into Customizer
 */
function landshafting_customize_add_social_site($wp_customize, $controlId, $label, $defaultValue) {

	$wp_customize->add_setting(
		$controlId,
		array(
		    'default'           => $defaultValue,
		    'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $controlId,
        array(
            'label'          => $label,
            'section'        => 'landshafting_social_section',
            'settings'       => $controlId,
            'type'           => 'text',
            )
        )
	);
}

/**
 * the main function to load scripts in the Landshafting theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function landshafting_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'landshafting-style', get_stylesheet_uri(), array() );
	
	wp_enqueue_style( 'landshafting-fonts', landshafting_fonts_url(), array(), null );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'landshafting-js', get_template_directory_uri() . '/js/utilities.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'landshafting_load_scripts' );

/**
 *	Load google font url used in the Landshafting theme
 */
function landshafting_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by PT Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $cantarell = _x( 'on', 'PT Sans font: on or off', 'landshafting' );

    if ( 'off' !== $cantarell ) {
        $font_families = array();
 
        $font_families[] = 'PT Sans';
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,cyrillic-ext,cyrillic,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 * Display website's logo image
 */
function landshafting_show_website_logo_image_and_title() {

	if ( has_custom_logo() ) {

        the_custom_logo();
    }

    $header_text_color = get_header_textcolor();

    if ( 'blank' !== $header_text_color ) {
    
        echo '<div id="site-identity">';
        echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
        echo '<h1 class="entry-title">'.get_bloginfo('name').'</h1>';
        echo '</a>';
        echo '<strong>'.get_bloginfo('description').'</strong>';
        echo '</div>';
    }
}

/**
 *	Displays the copyright text.
 */
function landshafting_show_copyright_text() {

	$footerText = get_theme_mod('landshafting_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function landshafting_widgets_init() {
	
	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'landshafting'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'landshafting'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );

	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'landshafting' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'landshafting' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'landshafting' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'landshafting' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'landshafting' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'landshafting' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}

add_action( 'widgets_init', 'landshafting_widgets_init' );

/**
 * Displays the Slider
 */
function landshafting_display_slider() { ?>

	<section class="main">
		<div class="ia-container">
<?php 		
			$args = array( 'numberposts' => '5',
						   'post_status'=>'publish',
						 );

			$recent_posts = wp_get_recent_posts( $args );

			// display slides
			for ( $i = 0; $i < 5; ++$i ) {

				$recent = $recent_posts[ $i ];

				/**
				 * Display Post Thumbnails as slider images (as nested figure tags)
				 *
				 * Note: If post has no thumbnail we display the default slider image
				 */
?>
				<figure>
<?php
					if ( has_post_thumbnail( $recent['ID'] ) ) {

						echo get_the_post_thumbnail( $recent['ID'], 'thumbnail');

					} else { // display default slide image

						$defaultImageName = ($i + 1) . '.jpg';
						$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $defaultImageName;

						echo '<img src="' . esc_attr($defaultSlideImage) . '" />';
					}
?>
					<input type="radio" name="radio-set"
						<?php if ($i == 1) : echo 'checked="checked"'; endif; ?> />
<?php
			}

			// add closing figure tags
			for ( $i = 0; $i < 5; ++$i ) {

				echo '</figure>';
			} ?>

		</div><!-- .ia-container -->
	</section><!-- .main -->

<?php
}

function landshafting_header_style() {

    $header_text_color = get_header_textcolor();

    if ( ! has_header_image()
        && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
             || 'blank' === $header_text_color ) ) {

        return;
    }

    $headerImage = get_header_image();
?>
    <style type="text/css">
        <?php if ( has_header_image() ) : ?>

                #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

        <?php endif; ?>

        <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                    && 'blank' !== $header_text_color ) : ?>

                #header-main-fixed {color: #<?php echo esc_attr( $header_text_color ); ?>;}

        <?php endif; ?>
    </style>
<?php

}

function landshafting_display_single_social_site($socialSiteID, $defaultValue, $title, $cssClass) {

	$socialURL = get_theme_mod( $socialSiteID, $defaultValue );
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( $title )
							. '" class="' . esc_attr( $cssClass ) . '"></a></li>';
	}
}

/**
 * Display Social Websites
 */
function landshafting_display_social_sites() {

	landshafting_display_single_social_site('landshafting_social_facebook', '#', __('Follow us on Facebook', 'landshafting'), 'facebook16' );

	landshafting_display_single_social_site('landshafting_social_google', '#', __('Follow us on Google+', 'landshafting'), 'google16' );

	landshafting_display_single_social_site('landshafting_social_twitter', '#', __('Follow us on Twitter', 'landshafting'), 'twitter16' );

	landshafting_display_single_social_site('landshafting_social_linkedin', '#', __('Follow us on LinkedIn', 'landshafting'), 'linkedin16' );

	landshafting_display_single_social_site('landshafting_social_instagram', '#', __('Follow us on Instagram', 'landshafting'), 'instagram16' );

	landshafting_display_single_social_site('landshafting_social_rss', get_bloginfo( 'rss2_url' ), __('Follow our RSS Feeds', 'landshafting'), 'rss16' );

	landshafting_display_single_social_site('landshafting_social_tumblr', '#', __('Follow us on Tumblr', 'landshafting'), 'tumblr16' );

	landshafting_display_single_social_site('landshafting_social_youtube', '#', __('Follow us on Youtube', 'landshafting'), 'youtube16' );

	landshafting_display_single_social_site('landshafting_social_pinterest', '#', __('Follow us on Pinterest', 'landshafting'), 'pinterest16' );

	landshafting_display_single_social_site('landshafting_social_vk', '#', __('Follow us on VK', 'landshafting'), 'vk16' );

	landshafting_display_single_social_site('landshafting_social_flickr', '#', __('Follow us on Flickr', 'landshafting'), 'flickr16' );

	landshafting_display_single_social_site('landshafting_social_vine', '#', __('Follow us on Vine', 'landshafting'), 'vine16' );
}

?>
