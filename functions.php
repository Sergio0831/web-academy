<?php
/**
 * Web Academy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Web_Academy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function web_academy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Web Academy, use a find and replace
	 * to change 'web-academy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'web-academy', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary_menu' => esc_html__( 'Primary Menu', 'web-academy' ),
		)
	);

	// Add custom class to nav items
	function custom_nav_menu_css_class( $classes ) {
		$classes[] = 'nav-item';

		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'custom_nav_menu_css_class', 10, 1 );

	// Add custom class to nav items links
	function custom_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
		// Add Bootstrap nav-link class to all menu links
		$atts['class'] = 'nav-link';

		// Check if the item is the current item and add active class
		if ( $item->current || $item->current_item_ancestor ) {
			$atts['class'] .= ' active';
		}

		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10, 4 );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
	add_image_size( 'blogPost', 500, 600, true );
	add_image_size( 'blogPostThumbnail', 80, 80, true );
}
add_action( 'after_setup_theme', 'web_academy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function web_academy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'web_academy_content_width', 640 );
}
add_action( 'after_setup_theme', 'web_academy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function web_academy_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Sidebar %d', 'web-academy' ),
			'id' => 'sidebar_blog',
			'description' => esc_html__( 'Add widgets here.', 'web-academy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s mb-5">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title text-uppercase mb-4">',
			'after_title' => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'web_academy_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function web_academy_scripts() {
	wp_enqueue_script(
		'bootstrap-js',
		'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.4.1', true
	);
	wp_enqueue_script(
		'easing',
		get_theme_file_uri( 'lib/easing/easing.min.js' ), array( 'jquery' ), '1.4.1', true
	);
	wp_enqueue_script(
		'owlcarousel',
		get_theme_file_uri( 'lib/owlcarousel/owl.carousel.min.js' ), array( 'jquery' ), '2.2.1', true
	);
	wp_enqueue_script(
		'bootstrap-validation',
		get_theme_file_uri( 'mail/jqBootstrapValidation.min.js' ), array( 'jquery' ), '1.0', true
	);
	wp_enqueue_script(
		'web-academy-script',
		get_theme_file_uri( '/build/index.js' ), array( 'jquery' ), '1.0', true
	);
	wp_enqueue_style( 'owlcarousel-styles', get_theme_file_uri( '/lib/owlcarousel/assets/owl.carousel.min.css' ) );
	wp_enqueue_style( 'web-academy-style', get_theme_file_uri( '/build/style-index.css' ) );
	wp_style_add_data( 'web-academy-style', 'rtl', 'replace' );
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap' );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'web_academy_scripts' );

/**
 * Register custom settings and controls
 */
function webacademy_customize_register( $wp_customize ) {
	// Office Address
	$wp_customize->add_setting( 'office_address', array(
		'default' => '123 Street, Dublin, Ireland',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'office_address', array(
		'label' => __( 'Office Address', 'mytheme' ),
		'section' => 'title_tagline',
		'type' => 'text',
	) );

	// Email
	$wp_customize->add_setting( 'contact_email', array(
		'default' => 'webacademy@email.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'contact_email', array(
		'label' => __( 'Contact Email', 'mytheme' ),
		'section' => 'title_tagline',
		'type' => 'email',
	) );

	// Phone Number
	$wp_customize->add_setting( 'contact_phone', array(
		'default' => '01 816 7444',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'contact_phone', array(
		'label' => __( 'Contact Phone', 'mytheme' ),
		'section' => 'title_tagline',
		'type' => 'text',
	) );
}
add_action( 'customize_register', 'webacademy_customize_register' );

// Custom title
// Add this function to your theme's functions.php file
function display_site_logo_or_name( $is_mobile = false ) {
	$link_class = $is_mobile ? 'text-decoration-none d-block d-lg-none' : 'text-decoration-none';
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		$site_title = get_bloginfo( 'name' );
		$words = explode( ' ', $site_title );
		if ( count( $words ) == 2 ) {
			$part1 = $words[0];
			$part2 = $words[1];
		} else {
			$part1 = $site_title;
			$part2 = '';
		}
		if ( is_front_page() && is_home() ) {
			echo '<h1 class="m-0"><span class="text-primary">' . esc_html( $part1 ) . '</span>' . esc_html( $part2 ) . '</h1>';
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="' . $link_class . '">';
			echo '<h1 class="m-0"><span class="text-primary">' . esc_html( $part1 ) . '</span>' . esc_html( $part2 ) . '</h1>';
			echo '</a>';
		}
	}
}

// Page banner
function pageBanner( $args = NULL ) {

	if ( ! isset( $args['title'] ) ) {
		if ( get_field( 'page_banner_title' ) and ! is_archive() and ! is_home() ) {
			$args['title'] = get_field( 'page_banner_title' );
		} elseif ( is_home() ) {
			$args['title'] = get_the_title( get_option( 'page_for_posts', true ) );
		} else {
			$args['title'] = get_the_title();
		}
	}

	if ( ! isset( $args['photo'] ) ) {
		if ( get_field( 'page_banner_background_image' ) and ! is_archive() and ! is_home() ) {
			$args['photo'] = get_field( 'page_banner_background_image' )['url'];
		} else {
			$args['photo'] = get_theme_file_uri( '/img/page-header.webp' );
		}
	} ?>

	<section class="container-fluid page-header"
		style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $args['photo'] ?>');">
		<div class="container">
			<div class="d-flex flex-column justify-content-center" style="min-height: 300px">
				<h2 class="display-4 text-white"><?php echo $args['title'] ?></h2>
				<!-- Breadcrumbs start -->
				<?php web_academy_breadcrumbs() ?>
				<!-- Breadcrumbs start -->
			</div>
		</div>
	</section>
<?php }

// Breadcrumbs
function web_academy_breadcrumbs() {
	if ( is_front_page() ) {
		return; // Do not display breadcrumbs on the front page
	}

	echo '<nav aria-label="breadcrumb">';
	echo '<ol class="breadcrumb">';

	echo '<li class="breadcrumb-item"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><i class="fa fa-angle-double-right pt-1 px-3 text-white"></i></li>';

	if ( is_home() ) {
		echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title( get_option( 'page_for_posts', true ) ) . '</li>';
	} elseif ( is_category() ) {
		echo '<li class="breadcrumb-item active" aria-current="page">' . single_cat_title( '', false ) . '</li>';
	} elseif ( is_single() ) {
		$blog_page_id = get_option( 'page_for_posts' );
		if ( $blog_page_id ) {
			echo '<li class="breadcrumb-item"><a href="' . get_permalink( $blog_page_id ) . '">Blog</a></li>';
			echo '<li><i class="fa fa-angle-double-right pt-1 px-3 text-white"></i></li>';
		}
		echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
	} elseif ( is_page() ) {
		global $post;
		if ( $post->post_parent ) {
			$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
			foreach ( $ancestors as $ancestor ) {
				echo '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
				echo '<li><i class="fa fa-angle-double-right pt-1 px-3 text-white"></i></li>';
			}
		}
		echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
	} elseif ( is_search() ) {
		echo '<li class="breadcrumb-item active" aria-current="page">Search results for: ' . get_search_query() . '</li>';
	} elseif ( is_404() ) {
		echo '<li class="breadcrumb-item active" aria-current="page">Error 404</li>';
	} elseif ( is_tag() ) {
		echo '<li class="breadcrumb-item active" aria-current="page">' . single_tag_title( '', false ) . '</li>';
	} elseif ( get_query_var( 'paged' ) ) {
		echo '<li class="breadcrumb-item active" aria-current="page">Page ' . get_query_var( 'paged' ) . '</li>';
	}

	echo '</ol>';
	echo '</nav>';
}

// Search only blog posts
function filter_search_only_posts( $query ) {
	if ( $query->is_search && $query->is_main_query() ) {
		$query->set( 'post_type', 'post' );
	}
}

add_action( 'pre_get_posts', 'filter_search_only_posts' );

// Custom Pagination
function custom_pagination( $numpages = '', $pagerange = '', $paged = '' ) {
	if ( empty( $pagerange ) ) {
		$pagerange = 2;
	}

	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}
	if ( $numpages == '' ) {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if ( ! $numpages ) {
			$numpages = 1;
		}
	}

	$pagination_args = array(
		'base' => get_pagenum_link( 1 ) . '%_%',
		'format' => 'page/%#%',
		'total' => $numpages,
		'current' => $paged,
		'show_all' => true,
		'end_size' => 1,
		'mid_size' => $pagerange,
		'prev_next' => false,
		'prev_text' => false,
		'next_text' => false,
		'type' => 'array',
		'add_args' => false,
		'add_fragment' => ''
	);

	$paginate_links = paginate_links( $pagination_args );

	if ( $paginate_links ) {
		echo '<nav aria-label="Page navigation">';
		echo '<ul class="pagination pagination-lg justify-content-center mb-0">';

		// Previous button
		if ( $paged > 1 ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
		} else {
			echo '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
		}

		foreach ( $paginate_links as $link ) {
			if ( strpos( $link, 'current' ) !== false ) {
				echo '<li class="page-item active">' . str_replace( 'page-numbers', 'page-link', $link ) . '</li>';
			} else {
				echo '<li class="page-item">' . str_replace( 'page-numbers', 'page-link', $link ) . '</li>';
			}
		}

		// Next button
		if ( $paged < $numpages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged + 1 ) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
		} else {
			echo '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
		}

		echo '</ul>';
		echo '</nav>';
	}
}













