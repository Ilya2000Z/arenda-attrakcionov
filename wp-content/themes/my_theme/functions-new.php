<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_css' );
function theme_enqueue_css(){
    if (is_master_sub()) {
        wp_enqueue_style('master-main-css', get_stylesheet_directory_uri() . '/assets/css/main.min.css');
    } 
    wp_enqueue_style('jquery-fancybox', get_stylesheet_directory_uri() .  '/css/jquery.fancybox.css');
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() .  '/style-new.css');
    wp_enqueue_style('redesign', get_stylesheet_directory_uri() .  '/style-redesign.css');
    wp_enqueue_style('slick1', get_stylesheet_directory_uri() .  '/css/slick-theme.css');
    wp_enqueue_style('brazzers-carousel', get_stylesheet_directory_uri() .  '/js/jquery.brazzers-carousel.min.css');
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_js' );
function theme_enqueue_js(){
    if ( is_master_sub() ) {
        wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), null, true);
        wp_localize_script( 'main-js', 'ajax',
            array(
                'url' => admin_url('admin-ajax.php')
            )
        );
    }
    wp_enqueue_script('jquery-fancybox', get_stylesheet_directory_uri() .  '/js/jquery.fancybox.js', array('jquery', null, true));
}

add_action('init', 'init_master_classes_post_type');
function init_master_classes_post_type(){

    register_taxonomy( 'masterclass-cat', [ 'masterclass', 'archived_masterclass' ], [
		'label'                 => __('Рубрики'),
		'labels'                => array(
			'name'              => __('Рубрики'),
			'singular_name'     => __('Рубрика'),
			'search_items'      => __('Искать Рубрику'),
			'all_items'         => __('Все Рубрики'),
			'parent_item'       => __('Родительская рубрика'),
			'parent_item_colon' => __('Родительская рубрика:'),
			'edit_item'         => __('Редактировать Рубрику'),
			'update_item'       => __('Обновить Рубрику'),
			'add_new_item'      => __('Добавить'),
			'new_item_name'     => __('Новая Рубрика'),
			'menu_name'         => __('Рубрики'),
		),
		'public'                => true,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_tagcloud'         => false,
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'masterclass-cat', 'hierarchical'=>true, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true,
	] );

    $master_classes = array(
		'labels'             => array(
			'name'               => __('Мастер-классы'), // Основное название типа записи
			'singular_name'      => __('Мастер-класс'), // отдельное название записи типа Book
			'add_new'            => __('Добавить'),
			'add_new_item'       => __('Добавить новую мастер-класс'),
			'edit_item'          => __('Редактировать мастер-класс'),
			'new_item'           => __('Новая мастер-класс'),
			'view_item'          => __('Посмотреть мастер-класс'),
			'search_items'       => __('Найти мастер-класс'),
			'not_found'          => __('Мастер-классов не найдено'),
			'not_found_in_trash' => __('В корзине мастер-классов не найдено'),
			'menu_name'          => __('Мастер-классы')
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		// 'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    );

	register_post_type('masterclass', $master_classes );
    $master_classes['labels']['menu_name'] = __('Проведенные Мастер-классы');
    register_post_type('archived_masterclass', $master_classes );
}

function is_master_sub($only_archive=false)
{
    return !$only_archive && is_singular('masterclass') || is_post_type_archive('masterclass') || is_tax('masterclass-cat');
}

add_filter('body_class', 'add_masterclass_body_tag');
function add_masterclass_body_tag($classes)
{
    if (is_post_type_archive('masterclass')) {
        $classes[] = 'main-page';
    } else if (is_master_sub(true)) {
        $classes[] = 'mc-page';
    } else if (is_singular('masterclass')) {
        $classes[] = 'mc-inside-page';
    }

    return $classes;
}

function get_min_price($post_id) {
    $price = PHP_INT_MAX;
    while (have_rows('prices', $post_id)) {
        the_row();
        $price = min($price, get_sub_field('price'));
    }
    if ($price == PHP_INT_MAX) {
        return null;
    }
    return $price;
}

function get_category_thumb_link($cat_id)
{
    return wp_get_attachment_image_url(get_field('thumb', $cat_id), 'full');#$cat_id, 'wpcf-thumbsforcats', true);
}

function get_category_banner_link($cat_id)
{
    return wp_get_attachment_image_url(get_field('background', $cat_id), 'full');
}

function the_master_breadcrumbs()
{

    $breadcrumbs = array();
    if (is_tax()) {
        $category = get_term( get_queried_object_id() );
        $current = $category->name;
        $category = get_term($category->parent, $category->taxonomy);
    } else if (is_single()) {
        $category = end(wp_get_post_terms(get_the_ID(), 'masterclass-cat'));
        $current = get_the_title();
    } else {
        $current =  get_the_title();
    }
    while ( !is_wp_error($category) ) {
        $breadcrumbs[$category->name] = get_term_link($category->term_id, $category->taxonomy);
        $category = get_term($category->parent, $category->taxonomy);
    }
?>

    <nav class="breadcrumbs">
        <ul>
            <li class="home-link">
                <a href="<?php echo home_url(); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                        <path d="M3.04101 10.8333H3.87434V16.6667C3.87434 17.5858 4.62184 18.3333 5.54101 18.3333H15.541C16.4602 18.3333 17.2077 17.5858 17.2077 16.6667V10.8333H18.041C18.2058 10.8333 18.3669 10.7844 18.5039 10.6928C18.6409 10.6013 18.7477 10.4711 18.8107 10.3189C18.8738 10.1666 18.8903 9.99911 18.8582 9.83748C18.826 9.67585 18.7467 9.52738 18.6302 9.41084L11.1302 1.91084C11.0529 1.83338 10.961 1.77194 10.8599 1.73001C10.7588 1.68808 10.6505 1.6665 10.541 1.6665C10.4316 1.6665 10.3232 1.68808 10.2221 1.73001C10.121 1.77194 10.0292 1.83338 9.95185 1.91084L2.45184 9.41084C2.33534 9.52738 2.256 9.67585 2.22386 9.83748C2.19172 9.99911 2.20822 10.1666 2.27128 10.3189C2.33434 10.4711 2.44112 10.6013 2.57813 10.6928C2.71514 10.7844 2.87622 10.8333 3.04101 10.8333ZM8.87434 16.6667V12.5H12.2077V16.6667H8.87434ZM10.541 3.67834L15.541 8.67834V12.5L15.5418 16.6667H13.8743V12.5C13.8743 11.5808 13.1268 10.8333 12.2077 10.8333H8.87434C7.95518 10.8333 7.20768 11.5808 7.20768 12.5V16.6667H5.54101V8.67834L10.541 3.67834Z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?php echo get_post_type_archive_link('masterclass'); ?>">
                    <?php _e('Мастер-классы'); ?>
                </a>
            </li>
            <?php foreach ($breadcrumbs as $breadcrumb => $permalink) : ?>
                <li><a href="<?php $permalink; ?>"><?php echo $breadcrumb ?></a></li>
            <?php endforeach; ?>
            <li><?php echo $current; ?></li>
        </ul>
    </nav>
<?php
}

function get_icon_uri($icon) {
    return get_stylesheet_directory_uri() . "/assets/img/icons/$icon.svg";
}

function get_exists_image_or_default($field, $icon) {
    if ($img = get_sub_field($field)) {
        return wp_get_attachment_image($img);
    }
    return '<img src="' . get_icon_uri($icon) . '" alt="">';
}

add_action( 'wp_ajax_masterclass_form', 'send_masterclass_form' );
add_action( 'wp_ajax_nopriv_masterclass_form', 'send_masterclass_form' );
function send_masterclass_form() {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $feedback_type = $_POST['feedback-type'];

    wp_mail(
        'plabolchar23@gmail.com',// get_bloginfo('admin_email'),
        'Новая заявка',
        "Имя: $name\nТелефон:$phone\nТип связи:$feedback_type", 
        array()
    );
    wp_die();
}

require_once 'master-fields.php';