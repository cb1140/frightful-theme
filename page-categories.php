<?php /* 
Template Name: Example Template
Template Post Type: post, page, event 
*/ ?>

<?php

get_header();

?>

<main>
    <h1>Film Categories</h1>

    <?php


    get_template_part('template-parts/content', 'category-display');

    ?>
</main>


<?php
get_footer();
?>