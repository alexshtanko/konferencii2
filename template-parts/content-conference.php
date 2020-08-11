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

global $event_aplication_form;

$post_meta = get_post_meta( $post->ID );

//получаем класс статуса приёма заявок
$event_aplication_status = event_aplication_status( $post_meta['event_aplication_period_start'][0], $post_meta['event_aplication_period_end'][0] );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'home-event-item priority ' . $event_aplication_status ); ?> >

    <div class="home-event-item-header">
        <div class="row">
            <div class="col-lg-8">
                <div class="home-event-item-header-date">
                    <?php echo rus_date("d F", strtotime( $post_meta['event_period_start'][0] ) ) . ' - ' . rus_date("d F Y", strtotime( $post_meta['event_period_end'][0] ) ) . ' г., срок заявок: ' . rus_date("d F", strtotime( $post_meta['event_aplication_period_start'][0] ) ) . ' - ' . rus_date("d F Y", strtotime( $post_meta['event_aplication_period_end'][0] ) ) . ' г.' ?>
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

        <p><?php echo $post_meta['event_type_string'][0] .', '. $post_meta['event_data_base_string'][0] . ' · ' . $event_aplication_form[$post_meta['event_aplication_form'][0]] . ' · ' . $post_meta['event_topic_string'][0]; ?></p>

    </div>

</article><!--home-event-item end here-->