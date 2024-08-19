<?php
/* 
Template Name: Archives
Template Post Type: page, event 
*/ ?>

<?php get_header(); ?>


<main>
    <?php
    // Get all categories
    $categories = get_categories();

    // Loop through each category
    foreach ($categories as $category):
        ?>
        <section>
            <!-- Display the category name as an H2 -->
            <h2><?php echo esc_html($category->name); ?></h2>

            <?php
            // Query posts in the current category
            $query_args = array(
                'cat' => $category->term_id, // Category ID
                'posts_per_page' => -1, // Display all posts in the category
                'orderby' => 'date', // Order by date
                'order' => 'DESC' // Newest posts first
            );

            $category_query = new WP_Query($query_args);

            if ($category_query->have_posts()):
                echo '<ul>'; // Start an unordered list
        
                while ($category_query->have_posts()):
                    $category_query->the_post();
                    ?>
                    <!-- Display each post as a list item with a link to the post -->
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php
                endwhile;

                echo '</ul>'; // End the unordered list
            else:
                // If no posts found, display a message
                echo '<p>No posts found in this category.</p>';
            endif;

            // Reset post data
            wp_reset_postdata();
            ?>
        </section>
    <?php endforeach; ?>
</main>

<?php get_footer(); ?>