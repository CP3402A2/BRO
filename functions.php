<?php

if ( ! function_exists( 'bro_setup' ) ) :

function bro_setup() {

	load_theme_textdomain( 'bro', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bro' ),
		'social' => __( 'Social Menu', 'bro' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside' ) );
	add_image_size('large-thumb', 1060, 650, true);
	add_image_size('index-thumb', 780, 250, true);


	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // bro_setup
add_action( 'after_setup_theme', 'bro_setup' );

function bro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bro' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'bro' ),
		'description'	=> __( 'Footer widgets area appears in the footer of the site.', 'bro' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'bro_widgets_init' );

function bro_scripts() {
	wp_enqueue_style( 'bro-style', get_stylesheet_uri() );

	if (is_page_template('page-templates/page-nosidebar.php')) {
		wp_enqueue_style( 'bro-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
	} else {
		wp_enqueue_style( 'bro-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}

	wp_enqueue_style( 'bro-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,900,400italic,900italic|PT+Serif:400,700,400italic,700italic' );

	wp_enqueue_style( 'bro-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'bro-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150421', true );

	wp_enqueue_script( 'bro-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('bro-superfish'), '20150421', true );

	wp_enqueue_script( 'bro-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20150421', true );

	wp_enqueue_script( 'bro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150421', true );

	wp_enqueue_script( 'bro-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20150421', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bro_scripts' );

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/jetpack.php';
