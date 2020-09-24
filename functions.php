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



    // Création du post peersonnalisé

    $labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Séries TV', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Série TV', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Séries TV'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les séries TV'),
		'view_item'           => __( 'Voir les séries TV'),
		'add_new_item'        => __( 'Ajouter une nouvelle série TV'),
		'add_new'             => __( 'Ajouter une serie !'),
		'edit_item'           => __( 'Editer la séries TV'),
		'update_item'         => __( 'Modifier la séries TV'),
		'search_items'        => __( 'Rechercher une série TV'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);


    $args = [
        'label' => "Série TV",
        'description' => "Description de mon type de post",
        'labels' => $labels,

		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),

		'hierarchical' => false,
		'public' => true,
		'has_archive' => true,
		'rewrite' => array( 'slug' => 'series-tv'),
    ];

	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type('seriestv', $args );
}
add_action('init', "doOnInit");



function doOnSwitchTheme()
{
    // 
    // Création des pages
    // 

    // Definir le titre de la page
    $title = "Ma jolie page WP !";

    // récupération des données de la page
    $page = get_page_by_title($title);

    // Definition de l'id de la page
    $page_id = isset($page->ID) ? $page->ID : null;

    // test l'inexistance de la page
    if (null === $page_id)
    {
        // Definition des paramètres de la page
        $page_settings = [
            'post_type' => "page",                                  // Type de post "page", "post", "media"
            'post_title' => $title,                                 // Titre de la page
            'post_name' => "ma-jolie-page-wp",                      // Slug de la page
            'post_content' => "Lorem blabla blaaa ipsum ...",       // Contenu de la page
            'post_status' => "publish",                             // Etat de la page "publish", "draft"
            'post_author' => 1,                                     // ID de l'utilisateur créateur de la page
        ];

        // creation de la page
        $page_id = wp_insert_post($page_settings);

        // récupération des données de la page
        $page = get_page_by_title($title);
    }




    // 
    // Création des menus
    // 

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
            'menu-item-status' => "publish",                // Status du lien "draft" ou "publish".
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

    // Creation du menu "Main Menu" "main-menu"

    // Definition du nom du menu
    $title = "Main Menu";

    // Test l'existance du menu
    $menuExist = wp_get_nav_menu_object($title);

    // Création du menu si il n'existe pas
    if (!$menuExist)
    {
        // Creation du menu
        $menu_id = wp_create_nav_menu($title);

        // Ajouter un item au menu
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => "About",                // Texte du lien
            'menu-item-url' => "about/",                    // URL du lien
            'menu-item-target' => "_blank",                 // Attribut "target" de la balise <a>
            'menu-item-classes' => "nav-item",              // Valeur de l'attribut class
            'menu-item-status' => "publish",                // Status du lien "draft" ou "publish".
            'menu-item-position' => 3,                      // Position du lien dans le menu
            'menu-item-type' => "custom"                    // Précise à WP que le lien est un lien personnalisé
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => "Contact",
            'menu-item-url' => "contact",
            'menu-item-target' => "_blank",
            'menu-item-classes' => "nav-item",
            'menu-item-status' => "publish",
            'menu-item-position' => 2,
            'menu-item-type' => "custom"
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-object-id' => $page_id,
            'menu-item-object' => $page
        ]);
    }
}
add_action('after_switch_theme', "doOnSwitchTheme");


function showNav($name)
{
    $menu = wp_get_nav_menu_items($name);
    $menu_items = $menu ? $menu : array();
    foreach ($menu_items as $item): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= $item->url ?>" target="<?= $item->target ?>"><?= $item->title ?></a>
    </li>
    <?php endforeach;
}