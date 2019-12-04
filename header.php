<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Black Sheep Sanctuary</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="assets\css\style.min.css">
</head>
<body>
    <?php if (has_nav_menu('top_navigation')): ?>
        <nav id="header" class="navbar navbar-expand-md navbar-dark primary" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo get_bloginfo('name'); ?></a>
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'top_navigation',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'top_navigation',
                    'menu_class'      => 'navbar-nav mr-auto ',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
            </div>
        </nav>
    <?php endif; ?>
