<?php
/**
 * Theme functions
 * 
 * @package Evolution
 */

 if(!defined('EVOLUTION_DIR_PATH')){
     define('EVOLUTION_DIR_PATH', untrailingslashit(get_template_directory()));
 }

 if(!defined('EVOLUTION_DIR_URI')){
    define('EVOLUTION_DIR_URI', untrailingslashit(get_template_directory_uri()));
 }

 if(!defined('EVOLUTION_BUILD_URI')){
    define('EVOLUTION_BUILD_URI', untrailingslashit(get_template_directory_uri()).'/assets/build');
 }

if(!defined('EVOLUTION_BUILD_PATH')){
   define('EVOLUTION_BUILD_PATH', untrailingslashit(get_template_directory()). '/assets/build');
}

 if(!defined('EVOLUTION_BUILD_JS_URI')){
    define('EVOLUTION_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()).'/assets/build/js');
 }

 if(!defined('EVOLUTION_BUILD_JS_DIR_PATH')){
    define('EVOLUTION_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()). '/assets/build/js');
}

 if(!defined('EVOLUTION_BUILD_IMG_URI')){
    define('EVOLUTION_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()).'/assets/build/src/img');
 }

 if(!defined('EVOLUTION_BUILD_CSS_URI')){
    define('EVOLUTION_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()).'/assets/build/css');
 }
 if(!defined('EVOLUTION_BUILD_LIB_URI')){
   define('EVOLUTION_BUILD_LIB_URI', untrailingslashit(get_template_directory_uri()).'/assets/src/library');
}

 if(!defined('EVOLUTION_BUILD_CSS_DIR_PATH')){
    define('EVOLUTION_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()). '/assets/build/css');
}


 require_once EVOLUTION_DIR_PATH . '/inc/helpers/autoloader.php';
 require_once EVOLUTION_DIR_PATH . '/inc/helpers/template-tags.php';

 function evolution_get_theme_instance(){
     \EVOLUTION_THEME\Inc\EVOLUTION_THEME::get_instance();
 }

 evolution_get_theme_instance();

 function evolution_enqueue_scripts(){
    
 }




add_action('wp_enqueue_scripts', 'evolution_enqueue_scripts');

?>