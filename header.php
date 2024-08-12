<!DOCTYPE html>
<html lang="en">

<!--This is Charlotte's boilerplate, and if you are seeing this with the intent to use it, all I ask for is some credit on your webpage <3-->
<!--Feel free to delete the fun fact sections, I thought they were cute-->
<!--I've commented sections that may be new to some people/not as frequently used-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--SEO Content Description tag-->
    <meta name="description"
        content="Frightful Features is a database of horror films for the newest fans or the oldest fanatics to browse and discover new recommendations and watchlists">

    <!--This doesn't have to be a PNG, change it to whatever you'd like (.ico, .jpeg, ect.)-->
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- A title is a great help to SEO, and a good practise should be <Your H1 Title | Site Title> -->
    <title>Frightful Features</title>
    <!--Stylesheet File-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav aria-label="main">
            <a href="index.php">
                <?php echo get_bloginfo('name'); ?>
            </a>
            <?php


            wp_nav_menu(
                array(
                    'menu' => 'main',
                    'container' => '',
                    'theme_location' => 'main',
                    'items_wrap' => '<ul id="" class="">%3$s</ul>'
                ) //this is where we create a wrap of the menu navigation made by WP in a ul
                //give the individual items classes in the menu screen options
            );

            if (function_exists('the_custom_logo')) {
                $custom_logo_id = get_theme_mod('custom-logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
            }
            ?>

        </nav>
        <h1><?php the_title(); ?></h1>

    </header>