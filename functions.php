<?php
if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
endif;

if ( function_exists('register_sidebars') ):
  register_sidebar(array(
    'name'=>'Sidebar',
    "id"=>1,
    'before_title'=>'<h4>',
    'after_title'=>'</h4>'
  ));
endif;

add_editor_style( 'css/editor-style.css' );


/**
 * Load jQuery from Google CDN, fallback to local
 */
if( !is_admin()){ 
  $url = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'; 
  $test_url = @fopen($url,'r'); 
  if($test_url !== false) { 
      function load_external_jQuery() {
          wp_deregister_script( 'jquery' ); 
          wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); 
          wp_enqueue_script('jquery'); 
      }
    add_action('wp_enqueue_scripts', 'load_external_jQuery'); 
  } else {
      function load_local_jQuery() {
          wp_deregister_script('jquery'); 
          wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery.min.js', __FILE__, false, '1.11.1', true); 
          wp_enqueue_script('jquery'); 
      }
  add_action('wp_enqueue_scripts', 'load_local_jQuery'); 
  }
}

function register_scripts() {
  if (!is_admin()) {
    wp_register_script( 'global', get_template_directory_uri() . '/js/global.js', array('jquery'));
    wp_enqueue_script( 'global' );
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script( 'bootstrap' );
  }
}
add_action('wp_enqueue_scripts', 'register_scripts');


// add options page
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}
?>