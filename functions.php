<?php
/**
 * Theme functions
 * 
 * @package Evolution
 */

 if(!defined('EVOLUTION_THEME_DIR')){
     define('EVOLUTION_THEME_DIR', untrailingslashit(get_template_directory()));
 }

 require_once EVOLUTION_THEME_DIR . '/inc/helpers/autoloader.php';

 function evolution_get_theme_instance(){
     \EVOLUTION_THEME\Inc\EVOLUTION_THEME::get_instance();
 }

 evolution_get_theme_instance();

 function evolution_enqueue_scripts(){
    
    // Register Styles
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory().'/style.css'), 'all');
    wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');
    
     // Register Scripts
     wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory().'/assets/main.js'), true);
     wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

     // Enqueue Styles
     wp_enqueue_style('style-css');
     wp_enqueue_style('bootstrap-css');

     // Enqueue Scripts
     wp_enqueue_script('main-js');
     wp_enqueue_script('bootstrap-js');
    }


add_action('wp_enqueue_scripts', 'evolution_enqueue_scripts');

?>