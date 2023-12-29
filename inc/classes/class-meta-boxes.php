<?php
/**
 * Register meta boxes
 *
 * @package Evolution 
 */

namespace EVOLUTION_THEME\Inc;

use EVOLUTION_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct(){
        //load class.
       
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        //actions

        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);            

    }

    public function add_custom_meta_box($post){
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide_page_title',                      //unique ID
                __('Hide Page Title', 'evolution'),     //Box title
                [$this, 'custom_meta_box_html'],        //Content callback, must be of type callable
                $screen, 
                'side',                               //Post type
            );
                
        }
        
    }

    public function custom_meta_box_html($post){
        $value = get_post_meta($post->ID, '_hide_page_title', true);

        ?>
        <label for="evolution-field"><?php esc_html_e('Hide Page Title', 'evolution');?></label>
        <select name="evolution_field" id="evolution-field" class="postbox">
            <option value=""><?php esc_html_e('Select', 'evolution'); ?></option>
            <option value="yes" <?php selected($value, 'yes'); ?>>
            <?php esc_html_e('Yes', 'evolution');?>
        </option>
            <option value="no" <?php selected($value, 'no'); ?>>
            <?php esc_html_e('No', 'evolution');?>
        </option>
        </select>

        <?php
            
    }





}





?>