<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package konferencii2
 */

?>

<div class="widget">

    <div class="widget-head">
        <div class="widget-title">Недавно добавлены:</div>
    </div>
    
    <div class="widget-body">

        <?php

            $recently_added_args = array(
                'post_type' => 'conference',
                'posts_per_page' => 2,
            );
            $recently_added_data = new WP_Query( $recently_added_args );

        ?>

        <?php if ( $recently_added_data->have_posts() ) : ?>

            <div class="recently-added-list">

            <?php while ( $recently_added_data->have_posts() ) : $recently_added_data->the_post(); ?>
                <?php
                    $recently_added_post_meta = get_post_meta( $recently_added_data->post->ID );
                ?>
                <div class="recently-added-item">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo rus_date("d F", strtotime( $recently_added_post_meta['event_period_start'][0] ) ) . ' - ' . rus_date("d F Y", strtotime( $recently_added_post_meta['event_period_end'][0] ) ) . ' г. <br>срок заявок: ' . rus_date("d F", strtotime( $recently_added_post_meta['event_aplication_period_end'][0] ) ); ?></p>
                </div>
            <h2></h2>
                
            <?php endwhile; ?>

            </div><!--recently-added-list end here-->

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>

        <?php endif; ?>
        
    </div><!--widget-body end here-->
    <div class="widget-footer text-center">
        <a class="btn-get-informer" href="/informer">Информер для сайта</a>
    </div>

</div><!--widget end here-->