<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package konferencii2
 */

?>
<?php
$post_meta = get_post_meta( $post->ID );
var_dump( $post_meta );
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
                    <?php echo $post_meta['event_location'][0] ?>
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

        <p><?php echo $post_meta['event_organizer'][0] ?></p>
    </div>

    <div class="home-event-item-footer">
            <?php

// $conf_cat = wp_get_object_terms( $post->ID, array( 'event' ), array('orderby' => 'name') );

// var_dump($conf_cat);
            
            ?>
        <p><a href="#">Конференции</a>, <a href="#">РИНЦ</a>, <a href="#">Scopus</a> · Очная, Заочная, On-line · Естественные науки, Молодые ученые, Педагогика, Экономика, Управление, Финансы, Юридические науки</p>
    </div>

</article><!--home-event-item end here-->