<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Webpack4WP
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="main">
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                while ( have_posts() ) : the_post();
                ?>
                    <h3><?php the_title(); ?></h3>
                    <?php 
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
