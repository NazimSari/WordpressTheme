<?php
function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []){
    $custom_thumbnail = '';

    if($post_id === null){
        $post_id = get_the_ID();

    }
    if(has_post_thumbnail($post_id)){
    $default_attributes =[
        'loading'=>'lazy'
        ];

        $attributes = array_merge($additional_attributes, $default_attributes);
        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $additional_attributes
        );
    }

    return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []){
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}


function evolution_posted_on() {
    $is_modified = get_the_time('U') !== get_the_modified_time('U');
    $date_format = 'j F Y';

    $time_string = $is_modified ?
        '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>' :
        '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date($date_format)),
        esc_attr(get_the_date('c')),
        esc_html(get_the_date($date_format))
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'evolution'),
        '<a class="text-decoration-none" href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

function evolution_posted_by() {
    $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'evolution'),
        '<span class="author vcard"><a class="text-decoration-none" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) .'">' . esc_html(get_the_author()) .'</a></span>'
    );   
    echo '<span class="byline text-secondary"> '. $byline . '</span>';

}

function evolution_the_excerpt($trim_character_count = 0) {
    
    if(! has_excerpt()|| $trim_character_count === 0){
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $trim_character_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . '[...]';

}

function evolution_excerpt_more($more = ' '){
    if(!is_single()){
        $more = sprintf(
            '<button class="mt-2 btn btn-info"><a class="evolution-read-more text-white text-decoration-none" href="%1$s">%2$s</a></button>',
            get_permalink(get_the_ID()),
            __('Read more', 'evolution')
        );
    }
    return $more;
}

function evolution_pagination(){
    $allowed_tags = [
        'span' => ['class' => []
        
        ],
        'a' => [
            'class' => [],
            'href' => [],
        ]
    ];

    $args = [
        'before_page_number' => '<span class="btn border border-secondary me-2 mb-2">',
        'after_page_number' => '</span>',
    ];

   printf(
    '<nav class="evolution-pagination clearfix">%s</nav>',
    wp_kses(paginate_links($args),$allowed_tags)
   );
}

?>