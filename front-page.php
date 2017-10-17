<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Webpack4WP
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h3 class="text-center">Intro Section <i class="fa fa-star fa-fw" aria-hidden="true"></i></h3>
      </div>
    </div>
  </div>
</section>

<section class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
			<?php // Show the selected frontpage content.
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					?>
						<h3><?php the_title(); ?></h3>
						<?php 
						the_content();
					endwhile;
				else : 
					echo "No posts found";
				endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
