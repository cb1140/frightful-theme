<nav class="film-sidebar" aria-label="secondary">

    <?php show_related_films(); ?>
    <?php if (function_exists('dynamic_sidebar')) {
        dynamic_sidebar('sidebar-films');
    } ?>

   
</nav>