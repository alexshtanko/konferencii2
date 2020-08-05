<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package konferencii2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'home-event-item priority status-open' ); ?> >

    <div class="home-event-item-header">
        <div class="row">
            <div class="col-lg-8">
                <div class="home-event-item-header-date">
                    30 сентября – 2 октября 2019 г., срок заявок: 29 сентября 2019 г.
                </div>
            </div>
            <div class="col-lg-4">
                <div class="home-event-item-header-location">
                    Россия, Москва
                </div>
            </div>
        </div>
    </div><!--home-event-item-header end here-->

    <div class="home-event-item-body">
        <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
        ?>

        <p>Научно-издательский центр «Актуальность.РФ», Московский государственный университет, Пензенский государственный университет</p>
    </div>

    <div class="home-event-item-footer">
        <p><a href="#">Конференции</a>, <a href="#">РИНЦ</a>, <a href="#">Scopus</a> · Очная, Заочная, On-line · Естественные науки, Молодые ученые, Педагогика, Экономика, Управление, Финансы, Юридические науки</p>
    </div>

</article><!--home-event-item end here-->