<?php
//======================================================================
// NetLab WordPress Theme Boilerplate
//======================================================================

// File: ./home.php
// Template: Post Template
// More info at https://developer.wordpress.org/themes/template-files-section/post-template-files/#home-php
// Use this file to display the homepage

// required: no

//======================================================================
?>
<?php get_header(); ?>


<?php

$page = get_page_by_title("Ma superbe page WP !!!");

print_r($page);

?>

<!-- ----------------------------------------------------------------------- -->
        contenu
<!-- ----------------------------------------------------------------------- -->

<?php get_footer(); ?>