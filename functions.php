<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {

        wp_deregister_script('jquery');
				wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery-2.1.1.js', false, '2.1.1', true);

        wp_register_script('js_main', ASSETS_URL . '/assets/js/main.js', array('jquery'), '1.0', true);
        wp_enqueue_script('js_main');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/main.css';

	if( $styles_path ) {

		// https://fonts.googleapis.com/css?family=Oxygen:300,400
		// https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700
		// css/animate.css
		// css/icomoon.css
		// css/bootstrap.css
		// css/magnific-popup.css
		// css/flexslider.css
		// css/style.css

		// Stiliaus registravimas
		// wp_register_style(handle, kelias_iki_failo, dependency, versijos_nr, devices)
		wp_register_style('oxygen-font', 'https://fonts.googleapis.com/css?family=Oxygen:300,400', array(), false, 'all');
		wp_register_style('source-sans-pro-font', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), false, 'all');

		wp_register_style('animate', ASSETS_URL.'/assets/css/animate.css', array(), false, 'all');
		wp_register_style('icomoon', ASSETS_URL.'/assets/css/icomoon.css', array('animate'), false, 'all');
		wp_register_style('bootstrap', ASSETS_URL.'/assets/css/bootstrap.css', array('icomoon'), false, 'all');
		wp_register_style('magnific-popup', ASSETS_URL.'/assets/css/magnific-popup.css', array('bootstrap'), false, 'all');
		wp_register_style('flexslider', ASSETS_URL.'/assets/css/flexslider.css', array('magnific-popup'), false, 'all');
		wp_register_style('main-css', ASSETS_URL . '/assets/css/style.css', array('flexslider'), false, 'all');

		// Stiliaus failu iskvietimas
		// wp_enqueue_style(handle);
		wp_enqueue_style('oxygen-font');
		wp_enqueue_style('source-sans-pro-font');
		wp_enqueue_style('animate');
		wp_enqueue_style('icomoon');
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('magnific-popup');
		wp_enqueue_style('flexslider');
		wp_enqueue_style('main-css');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation' ) 
    ));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
//'Testimonials' => 'Testimonial'

);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

?>