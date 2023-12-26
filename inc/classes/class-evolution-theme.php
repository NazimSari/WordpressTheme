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

        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //action and filters

        add_action('after_setup_theme', [$this, 'setup_theme']);

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
    }
}



?>