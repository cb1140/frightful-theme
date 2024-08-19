
<?php get_header(); ?>

<main>

    <?php

    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'movie-entry');
        }
    }

    ?>


</main>
<?php get_footer(); ?>