<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {

    	// modernizr-2.6.2.min.js
  		// jquery.min.js
		// jquery.easing.1.3.js
		// bootstrap.min.js
		// jquery.waypoints.min.js
		// jquery.flexslider-min.js
		// jquery.magnific-popup.min.js
		// magnific-popup-options.js
		// jquery.countTo.js
		// main.js
        wp_deregister_script('jquery');

        // JS registravimas
        // wp_register_script(handle, kelias_iki_failo, dependencies, versija, ar_krauti_i_footer)
		wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery.min.js', false, false, true);
		wp_register_script('modernizr', ASSETS_URL . '/assets/js/modernizr-2.6.2.min.js', false, false, false);

        wp_register_script('easing', ASSETS_URL . '/assets/js/jquery.easing.1.3.js', array('jquery'), false, true);
        wp_register_script('bootstrap', ASSETS_URL . '/assets/js/bootstrap.min.js', array('jquery'), false, true);
        wp_register_script('waypoints', ASSETS_URL . '/assets/js/jquery.waypoints.min.js', array('jquery'), false, true);
        wp_register_script('flex-slider', ASSETS_URL . '/assets/js/jquery.flexslider-min.js', array('jquery'), false, true);
        wp_register_script('magnific', ASSETS_URL . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), false, true);
        wp_register_script('magnific-options', ASSETS_URL . '/assets/js/magnific-popup-options.js', array('jquery'), false, true);
        wp_register_script('count-to', ASSETS_URL . '/assets/js/jquery.countTo.js', array('jquery'), false, true);
        wp_register_script('main', ASSETS_URL . '/assets/js/main.js', array('jquery'), false, true);


        wp_enqueue_script('jquery');
        wp_enqueue_script('modernizr');
        wp_enqueue_script('easing');
        wp_enqueue_script('bootstrap');
        wp_enqueue_script('waypoints');
        wp_enqueue_script('flex-slider');
        wp_enqueue_script('magnific');
        wp_enqueue_script('magnific-options');
        wp_enqueue_script('count-to');
        wp_enqueue_script('main');
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
		wp_register_style('fa', ASSETS_URL.'/assets/css/font-awesome.min.css', array('magnific-popup'), false, 'all');
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
		wp_enqueue_style('fa');
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

$sidebars = array('Footer 1', 'Footer 2', 'Footer 3', 'Footer 4');

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
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
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
		'view_item' => __('View '.$nameSingular),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

function dump($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

// Sukuriame nauja pav. dydi
// add_image_size( $name, $width, $height, false );
// $name - pavadinimas 
// $width - plotis rasosi tik skaicius
// $height - aukstis rasosi tik skaicius
// false - ar bus atliekamas karpymas

add_image_size('logo-image', 100, 40, false);
add_image_size('slider-image', 1060, 0, false);

function create_posttype() {
  register_post_type( 'projects',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('projects')),
      'supports'  => array( 'title', 'editor', 'author', 'thumbnail')
    )
  );
}
add_action( 'init', 'create_posttype' );

add_action( 'init', 'create_project_taxonomy' );

function create_project_taxonomy() {
	register_taxonomy(
		'project-category',
		'projects',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => __('project-category') ),
			'hierarchical' => true,
		)
	);
}

?>