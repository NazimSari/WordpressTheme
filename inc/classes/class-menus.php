<?php
/**
 * Register Menus
 *
 * @package Evolution 
 */

namespace EVOLUTION_THEME\Inc;

use EVOLUTION_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct(){
        //load class.
        Assets::get_instance();
        
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions
        add_action('init', [$this, 'register_menus']);

    }

    public function register_menus(){
      register_nav_menus([
          'evolution-header-menu' => esc_html__('Header Menu', 'evolution'),
          'evolution-footer-menu' => esc_html__('Footer Menu', 'evolution')
      ]);   
    }

    public function get_menu_id($location){
        //Get all yhe locations

        $locations = get_nav_menu_locations();

        //Get object id by location
        $menu_id = $locations[$location];

        return ! empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_items($menu_array, $parent_id){
        
        $child_menus = [];

        if(!empty($menu_array)&& is_array($menu_array)){
            foreach($menu_array as $menu){
                if(intval($menu->menu_item_parent) === $parent_id){
                
                    array_push($child_menus, $menu);
                
                }

                    
            }
        }
        return $child_menus;
    }



}





?>