<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package konferencii2
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<main id="primary" class="site-main" data="404-template">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'konferencii2' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'konferencii2' ); ?></p>

							<?php
							get_search_form();

							the_widget( 'WP_Widget_Recent_Posts' );
							?>

							<div class="widget widget_categories">
								<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'konferencii2' ); ?></h2>
								<ul>
									<?php
									wp_list_categories(
										array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										)
									);
									?>
								</ul>
							</div><!-- .widget -->

							<?php
							/* translators: %1$s: smiley */
							$konferencii2_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'konferencii2' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$konferencii2_archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
							?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div>

		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- row end here -->
</div><!--container end here-->

<?php

get_footer();
