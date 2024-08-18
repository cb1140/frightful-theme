<?php

get_header();

?>

<main>
            <h1>Film Categories</h1>

    <?php


    get_template_part('template-parts/content', 'page');

    ?>
</main>

<?php
the_posts_pagination();
?>

<?php
get_footer();
?>