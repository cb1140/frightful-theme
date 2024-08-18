<?php
//adds titles via wordpress automatically if no title tag
function ff_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('html5', array('style', 'script'));
    add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'ff-theme-support');


function ff_menu()
{

    $locations = array(
        'main' => "Desktop Primary Top Menu Bar",
        'footer' => "Footer Menu Sitemap"
    );
    register_nav_menus($locations);
}

add_action('init', 'ff_menu');

//initialises stylesheets
function ff_register_stylesheets()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ff-stylesheet', get_template_directory_uri() . "/style.css", array(), $version, 'all');

}

add_action('wp_enqueue_scripts', 'ff_register_styles');

//initialises js scripts
function ff_register_scripts()
{
    wp_enqueue_script('ff-javascript', get_template_directory_uri() . "/assets/js/script.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'ff_register_scripts');


function show_related_films()
{
    if (is_single()) {
        global $post;

        // Get the current post's categories
        $categories = wp_get_post_categories($post->ID);

        // Get the current post's tags
        $tags = wp_get_post_tags($post->ID);

        if ($categories) {
            // Query for up to 5 posts in the same category
            $args = array(
                'category__in' => $categories,
                'post_type' => 'post',
                'post__not_in' => array($post->ID), // Exclude the current post
                'posts_per_page' => 5, // Limit to 5 posts max.
            );

            $related_posts = new WP_Query($args);

            if ($related_posts->have_posts()) {
                echo '<div class="related-films-widget">';
                echo '<h2>Related Films by Category</h2>';
                echo '<ul>';

                while ($related_posts->have_posts()) {
                    $related_posts->the_post();
                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                }

                echo '</ul>';

            }
            ;

            if ($tags) {
                $tag_ids = array();
                foreach ($tags as $individual_tag) {
                    $tag_ids[] = $individual_tag->term_id;
                }

                // Query for up to 5 posts with the same tags
                $args = array(
                    'tag__in' => $tag_ids,
                    'post_type' => 'post',
                    'post__not_in' => array($post->ID), // Exclude the current post
                    'posts_per_page' => 5, // Limit to 5 posts max.
                );

                $related_posts = new WP_Query($args);

                if ($related_posts->have_posts()) {
                    echo '<h2>Related Films by Tags</h2>';
                    echo '<ul>';

                    while ($related_posts->have_posts()) {
                        $related_posts->the_post();
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }

                    echo '</ul>';
                    echo '</div>';
                }
                ;

                // Reset Post Data
                wp_reset_postdata();
            }
            ;
        }
        ;

    }
    ;
}


function ff_widgets()
{

    register_sidebar(
        array(
            'name' => 'Footer Menu',
            'id' => 'footer-menu',
            'description' => 'Footer Widget',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''


        )
    );

    register_sidebar(
        array(
            'name' => 'Related Films Sidebar',
            'id' => 'related-films-sidebar',
            'description' => 'Sidebar Film Widget',
            'before_widget' => '',
            'after_widget' => ''

        )
    );


}


add_action('widgets_init', ff_widgets());

?>