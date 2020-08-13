<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package konferencii2
 */

?>

<?php get_template_part( 'template-parts/single-conference/content', 'single-conference-top' ); ?>

<?php get_template_part( 'template-parts/single-conference/content', 'single-conference-tab' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header event-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				konferencii2_posted_on();
				konferencii2_posted_by();
				?>
			</div><!-- .entry-meta -->
        <?php endif; ?>
        
        <div class="event-location">
            <p>Россия, Москва</p>
        </div>
        <div class="event-date">
            <p>30 сентября - 2 октября 2019 г., заявки принимаются с 1 сентября по 29 сентября 2019 г.</p>
        </div>
        <div class="event-info">
            <p><span>Форма участия:</span> очная, заочная, on-line</p>
            <p><span>Организаторы:</span> Научно-издательский центр «Актуальность.РФ», Московский государственный университет, Пензенский государственный университет</p>
        </div>
        <div class="event-category">
            <p>
                <a href="#">РИНЦ</a> · 
                <a href="#">Образование</a>, 
                <a href="#">Аттестация</a>, 
                <a href="#">Молодые ученые</a>, 
                <a href="#">Медицина</a>, 
                <a href="#">Гуманитарные науки</a>, 
                <a href="#">Естественные науки</a>, 
                <a href="#">Технические науки</a>, 
                <a href="#">Широкая тематика</a>
            </p>
        </div>
	</header><!-- event-header end here -->

	<div class="entry-content event-body">

        <div class="event-body-banner">
            <a href="#"><img src="img/banner/banner-4.jpg" alt="banner"></a>
        </div>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'konferencii2' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'konferencii2' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- event-body end here -->
    
    <?php get_template_part( 'template-parts/single-conference/content', 'single-conference-file' ); ?>

    <?php get_template_part( 'template-parts/single-conference/content', 'single-conference-contact' ); ?>

	<footer class="event-footer">
        <div class="row">
            <div class="col-lg-6">
                <div class="event-author">
                    Владимир Соловьев 
                </div>
            </div>
            <div class="col-lg-6 text-lg-right">
                <div class="event-date">
                    23 октября 2019 г.
                </div>	
            </div>
        </div>
		<?php konferencii2_entry_footer(); ?>
    </footer><!--event-footer end here-->
    
    <div class="event-sn">
        <div class="event-sn-title">Поделитесь информацией о мероприятии со знакомыми:</div>
        <ul>
            <li><a href="#"><img src="img/event-vk.png"> <span>0</span></a></li>
            <li><a href="#"><img src="img/event-t.png"> <span>1</span></a></li>
            <li><a href="#"><img src="img/event-f.png"> <span>1</span></a></li>
        </ul>
    </div>

    <div class="event-pagination-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <a class="btn-go-event-list" href="#">Вернуться к списку</a>
            </div>
            <div class="col-lg-6">
                <div class="event-pagination">
                    <div class="event-pagination-prev">
                        <a class="btn-event-pagination-prev none" href="#">Предыдущая</a>
                    </div>
                    <div class="event-pagination-next">
                        <a class="btn-event-pagination-next" href="#">Следующая</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
