<?php
//======================================================================
// NetLab WordPress Theme Boilerplate
//======================================================================

// DON'T MODIFY THIS FILE
// File: ./functions.php
// More info at https://developer.wordpress.org/themes/basics/theme-functions/

// required: yes

//======================================================================

function doAfterThemeSetup()
{
    // Active la balise <title>
    add_theme_support( 'title-tag' );

    // Suppersion de la bar d'admin sur le front office
    show_admin_bar(false);
}
// Ajouter l'appel de la fonction "doAfterThemeSetup" au moment de 
// l'initialisation du theme
add_action('after_setup_theme', "doAfterThemeSetup");


function doOnWPLoaded()
{
    if (!is_admin())
    {
        // Ajoute une feuille de style
        wp_enqueue_style(
            "bootstrap", // handle
            "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css", // source 
            [], // dependances
            "1.0", // Version
            "all" // media
        );
    
        wp_enqueue_style(
            "main", // handle
            get_template_directory_uri()."/assets/styles/main.css"
    
        );


        // remove meta "generator"
        remove_action("wp_head", "wp_generator");
    }
}
add_action('wp_loaded', "doOnWPLoaded");


function doOnInit()
{
    if (is_admin())
    {
        // active la gestion des menus
        register_nav_menu("fake-manu", "Fake menu");
    }
}
add_action('init', "doOnInit");



function doOnSwitchTheme()
{
    // Creation du menu "Social Menu" "social-menu"

    // Definition du nom du menu
    $title = "Social Menu";

    // Test l'existance du menu
    $menuExist = wp_get_nav_menu_object($title);

    // Création du menu si il n'existe pas
    if (!$menuExist)
    {
        // Creation du menu
        $menu_id = wp_create_nav_menu($title);

        // Ajouter un item au menu
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => "Facebook",                // Texte du lien
            'menu-item-url' => "http://facebook.com",       // URL du lien
            'menu-item-target' => "_blank",                 // Attribut "target" de la balise <a>
            'menu-item-classes' => "nav-item",              // Valeur de l'attribut class
            'menu-item-status' => "publish",                // Statu du lien "draft" ou "publish".
            'menu-item-position' => 3,                      // Position du lien dans le menu
            'menu-item-type' => "custom"                    // Précise à WP que le lien est un lien personnalisé
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => "Twitter",
            'menu-item-url' => "http://twitter.com",
            'menu-item-target' => "_blank",
            'menu-item-classes' => "nav-item",
            'menu-item-status' => "publish",
            'menu-item-position' => 2,
            'menu-item-type' => "custom"
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => "LinkedIn",
            'menu-item-url' => "http://linkedin.com",
            'menu-item-target' => "_blank",
            'menu-item-classes' => "nav-item",
            'menu-item-status' => "publish",
            'menu-item-position' => 1,
            'menu-item-type' => "custom"
        ]);

    }
}
add_action('after_switch_theme', "doOnSwitchTheme");