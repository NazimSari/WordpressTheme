<?php
/**
 * Content Page Template
 * 
 * @package Evolution
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    if(!is_home()){
        ?>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>
        <?php
    }
    ?>

    <div class="entry-content">
        <?php
        the_content();
        if(!is_home()){
            wp_link_pages([
                'before'=> '<div class="page-links">'. esc_html__('Pages:','evolution'),
                'after' => '</div>',
            ]);
        }
        ?>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link(esc_html__('Edit','evolution'), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>