<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package konferencii2
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<main id="primary" class="site-main" data="single-conference-template">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'single-conference' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div>

		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- row end here -->
</div><!--container end here-->

<?php

get_footer();
