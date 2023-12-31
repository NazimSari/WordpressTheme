<?php
/**
 * Front Page Template
 * 
 * @package Evolution
 */

 get_header();
 ?>
 
    <div id="primary">
      <main id="main" class="site-main mt-5" role="main">
           <div class="home-page-wrap">
           <?php
           if(have_posts()):
             while(have_posts()) : the_post();
                 
                          get_template_part('template-parts/content', 'page');
                          
                     endwhile;                                  
                    ?>                                        
           <?php
 
           else:
                get_template_part('template-parts/content-none');
           endif;
           ?>
           </div>
      </main>
    </div>
 
  <?php get_footer(); 