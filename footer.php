<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Webpack4WP
 * @since 1.0
 * @version 1.2
 */
?>

<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Footer Section <i class="fa fa-trophy fa-fw" aria-hidden="true"></i></h3>
            </div>
        </div>
        <div class="widgets row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'sidebar-4' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php wp_footer(); ?>
</body>
</html>
