<?php

get_header();

?>

<main>
    <?php


    get_template_part('template-parts/content', 'archive');

    ?>
</main>

<?php
the_posts_pagination();
?>

<?php
get_footer();
?>