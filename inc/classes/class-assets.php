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

        

    }



}





?>