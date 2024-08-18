<?php

get_header();

?>

<main>
            <h1><?php the_title(); ?></h1>

    <?php

   
            get_template_part('template-parts/content', 'archive');
     
    ?>
</main>

<?php
get_footer();
?>