<?php 
/**
 * Template for entry content
 * 
 * To be used inside WordPress loop
 * 
 * @package Evolution
 */


?>

<div class="entry-content">
      
    <?php 
    if(is_single()){
        the_content(
            sprintf(
                wp_kses(
                   __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'evolution' ),
                   [
                       'span' => ['class' => []]
                   ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false),
            )
    );
    }else{
        evolution_the_excerpt();
        echo evolution_excerpt_more();
    }
        
    ?>
</div>