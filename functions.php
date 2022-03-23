<?php

/* Load Press Coders theme framework class. */
if ( file_exists( get_template_directory() . '/api/classes/api.php' ) ) {
	require_once( get_template_directory() . '/api/classes/api.php' );
}

if ( ! class_exists( 'PC_Main_Theme' ) ) :

	class PC_Main_Theme extends PC_Framework {

		public function __construct( $theme_name ) {
			/* Call parent construtor manually to make both constructors fire. */
			parent::__construct( $theme_name );

			/* Add theme support for framework features. */
			add_action( 'after_setup_theme', array( &$this, 'theme_support' ) );
		}

		/* Add support for theme features. */
		public function theme_support() {

			/** CONSTANTS AND GLOBAL VARIABLES **/

			define( 'PC_INSTALL_DEFAULT_CONTENT', TRUE );
			define( 'PC_INSTALL_CONTENT_PROMPT', TRUE );
			define( 'PC_TESTIMONIAL_THUMB_WIDTH', 150 );

			/** WORDPRESS BUILT-IN SUPPORTED THEME FEATURES **/

			/* Note: Use '%2$s' instead of '%s' to reference a child theme image. */
			$bg_defaults = array(
				'default-color' => '',
				'default-image' => PC_THEME_ROOT_URI . '/images/vertical-stripe-white.png'
			);

			add_theme_support( 'automatic-feed-links' ); /* Add posts and comments RSS feed links to head. */
			add_theme_support( 'post-thumbnails' ); /* Use the post thumbnails feature. */
			add_theme_support( 'custom-background', $bg_defaults ); /* A simple uploader to change the site background image. */

			add_editor_style(); /* Post/page editor style sheet to match site styles. */

			/** FRAMEWORK SUPPORTED THEME FEATURES **/

			add_theme_support( 'pc-custom-header' ); /* Wrapper for the WordPress Custom Header feature. */
			add_theme_support( 'theme-options-page' ); /* Display a theme options page. */
			add_theme_support( 'seo' ); /* Enable SEO functionality. */
			add_theme_support( 'custom-css' ); /* Enable custom CSS editing. */
			add_theme_support( 'hf-code-insert' ); /* Custom header/footer code insert, plus flexible footer links. */
			add_theme_support( 'shortcodes' ); /* Include all framework shortcodes. */
			add_theme_support( 'sidebar-commander' ); /* Create custom widget areas. */
			add_theme_support( 'breadcrumb-trail' ); /* Display breadcrumb trail. */
			add_theme_support( 'fancybox' ); /* Include Fancybox lightbox. */
			add_theme_support( 'superfish' ); /* Load Superfish jQuery menu. */
			add_theme_support( 'modernizr' ); /* Load Modernizr library. */
			add_theme_support( 'fitvids' ); /* Responsive video resizing. */
			add_theme_support( 'homepage-bar' ); /* Adds the custom homepage bar to the theme. */
			add_theme_support( 'auto-update', array( 'http://wp-updates.com/api/1/theme', 224 ) ); /* Auto update theme. */

			add_theme_support( 'custom-post-types', array( 'testimonials',
				'slides',
				'portfolio' => array( 'large-pf-image'  => array( 466, 250 ),
									  'medium-pf-image' => array( 306, 200 ),
									  'small-pf-image'  => array( 226, 150 ) )
			) ); /* Load framework CPT's. */

			/* Include specified framework widgets. */
			add_theme_support( 'pc_widgets', 'tml',
				'theme-recent-posts',
				'blog-style-recent-posts',
				'color-scheme-switcher',
				array( 'content-slider' => array( 'one-third-width'  => 374,
												  'two-thirds-width' => 374,
												  'full-width'       => 550,
												  'height'           => 'auto',
												  'nav-arrows'       => true )
				),
				'info-box-font-icons'
			);

			/* Add array of menu location labels, or leave 2nd parameter blank for a single default menu. */
			add_theme_support( 'custom-menus', array( 'Primary Navigation', 'Top Menu' ) );

			/* Add array of theme color schemes. */
			add_theme_support( 'color-schemes', array( __( 'Default', 'presscoders' ) => 'default',
													   __( 'Red', 'presscoders' )     => 'red',
													   __( 'Green', 'presscoders' )   => 'green',
													   __( 'Dark', 'presscoders' )    => 'dark',
													   __( 'Yellow', 'presscoders' )  => 'yellow',
													   __( 'Blue', 'presscoders' )    => 'blue' ) );

			/* Display Google web font options. */
			add_theme_support( 'google-fonts-customizer', array(
					'default'   => 'None',
					'font_list' => array(
						'Open+Sans:400italic,400,700',
						'Droid+Serif:400,700,400italic',
						'Open+Sans+Condensed:300,300italic,700',
						'Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic',
						'Lato:400,700,400italic',
						'Arvo:400,700,400italic,700italic',
						'Lora:400,700,400italic',
						'Josefin+Sans:400,700,400italic',
						'Arimo:400,700,400italic',
						'Cabin:400,700,400italic',
						'PT+Serif:400,700,400italic',
						'Cuprum:400,400italic,700',
						'Source+Sans+Pro:400,700,400italic',
						'Vollkorn:400italic,400,700',
						'Asap:400,700,400italic',
						'Cantarell:400,700,400italic',
						'Lato:400,700,400italic',
						'Nobile:400,400italic,700',
						'Bitter:400,700,400italic',
						'Philosopher:400,700,400italic',
						'Crimson+Text:400,400italic,700',
						'PT+Sans+Narrow:400,700'
					) )
			);

			/* ADDITIONAL THEME FEATURES */

			/* Default thumbnail size for post thumbnails. */
			set_post_thumbnail_size( 650, 200, true );

			/* Add an extra custom thumbnail for the single Portfolio page carousel thumb size. */
			add_image_size( 'single-pf-carousel', 100, 100, true );
		}

	} /* End class definition */

	/* Create theme class instance */
	global $pc_theme_object;
	$pc_theme_object = new PC_Main_Theme( 'Facade' );

endif; /* Endif class definition and instantiation. */

?>