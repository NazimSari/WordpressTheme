<?php
/**
 * Theme Sidebars
 *
 * @package Evolution 
 */

namespace EVOLUTION_THEME\Inc;

use EVOLUTION_THEME\Inc\Traits\Singleton;
class Sidebars {
    use Singleton;

    protected function __construct(){
        //load class.
       
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions

        add_action('widgets_init', [$this, 'register_sidebars']);
        add_action('widgets_init', [$this, 'register_clock_widget']);
    }

    
    public function register_sidebars(){
        register_sidebar([
            'name' => __('Sidebar', 'evolution'),
            'id' => 'sidebar-1',
            'description' => __('Main sidebar', 'evolution'),
            'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => __('Footer', 'evolution'),
            'id' => 'sidebar-2',
            'description' => __('Footer sidebar', 'evolution'),
            'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
    }

    public function register_clock_widget(){    
        register_widget('EVOLUTION_THEME\Inc\Clock_Widget');
    }
    



}





?>