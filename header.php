<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!--This is Charlotte's boilerplate, and if you are seeing this with the intent to use it, all I ask for is some credit on your webpage <3-->
<!--Feel free to delete the fun fact sections, I thought they were cute-->
<!--I've commented sections that may be new to some people/not as frequently used-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <!--Stylesheet File-->
    <link rel="stylesheet" href="style.css">
        <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header>
        <nav aria-label="main">
            		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>

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

        

    </header>