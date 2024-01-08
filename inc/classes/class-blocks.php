<?php
/**
 * Blocks
 *
 * @package Evolution 
 */

namespace EVOLUTION_THEME\Inc;

use EVOLUTION_THEME\Inc\Traits\Singleton;

class Blocks {
    use Singleton;

    protected function __construct(){
        //load class.
       
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions
        add_action('block_categories',[$this,'add_block_categories']);
    }

    public function add_block_categories($categories){
        $category_slugs = wp_list_pluck($categories,'slug');
        return in_array('evolution', $category_slugs, true) ? $categories :
        array_merge(
            $categories,
            [
                [
                'slug'=> 'evolution',
                'title' => __('Evolution Blocks', 'evolution'),
                'icon' => 'table-row-after'
                ]
            ]
        );
    }


}





?>