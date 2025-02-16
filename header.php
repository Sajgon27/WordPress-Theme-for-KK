<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if (is_front_page() || is_home()) {
            bloginfo('name');
            echo ' | ';
            bloginfo('description');
        } else {
            wp_title('');
            echo ' | ';
            bloginfo('description');
        }
        ?>
        </title>
        <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="container ">

        <div class="wrapper flex-row">
            <a href="/" class="logo-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" />
            </a>
            <nav class="flex-row menu-desktop">
                <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                <a class="btn-secondary " href="https://patronite.pl/ksaweryknotz"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/hand-heart.png" />Wesprzyj!</a>
                <a class="btn-primary" href="https://szansaspotkania.pl/">Szansa Spotkania<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
            </nav>
            <div class="mobile-menu">
                <img class="mobile-toggle" width="20px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/navigation.png" />
                <div class="mobile-menu-list hidden">
                    <?php wp_nav_menu(array('theme_location' => 'primary-mobile')); ?>
                </div>

            </div>
        </div>

    </header>