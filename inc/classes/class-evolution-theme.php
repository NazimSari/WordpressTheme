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
        $this-> set_hooks();
    }

    protected function set_hooks(){
        //action and filters
    }
}



?>