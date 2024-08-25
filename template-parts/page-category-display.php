<?php
/*
Template Name: Movie Categories and Watchlists
*/

get_header();
?>

<main>
    <?php
    // Get all categories (terms) associated with the 'movie' post type
    $movie_categories = get_terms(array(
        'taxonomy' => 'category', // Replace with your custom taxonomy name
        'hide_empty' => false, // Show categories even if they have no posts
    ));

    // Check if there are categories
    if (!empty($movie_categories) && !is_wp_error($movie_categories)):

        // Loop through each category
        foreach ($movie_categories as $category):
            ?>
            <section>
                <!-- Display the category name as an H2 -->
                <h2><?php echo esc_html($category->name); ?></h2>

                <?php
                // Get the movies in this category
                $movie_args = array(
                    'post_type' => 'movie', // Custom post type 'movie'
                    'posts_per_page' => 6, // Limit to 6 latest posts
                    'orderby' => 'date', // Order by date
                    'order' => 'DESC', // Newest posts first
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category', // Custom taxonomy
                            'field' => 'term_id',
                            'terms' => $category->term_id, // Current category ID
                        ),
                    ),
                );

                $movie_query = new WP_Query($movie_args);

                if ($movie_query->have_posts()):
                    echo '<ul>'; // Start an unordered list
        
                    while ($movie_query->have_posts()):
                        $movie_query->the_post();
                        ?>
                        <!-- Display each movie as a list item with a link to the post -->
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                        <?php
                    endwhile;

                    echo '</ul>'; // End the unordered list
        
                    // Reset post data
                    wp_reset_postdata();
                else:
                    // If no movies found in this category, display a message
                    echo '<p>No movies found in this category.</p>';
                endif;
                ?>

                
            </section>


            <?php
        endforeach;

    else:
        echo '<p>No categories found.</p>';
    endif;
    ?>

    <a href="https://frightfulfeatures.uk/mywatchlists/">Go Back To Watchlists</a>
</main>

<?php get_footer(); ?>