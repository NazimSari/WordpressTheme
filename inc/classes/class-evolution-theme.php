<?php 
/**
 * Bootstraps the Theme
 * 
 * 
 * @package Evolution
 * 
 */
namespace EVOLUTION_THEME\Inc;
use EVOLUTION_THEME\Inc\Traits\Singleton;

class EVOLUTION_THEME {
    use Singleton;

    protected function __construct(){
        //load class.

        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Block_Patterns::get_instance();

        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions

        add_action('after_setup_theme', [$this, 'setup_theme']);
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);

    }

    public function register_styles(){

    // Register Styles
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime( EVOLUTION_DIR_PATH .'/style.css'), 'all');
    wp_register_style('bootstrap-css', EVOLUTION_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

    // Enqueue Styles
    wp_enqueue_style('style-css');
    wp_enqueue_style('bootstrap-css');

    }

    public function register_scripts(){
        
     // Register Scripts
     wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory().'/assets/src/js/main.js'), true);
     wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

     // Enqueue Scripts
     wp_enqueue_script('main-js');
     wp_enqueue_script('bootstrap-js');
    }
    

    public function setup_theme(){
        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
        'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => ['site-title', 'site-description' ],
		'unlink-homepage-logo' => true, 
        ]);

        add_theme_support( 'custom-background',[
            'default-color' => 'ffffff',
            'default-image' => '' , 
            'default-repeat' => 'no-repeat',]
        );
        
        add_theme_support( 'post-thumbnails' );
        /**
         * Register image sizes
         */
        add_image_size('featured-thumbnail', 356,200, true);

        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5',  [
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption',
        'style', 
        'script', 
        ] );
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_editor_style('assets/build/css/editor.css');

        global $content_width;
        if(!isset($content_width)){
            $content_width = 1240;      
        }
    }
}



?>