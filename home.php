<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package konferencii2
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<main id="primary" class="site-main">

				<div class="row">
					<div class="col-lg-8">
						<div class="home-title">
							<b>Анонсы</b> научных мероприятий
						</div>
					</div>

					<div class="col-lg-4">
						<div class="home-title-banner banner">
						<a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/demo/banner-1.jpg" alt=""></a>
						</div>
					</div>
				</div>

				<div class="event-month-filter">
					<ul>
						<li><a href="#">Октябрь 2019</a></li>
					</ul>
				</div>

				<div class="home-event-list">

				<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', 'conference' );

						endwhile;

						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text'    => __(''),
							'next_text'    => __(''),
						) ); 

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
				?>

				</div><!--home-event-list end here-->

				<div class="home-event-load-more">
					<button class="btn-load-more-event">Загрузить ещё</button>
				</div><!--home-event-load-more end here-->

				<div class="home-pagination">
					
						<span class="prev disable" >&nbsp;</span>
						<span class="page-numbers inactive current">1</span>
						<a charset="page-numbers inactive" href="#">2</a>
						<a charset="page-numbers inactive" href="#">3</a>
						<a charset="page-numbers inactive" href="#">4</a>
						<span class="page-numbers inactive dots">...</span>
						<a class="page-numbers inactive" href="#">125</a>
						<a class="next page-numbers inactive" href="#">&nbsp;</a>

					
				</div><!--home-pagination end here-->
				
				

			</main><!-- #main -->
		</div>

		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- row end here -->
</div><!--container end here-->

<?php

get_footer();
