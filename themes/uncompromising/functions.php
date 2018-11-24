<?php
/**
 * Uncompromising functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage uncompromising
 * @since 1.0
 */

/**
 * Uncompromising only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uncompromising_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/uncompromising
	 * If you're building a theme based on Uncompromising, use a find and replace
	 * to change 'uncompromising' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'uncompromising' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'uncompromising-featured-image', 2000, 1200, true );

	add_image_size( 'uncompromising-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'uncompromising' ),
		'social' => __( 'Social Links Menu', 'uncompromising' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', uncompromising_fonts_url() ) );

	// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
	require_once( 'custom-post-type.php' );
	//require_once( 'custom-post-type-playground.php' );

	// Define and register starter content to showcase the theme on new sites.
	/*
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'uncompromising' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'uncompromising' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'uncompromising' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'uncompromising' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'uncompromising' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),

	);
	*/

	/**
	 * Filters Uncompromising array of starter content.
	 *
	 * @since Uncompromising 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'uncompromising_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'uncompromising_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
/*function uncompromising_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( uncompromising_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Uncompromising content width of the theme.
	 *
	 * @since Uncompromising 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	 /*
	$GLOBALS['content_width'] = apply_filters( 'uncompromising_content_width', $content_width );
}
add_action( 'template_redirect', 'uncompromising_content_width', 0 );
*/

/**
 * Register custom fonts.
 */
function uncompromising_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'uncompromising' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Uncompromising 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function uncompromising_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'uncompromising-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'uncompromising_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uncompromising_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'uncompromising' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'uncompromising' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer, 1st position.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'uncompromising' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer, 2nd position.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'uncompromising' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer, 3rd position.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer CTA', 'uncompromising' ),
		'id'            => 'footer-cta',
		'description'   => __( 'Add a widget area for a consistent CTA on all pages.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Custom Post Sidebar', 'uncompromising' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in the custom post sidebar.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Account Dashboard Widgets', 'uncompromising' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in the account dashboard.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'uncompromising' ),
		'id'            => 'shop',
		'description'   => __( 'Add widgets here to appear in the shop page.', 'uncompromising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'uncompromising_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Uncompromising 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */

function uncompromising_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uncompromising' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'uncompromising_excerpt_more' );



/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Uncompromising 1.0
 */
function uncompromising_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'uncompromising_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function uncompromising_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'uncompromising_pingback_header' );

/**
 * Display custom color CSS.
 */
function uncompromising_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo uncompromising_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'uncompromising_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function uncompromising_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'uncompromising-fonts', uncompromising_fonts_url(), array(), null );

	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Slabo+27px|Oswald', array(), '', 'all', false );
	
	// Font Awesome
	wp_enqueue_style( 'fa-core', get_theme_file_uri( '/assets/css/fontawesome-pro-core.css' ), array(), '5.0.0', false );
	wp_enqueue_style( 'fa-regular', get_theme_file_uri( '/assets/css/fontawesome-pro-regular.css' ), array(), '5.0.0', false );
	wp_enqueue_style( 'fa-solid', get_theme_file_uri( '/assets/css/fontawesome-pro-solid.css' ), array(), '5.0.0', false );
	wp_enqueue_style( 'fa-light', get_theme_file_uri( '/assets/css/fontawesome-pro-light.css' ), array(), '5.0.0', false );
	wp_enqueue_style( 'fa-brands', get_theme_file_uri( '/assets/css/fontawesome-pro-brands.css' ), array(), '5.0.0', false );

	// Theme stylesheet.
	wp_enqueue_style( 'compiled-styles', get_theme_file_uri( '/assets/css/app.css'), array(), false );

	// Load the dark colorscheme.
	/*
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'uncompromising-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'uncompromising-style' ), '1.0' );
	}
	*/

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'uncompromising-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'uncompromising-style' ), '1.0' );
		wp_style_add_data( 'uncompromising-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	/*
	wp_enqueue_style( 'uncompromising-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'uncompromising-style' ), '1.0' );
	wp_style_add_data( 'uncompromising-ie8', 'conditional', 'lt IE 9' );
	*/

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	//wp_enqueue_script( 'uncompromising-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$uncompromising_l10n = array(
		'quote'          => uncompromising_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	/*
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'uncompromising-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$uncompromising_l10n['expand']         = __( 'Expand child menu', 'uncompromising' );
		$uncompromising_l10n['collapse']       = __( 'Collapse child menu', 'uncompromising' );
		$uncompromising_l10n['icon']           = uncompromising_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}
	*/

	//wp_enqueue_script( 'uncompromising-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	//wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	//wp_localize_script( 'uncompromising-skip-link-focus-fix', 'uncompromisingScreenReaderText', $uncompromising_l10n );

	// Uncompromising Core Scripts
	//wp_enqueue_script( 'jquery-js', get_theme_file_uri( '/assets/js/jquery.min.js' ), array(), '', true );
	wp_enqueue_script( 'tether-js', get_theme_file_uri( '/assets/js/tether.min.js' ), array( ), '', true );
	wp_enqueue_script( 'popper-js', get_theme_file_uri( '/assets/js/popper.js' ), array(), '', true );
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array(), '4.0', true );
	wp_enqueue_script( 'pace-js', get_theme_file_uri( '/assets/js/pace.min.js' ), array( ), '', true );
	wp_enqueue_script( 'datatables-js', get_theme_file_uri( '/assets/js/datatables.min.js' ), array( ), '', true );
	wp_enqueue_script( 'usd-js', get_theme_file_uri( '/assets/js/usd.js' ), array( 'jquery' ),'1.0.9', true );
	wp_enqueue_script( 'usd-datatables-js', get_theme_file_uri( '/assets/js/usd-datatables.js' ), array( ), '', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uncompromising_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Uncompromising 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function uncompromising_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'uncompromising_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Uncompromising 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function uncompromising_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'uncompromising_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Uncompromising 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function uncompromising_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'uncompromising_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Uncompromising 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function uncompromising_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'uncompromising_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Hide the Admin Bar
 */
 add_filter('show_admin_bar', '__return_false');

 /**
 * Recent Posts
 */
function ph_recent_posts() { 
    // the query
    $the_query = new WP_Query( array(
      'posts_per_page' => 3,
    )); 
	
	ob_start(); 
	
?>

  <div class="row">  

    <?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <div class="col-lg-4">
      
        <div class="card">
          <a href="<?php the_permalink(); ?>">
            <div class="card-header" style="background: url('<?php the_post_thumbnail_url("medium"); ?>');background-size: cover; background-position: center center; height: 200px;">
            </div>
          </a>
          <div class="card-block">
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
    </div>
  
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

  </div>

  <?php 
    $ReturnString = ob_get_contents(); 
    ob_end_clean(); 
    return $ReturnString; 
  ?>

  <?php endif; ?>

  <?php 

}

add_shortcode( 'recent', 'ph_recent_posts' );

/**
 * Limit Excerpt Characters
 */
function ph_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'ph_excerpt_length', 999 );

/**
 * Woocommerce
 */

 add_action( 'after_setup_theme', 'woocommerce_support' );
 function woocommerce_support() {
	 add_theme_support( 'woocommerce' );
 }

// Remove Woocommerce Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


/*
add_filter( 'wc_add_to_cart_message_html', 'bbloomer_custom_add_to_cart_message' );
 
function bbloomer_custom_add_to_cart_message() {
 
	global $woocommerce;
	$return_to  = get_permalink(woocommerce_get_page_id('checkout'));
	$message    = sprintf('<a href="%s" class="button wc-forwards">%s</a> %s', $return_to, __('View Cart', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
	return $message;

}
*/

add_filter ( 'wc_add_to_cart_message', 'ph_add_to_cart_message', 10, 2 );

function ph_add_to_cart_message($message, $product_id = null) {
   $titles[] = get_the_title( $product_id );
   $titles = array_filter( $titles );
   $added_text = sprintf( _n( '"%s" has been successfully added to your cart.', '%s have been added to your cart.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );
   $message = sprintf( '%s <a href="%s">%s</a>',
                   $added_text,
                   esc_url( wc_get_page_permalink( 'cart' ) ),
                   esc_html__( 'View Cart', 'woocommerce' ));
   return $message;
}

// Remove Fields from Checkout
/*
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'ph_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function ph_checkout_fields( $fields ) {
	 unset($fields['billing']['billing_company']);
	 unset($fields['billing']['billing_address_1']);
	 unset($fields['billing']['billing_address_2']);
	 unset($fields['billing']['billing_country']);
	 unset($fields['billing']['billing_city']);
	 unset($fields['billing']['billing_state']);
	 unset($fields['billing']['billing_postcode']);
	 unset($fields['billing']['billing_phone']);

     return $fields;
}*/

// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
//remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );
function remove_order_notes( $fields ) {
 unset($fields['order']['order_comments']);
 return $fields;
}

// Remove Password Strength Meter
function ph_remove_password_strength() {
	if ( wp_script_is( 'ph-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'ph-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', 'ph_remove_password_strength', 100 );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
// Compatible with 3.0.1+, for lower versions, remove "woocommerce_" from the first mention on Line 4
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
   global $woocommerce;
   
   ob_start();
   
   ?>
   <a class="btn btn-link" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fal fa-shopping-cart"></i> <?php echo sprintf ( _n( '(%d)', '(%d)', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></a>
   <?php
   
   $fragments['a.cart-customlocation'] = ob_get_clean();
   
   return $fragments;
   
}

// Shop Hooks

function woocommerce_template_loop_product_title() {
	echo '<h2 class="h5 mt-3 woocommerce-loop-product__title">' . get_the_title() . '</h2>';
}

function woocommerce_template_loop_add_to_cart( $args = array() ) {
	global $product;

	if ( $product ) {
		$defaults = array(
			'quantity' => 1,
			'class'    => implode( ' ', array_filter( array(
					'btn',
					'btn-primary',
					'btn-icon',
					'btn-icon-left',
					'd-block',
					'mt-3',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
			) ) ),
		);

		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

		wc_get_template( 'loop/add-to-cart.php', $args );
	}
}

/*
 
add_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );


add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );

*/

/*
 * Open Graph For Facebook
 */
/*
 //Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
global $post;
if ( !is_singular()) //if it is not a post or a page
	return;
	echo '<meta property="fb:admins" content="F1jmBNi+/4y"/>';
	echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:site_name" content="Product Heartbeat"/>';
if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
	$default_image="http://www.productheartbeat.com/wp-content/uploads/ph-fb-primary.png"; //replace this with a default image on your server or an image in your media library
	echo '<meta property="og:image" content="' . $default_image . '"/>';
}
else{
	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
}
echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
*/