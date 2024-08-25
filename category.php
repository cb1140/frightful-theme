<?php
get_header();
?>

<main>
    <?php
    // Get the current category object
    $current_term = get_queried_object(); // This retrieves the current category or term being viewed
    
    // Check if we have a valid term
    if ($current_term && !is_wp_error($current_term)):
        ?>
        <h1><?php echo esc_html($current_term->name); ?></h1>

        <?php
        // Query to get custom 'movie' posts in the current category
        $query_args = array(
            'post_type' => 'movie', // Custom post type 'movie'
            'posts_per_page' => -1, // Display all posts
            'orderby' => 'date', // Order by date
            'order' => 'DESC', // Newest posts first
            'tax_query' => array(
                array(
                    'taxonomy' => 'category', // Assuming 'category' is the taxonomy associated with 'movie' posts
                    'field' => 'term_id',
                    'terms' => $current_term->term_id, // Current taxonomy term ID
                ),
            ),
        );

        $movie_query = new WP_Query($query_args);

        if ($movie_query->have_posts()):
            echo '<ul>'; // Start an unordered list
        
            while ($movie_query->have_posts()):
                $movie_query->the_post();
                ?>
                <!-- Display each movie as a list item with a link to the post -->
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <!-- Optional: Display the post thumbnail if available -->
                    <?php if (has_post_thumbnail()): ?>
                        <div class="movie-thumbnail">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                    <?php endif; ?>
                </li>
                <?php
            endwhile;

            echo '</ul>'; // End the unordered list
        else:
            // If no movies found, display a message
            echo '<p>No movies found in this category.</p>';
        endif;

        // Reset post data
        wp_reset_postdata();

    else:
        // If no term is found, display an error message
        echo '<p>No such category found. Please check the category name and try again.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
