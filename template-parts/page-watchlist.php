<?php
/* Template Name: Watchlists */
get_header();
?>

<main id="main" class="site-main" role="main">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Watchlists', 'your-theme-textdomain'); ?></h1>
    </header><!-- .page-header -->

    <?php
    // Query to get all watchlists
    $watchlist_query = new WP_Query(array(
        'post_type' => 'watchlist', // Custom post type 'watchlist'
        'posts_per_page' => -1, // Display all watchlists
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    if ($watchlist_query->have_posts()):
        while ($watchlist_query->have_posts()):
            $watchlist_query->the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
                    <?php
        endwhile;

        // Reset post data
        wp_reset_postdata();
    else:
        echo '<p>No watchlists found.</p>';
    endif;
    ?>
</main><!-- #main -->

<?php
get_footer();
?>
