<?php
/**
 * konferencii2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package konferencii2
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'konferencii2_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function konferencii2_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on konferencii2, use a find and replace
		 * to change 'konferencii2' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'konferencii2', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'konferencii2' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'konferencii2_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'konferencii2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function konferencii2_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'konferencii2_content_width', 640 );
}
add_action( 'after_setup_theme', 'konferencii2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function konferencii2_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'konferencii2' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'konferencii2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'konferencii2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function konferencii2_scripts() {
	wp_enqueue_style( 'konferencii2-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'konferencii2-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/style/bootstrap.min.css', array(), '4.4.1' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/style/jquery.scrollbar.css', array(), _S_VERSION );
	
	wp_enqueue_style( 'konferencii2-main-style', get_template_directory_uri() . '/style/style.css', array(), _S_VERSION );

	wp_enqueue_script( 'konferencii2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script('jquery');
	wp_register_script( 'konferencii2-scrollbar', get_template_directory_uri() . '/js/jquery.scrollbar.min.js', _S_VERSION, true );
	wp_register_script( 'konferencii2-main', get_template_directory_uri() . '/js/script.js', array('jquery', 'konferencii2-scrollbar'), _S_VERSION, true );
	wp_enqueue_script('konferencii2-main');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'konferencii2_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Добавляем тип записи "Конференция"
add_action('init', 'my_custom_post');
function my_custom_post(){
	register_post_type('conference', array(
		'labels'             => array(
			'name'               => 'Конференции', // Основное название типа записи
			'singular_name'      => 'Конференция', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую конференцию',
			'edit_item'          => 'Редактировать конференцию',
			'new_item'           => 'Новая конференция',
			'view_item'          => 'Посмотреть конференцию',
			'search_items'       => 'Найти конференцию',
			'not_found'          =>  'Конференций не найдено',
			'not_found_in_trash' => 'В корзине конференций не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Конференции'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 2,
		'menu_icon'			 => 'dashicons-clipboard',
		'supports'           => array('title','editor','author'),
	) );
}

// удаление таксономии
add_action( 'wp', 'unregister_genre_taxonomy' );
function unregister_genre_taxonomy(){
	// отменяем таксу только на отдельных страницах
	if( ! is_singular() ) return;

	unregister_taxonomy('event');
}

// хук, через который подключается функция
// регистрирующая новые таксономии (create_conference_taxonomies)
add_action( 'init', 'create_conference_taxonomies' );

// функция, создающая 2 новые таксономии "genres" и "writers" для постов типа "book"
function create_conference_taxonomies(){

	register_taxonomy('event', 'conference',array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'                        => _x( 'Типы мероприятий', 'taxonomy general name' ),
			'singular_name'               => _x( 'Тип мероприятия', 'taxonomy singular name' ),
			'search_items'                =>  __( 'Поиск Типа мероприятия' ),
			'popular_items'               => __( 'Популярные Типы мероприятий' ),
			'all_items'                   => __( 'Все Типы мероприятий' ),
			'edit_item'                   => __( 'Редактировать Тип мероприятия' ),
			'update_item'                 => __( 'Обновить Тип мероприятия' ),
			'add_new_item'                => __( 'Добавить новый Тип мероприятия' ),
			'new_item_name'               => __( 'Новое названия Типа мероприятия' ),
			'add_or_remove_items'         => __( 'Добавить или удалить Тип мероприятия' ),
			'choose_from_most_used'       => __( 'Выберите из наиболее часто используемых Типов мероприятия' ),
			'menu_name'                   => __( 'Типы мероприятия' ),
			
		),
		'show_ui'       => true,
		'query_var'     => true,
		'meta_box_cb' 	=> 'post_categories_meta_box',
		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
	));

	register_taxonomy('topic', 'conference',array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'                        => _x( 'Тематика мероприятий', 'taxonomy general name' ),
			'singular_name'               => _x( 'Тематика мероприятия', 'taxonomy singular name' ),
			'search_items'                =>  __( 'Поиск Тематик мероприятия' ),
			'popular_items'               => __( 'Популярные Тематик мероприятий' ),
			'all_items'                   => __( 'Все Тематики мероприятий' ),
			'edit_item'                   => __( 'Редактировать Тематику мероприятия' ),
			'update_item'                 => __( 'Обновить Тематику мероприятия' ),
			'add_new_item'                => __( 'Добавить новую Тематику мероприятия' ),
			'new_item_name'               => __( 'Новое названия Тематики мероприятия' ),
			'add_or_remove_items'         => __( 'Добавить или удалить Тематику мероприятия' ),
			'choose_from_most_used'       => __( 'Выберите из наиболее часто используемых Тематик мероприятия' ),
			'menu_name'                   => __( 'Тематики мероприятия' ),
			
		),
		'show_ui'       => true,
		'query_var'     => true,
		'meta_box_cb' 	=> 'post_categories_meta_box',
		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
	));

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('ref-base', array('conference'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => _x( 'Наукометрические базы данных', 'taxonomy general name' ),
			'singular_name'     => _x( 'Наукометрическая база данных', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Найти Наукометрическую базу данных' ),
			'all_items'         => __( 'Все Наукометрические базы данных' ),
			'parent_item'       => __( 'Родительские базы Наукометрические данный' ),
			'parent_item_colon' => __( 'Родительские базы Наукометрические данный:' ),
			'edit_item'         => __( 'Редактировать Наукометрическую базу данных' ),
			'update_item'       => __( 'Обновить Наукометрическую базу данных' ),
			'add_new_item'      => __( 'Добавить новую Наукометрическую базу данных' ),
			'new_item_name'     => __( 'Новая Наукометрическая база данных' ),
			'menu_name'         => __( 'Наукометрические базы данных' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		//'rewrite'       => array( 'slug' => 'the_genre' ), // свой слаг в URL
	));
}


//Вывод постов на главной
function home_custom_post( $query ) {

    if ( $query->is_home() && $query->is_main_query() || $query->is_search ) {

        $query->set( 'post_type', 'conference' );

    }
}
add_action( 'pre_get_posts', 'home_custom_post', 1 );


// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}