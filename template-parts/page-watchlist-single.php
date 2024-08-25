<?php
/* Template Name: Single Watchlist */

get_header();
?>
<main id="main" class="site-main" role="main">

    <?php
    // Get the current user ID
    $current_user_id = get_current_user_id();

    // Check if a user is logged in
    if ($current_user_id) {

        // Query to get all 'watchlist' posts by the current user
        $user_watchlists = new WP_Query(array(
            'post_type' => 'watchlist',
            'posts_per_page' => -1, // Get all watchlists by this user
            'author' => $current_user_id, // Filter by current user ID
        ));

        if ($user_watchlists->have_posts()) :
            while ($user_watchlists->have_posts()) : $user_watchlists->the_post();
                ?>
                <section class="watchlist">
                    <h2><?php the_title(); ?></h2>
                    
                    <!-- Optional: Display the post thumbnail if available -->
                    <?php if (has_post_thumbnail()): ?>
                        <div class="watchlist-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="watchlist-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Watchlist</a>
                </section>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<p>No watchlists found for this user.</p>';
        endif;

    } else {
        echo '<p>You need to be logged in to view your watchlists.</p>';
    }
    ?>



<?php 
get_footer();
?>
