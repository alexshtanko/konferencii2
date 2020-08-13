<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package konferencii2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="header">
		<div class="header-top-banner">
			<a href="/" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/demo/header-banner.png" alt=""></a>
		</div><!--header-top-banner end here-->
		<div class="header-top">

			<div class="get-mobile-nav" id="getMobileNav">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<div class="container mobile-nav" id="mobileNav">
				<div class="row">
					<div class="col-lg-6 mobile-header-nav">
						<nav class="header-nav">
							<?php
								wp_nav_menu(
									array(
										'menu' => 'header nav',
									)
								);
							?>
						</nav>
					</div>
					<div class="col-lg-3">
						<div class="header-banner banner">
							<a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/demo/banner-1.jpg" alt=""></a>
						</div>
					</div>
					<div class="col-lg-3 mobile-login">
						<div class="header-login">
							<ul>
								<?php if ( is_user_logged_in() ) : ?>
									<li><a href="<?php echo esc_url( home_url( '/profile' ) ); ?>">Личный кабинет</a></li>
								<?php else : ?>
									<li><a href="<?php echo esc_url( home_url( '/login' ) ); ?>">Вход</a></li>
									<li><a href="<?php echo esc_url( home_url( '/register' ) ); ?>">Регистрация</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div><!--header-top end here-->

		<div class="header-middle">

			<div class="container">
				<div class="row">
					<div class="col-lg-11">
						<div class="header-site-name">
							<?php 
								if ( is_front_page() && is_home() ) :
							?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
								else :
							?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
								endif;
								$konferencii2_description = get_bloginfo( 'description', 'display' );
								if ( $konferencii2_description || is_customize_preview() ) :
							?>
								<div class="header-site-slogan">
									<?php echo $konferencii2_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
							<?php endif; ?>
							
						</div><!--header-site-name end here-->
						
						<a class="btn-add-event" href="<?php echo esc_url( home_url( '/create' ) ); ?>">Добавить мероприятие</a>
					</div>

					<div class="col-lg-1">
						<div class="header-sn">
							<ul>
								<li><a href="/" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-vk.png" alt="VKontakte"></a></li>	
								<li><a href="/" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-f.png" alt="Facebook"></a></li>
								<li><a href="/" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-t.png" alt="Twitter"></a></li>
								<li><a href="/" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-o.png" alt="Одноклассники"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div><!--header-middle end here-->

		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="header-bottom-inner">
							<?php get_template_part( 'template-parts/content-header-filter', get_post_type() ); ?>
							
							<div class="header-search">
								<div class="btn-get-search" id="headerGetSearch"><img src="<?php echo bloginfo('template_url'); ?>/img/search.svg" alt=""></div>
							</div>
						</div><!--header-bottom-inner end here-->
					</div>
				</div>
			</div>

			<div class="header-search-form" id="headerSearchForm">
				<div class="container">
					<div class="rov">
						<div class="col-lg-12">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div><!--header-search-form end here-->
		</div><!--header-bottom end here-->

		
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="header-search-result">
						<div class="header-search-result-inner">
							<ul class="btn-search-result-1">
								<li>Искусство<span></span></li>
								<!-- <li>Образование<span></span></li> -->
							</ul>

							<ul class="btn-search-result-2">
								<li>Искусство<span></span></li>
								<!-- <li>Образование<span></span></li> -->
							</ul>

							<ul class="btn-search-result-3">
								<li>Искусство<span></span></li>
								<!-- <li>Образование<span></span></li> -->
							</ul>
						</div>
						<div class="filter-reset">
							<a class="btn-filter-reset" href="#">Сбросить фильтры</a>
						</div>
					</div><!--header-search-result end here-->
				</div>
			</div>
		</div>
		
		
	</header><!--header end here-->
