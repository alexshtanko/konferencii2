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

echo '<pre>';
var_dump ( $post );
echo '</pre>';
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
            <p><?php echo $post_meta['event_location'][0]?></p>
        </div>
        <div class="event-date">
            <p><?php echo rus_date("j F", strtotime( $post_meta['event_period_start'][0] ) ) . ' - ' . rus_date("j F Y", strtotime( $post_meta['event_period_end'][0] ) ) . ' г., заявки принимаются с ' . rus_date("j F", strtotime( $post_meta['event_aplication_period_start'][0] ) ) . ' - ' . rus_date("j F Y", strtotime( $post_meta['event_aplication_period_end'][0] ) ) . ' г.' ?></p>
        </div>
        <div class="event-info">
            <p><span>Форма участия:</span> <?php echo $event_aplication_form[$post_meta['event_aplication_form'][0]]; ?></p>
            <p><span>Организаторы:</span> <?php echo $post_meta['event_organizer'][0] ?></p>
        </div>
        <div class="event-category">
            <p><?php echo $post_meta['event_data_base_string'][0] . ' · ' . $post_meta['event_topic_string'][0]; ?></p>
        </div>
	</header><!-- event-header end here -->

	<div class="entry-content event-body">

        <div class="event-body-banner">
            <?php dynamic_sidebar( 'single-conference-banner' ); ?>
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
        
        <div class="clear"></div>
    </div><!-- event-body end here -->
    
    <?php get_template_part( 'template-parts/single-conference/content', 'single-conference-file' ); ?>

    <div class="event-contact">

        <div class="row">
            <div class="col-lg-4">
                <div class="event-contact-title">
                    Контактная информация:
                </div>
            </div>
            <div class="col-lg-8">
                <p><?php echo $post_meta['event_orgcomitet_contact'][0]; ?></p>
                <p class="event-contact-email"><a href="mailto:<?php echo $post_meta['event_orgcomitet_email'][0]; ?>"><?php echo $post_meta['event_orgcomitet_email'][0]; ?></a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="event-contact-title">
                    Крайний срок подачи заявки:
                </div>
            </div>
            <div class="col-lg-8">
                <p><?php echo rus_date("j F Y", strtotime( $post_meta['event_aplication_period_end'][0] ) ) . ' г.'; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <a class="btn-mail-to" href="#">Написать организатору</a>
            </div>
            <div class="col-lg-4">
                <a class="btn-add-bid" href="#">Оставить заявку</a>
            </div>
            <div class="col-lg-4">
                <div class="event-contact-time-left">
                    Осталось 3 дня
                </div>
            </div>
        </div>
        
    </div><!--event-contact end here-->

	<footer class="event-footer">
        <div class="row">
            <div class="col-lg-6">
                <div class="event-author">
                    <?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');?>
                </div>
            </div>
            <div class="col-lg-6 text-lg-right">
                <div class="event-date">
                    <?php echo rus_date("j F Y", strtotime( $post->post_date ) ) ?>
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
                <a class="btn-go-event-list" href="<?php echo esc_url( home_url( '/' ) ); ?>">Вернуться к списку</a>
            </div>
            <div class="col-lg-6">
                <div class="event-pagination">
                
                <?php
                    
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();

                ?>

                <?php if( ! empty($prev_post) ) : ?>

                    <div class="event-pagination-prev">
                        <a class="btn-event-pagination-prev" href="<?php echo get_permalink( $prev_post ); ?>">Предыдущая</a>
                    </div>

                <?php else: ?>

                    <div class="event-pagination-prev">
                        <a class="btn-event-pagination-prev none" href="#">Предыдущая</a>
                    </div>

                <?php endif; ?>

                <?php if( ! empty( $next_post ) ) : ?>

                    <div class="event-pagination-next">
                        <a class="btn-event-pagination-next" href="<?php echo get_permalink( $next_post ); ?>">Следующая</a>
                    </div>

                    <?php else: ?>

                    <div class="event-pagination-next">
                        <a class="btn-event-pagination-next none" href="#">Следующая</a>
                    </div>

                <?php endif; ?>

                    <!-- <div class="event-pagination-prev">
                        <a class="btn-event-pagination-next none" href="#">Предыдущая</a>
                    </div>
                    <div class="event-pagination-next">
                        <a class="btn-event-pagination-next" href="#">Следующая</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
