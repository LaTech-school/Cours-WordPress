<?php
//======================================================================
// NetLab WordPress Theme Boilerplate
//======================================================================

// File: ./header.php
// Template: Partial
// More info at https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#header-php

// required: no

//======================================================================
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?= get_bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <title><?= get_bloginfo('blogname') ?></title> -->

    <?php wp_head(); ?>
</head>

<body>

    <!-- Entete de page -->
    <header class="main-header">
        <!-- Navbar bootstrap -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="#"><?= get_bloginfo('blogname') ?></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <?php 
                    $menu = wp_get_nav_menu_items("Social Menu");
                    $menu_items = $menu ? $menu : array();

                    foreach ($menu_items as $item): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $item->url ?>" target="<?= $item->target ?>"><?= $item->title ?></a>
                    </li>

                    <?php endforeach; ?>
                </ul>

            </div>
        </nav>
    </header>

    <!-- Contenu du site -->
    <div class="main-content">