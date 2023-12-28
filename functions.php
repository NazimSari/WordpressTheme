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