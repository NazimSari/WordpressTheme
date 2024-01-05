<?php
/**
 * Enqueue Theme Assets
 *
 * @package Evolution 
 */

namespace EVOLUTION_THEME\Inc;

use EVOLUTION_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct(){
        //load class.
       
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions

        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);      

    }

    public function register_styles(){
        //Register Styles
        wp_register_style('bootstrap-css', EVOLUTION_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false, 'all');
        wp_register_style('main-css', EVOLUTION_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime(EVOLUTION_BUILD_CSS_DIR_PATH .'/main.css'), 'all');       
        // wp_enqueue_style('fonts-css', get_template_directory_uri().'/assets/src/library/fonts/fonts.css', [], false, 'all');
        
        // Enqueue Styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('main-css');
    }
    public function register_scripts(){
        
        // Register Scripts
        wp_register_script('main-js', EVOLUTION_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(EVOLUTION_BUILD_JS_DIR_PATH .'/main.js'), true);
        wp_register_script('bootstrap-js', EVOLUTION_BUILD_LIB_URI . '/js/bootstrap.min.js', ['jquery'], false, true);
   
        // Enqueue Scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
       }



}





?>