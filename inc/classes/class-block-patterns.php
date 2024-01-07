<?php
/**
 * Block Patterns
 *
 * @package Evolution 
 */

namespace EVOLUTION_THEME\Inc;

use EVOLUTION_THEME\Inc\Traits\Singleton;

class Block_Patterns {
    use Singleton;

    protected function __construct(){
        //load class.
       
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions

        add_action('init', [$this, 'register_block_patterns']);
        add_action('init', [$this, 'register_block_pattern_categories']);
    }

    public function register_block_patterns(){

        if( function_exists('register_block_pattern') ){

            //Cover Pattern
            $cover_content = $this->get_pattern_content('template-parts/patterns/cover');

           register_block_pattern(
               'evolution/pattern',
               [
                   'title' => __('Evolution Cover', 'evolution'),
                   'description' => __('Evolution Cover Block with image and text', 'evolution'),
                   'categories' => ['cover'],
                   'content' => $cover_content
               ]
               );
        }
    }

    public function get_pattern_content($template_path){
        ob_start();
        get_template_part($template_path);
        $pattern_content = ob_get_contents();
        ob_end_clean();
        return $pattern_content;
    }

    public function register_block_pattern_categories(){
        $pattern_categories = [
            'cover' => __('Cover', 'evolution'),
            'carousel' => __('Carousel', 'evolution'),
        ];

        if(!empty($pattern_categories)&& is_array($pattern_categories)){
        foreach($pattern_categories as $pattern_category => $pattern_category_label){

            register_block_pattern_category(
                $pattern_category,
                    [
                        'label' => $pattern_category_label
                    ]
                );
            }
        }
    }

   


}





?>