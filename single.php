<?php
//======================================================================
// NetLab WordPress Theme Boilerplate
//======================================================================

// File: ./single.php
// Template: Post Template
// More info at https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php
// Use this file to display a single post

// required: no

//======================================================================
?>
<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-8">

            <?php
            // Tant qu'il y à des posts, On boucle
            while (have_posts()): the_post();?>

            <h2><?php the_title() ?></h2>
            <h2><?= get_the_title() ?></h2>

            <h2><?php the_ID() ?></h2>
            <h2><?= get_the_ID() ?></h2>

            <?php the_content() ?>
            <?= get_the_content() ?>

            <?php endwhile; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>