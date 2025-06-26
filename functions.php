<?php
/**
 * NGYRO WordPress Theme Functions
 * 
 * @package NGYRO
 * @version 1.0
 */

// Предотвращение прямого доступа
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Настройка темы
 */
function ngyro_theme_setup() {
    // Поддержка автоматических заголовков
    add_theme_support('title-tag');
    
    // Поддержка миниатюр записей
    add_theme_support('post-thumbnails');
    
    // Поддержка произвольных логотипов
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Поддержка HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Поддержка настройщика
    add_theme_support('customize-selective-refresh-widgets');
    
    // Регистрация меню навигации
    register_nav_menus(array(
        'primary' => __('Основное меню', 'ngyro'),
        'footer'  => __('Меню в подвале', 'ngyro'),
    ));
    
    // Размеры изображений
    add_image_size('ngyro-featured', 800, 400, true);
    add_image_size('ngyro-service', 400, 300, true);
    add_image_size('ngyro-gallery', 300, 300, true);
}
add_action('after_setup_theme', 'ngyro_theme_setup');

/**
 * Подключение стилей и скриптов
 */
function ngyro_scripts() {
    // Основные стили темы
    wp_enqueue_style('ngyro-style', get_stylesheet_uri(), array(), '1.0');
    
    // Дополнительные стили
    wp_enqueue_style('ngyro-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    
    // Google Fonts
    wp_enqueue_style('ngyro-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Open+Sans:wght@300;400;600;700&display=swap', array(), null);
    
    // Font Awesome для иконок
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // jQuery (уже включен в WordPress)
    wp_enqueue_script('jquery');
    
    // Основные скрипты темы
    wp_enqueue_script('ngyro-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    
    // Комментарии
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'ngyro_scripts');

/**
 * Поддержка WooCommerce
 */
function ngyro_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'ngyro_woocommerce_support');

/**
 * Регистрация областей виджетов
 */
function ngyro_widgets_init() {
    // Боковая панель
    register_sidebar(array(
        'name'          => __('Боковая панель', 'ngyro'),
        'id'            => 'sidebar-1',
        'description'   => __('Добавьте виджеты в боковую панель.', 'ngyro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Подвал - колонка 1
    register_sidebar(array(
        'name'          => __('Подвал - Колонка 1', 'ngyro'),
        'id'            => 'footer-1',
        'description'   => __('Первая колонка в подвале сайта.', 'ngyro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    // Подвал - колонка 2
    register_sidebar(array(
        'name'          => __('Подвал - Колонка 2', 'ngyro'),
        'id'            => 'footer-2',
        'description'   => __('Вторая колонка в подвале сайта.', 'ngyro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    // Подвал - колонка 3
    register_sidebar(array(
        'name'          => __('Подвал - Колонка 3', 'ngyro'),
        'id'            => 'footer-3',
        'description'   => __('Третья колонка в подвале сайта.', 'ngyro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'ngyro_widgets_init');

/**
 * Настройка максимальной ширины контента
 */
if (!isset($content_width)) {
    $content_width = 800;
}

/**
 * Дополнительные функции для темы
 */

// Кастомные поля для услуг
function ngyro_add_service_meta_boxes() {
    add_meta_box(
        'ngyro-service-details',
        __('Детали услуги', 'ngyro'),
        'ngyro_service_meta_box_callback',
        'page'
    );
}
add_action('add_meta_boxes', 'ngyro_add_service_meta_boxes');

function ngyro_service_meta_box_callback($post) {
    wp_nonce_field('ngyro_save_service_details', 'ngyro_service_nonce');
    
    $service_icon = get_post_meta($post->ID, '_ngyro_service_icon', true);
    $service_price = get_post_meta($post->ID, '_ngyro_service_price', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="ngyro_service_icon">Иконка услуги (Font Awesome класс)</label></th>';
    echo '<td><input type="text" id="ngyro_service_icon" name="ngyro_service_icon" value="' . esc_attr($service_icon) . '" size="50" placeholder="fas fa-cog" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="ngyro_service_price">Цена от (руб.)</label></th>';
    echo '<td><input type="text" id="ngyro_service_price" name="ngyro_service_price" value="' . esc_attr($service_price) . '" size="25" placeholder="1000" /></td>';
    echo '</tr>';
    echo '</table>';
}

function ngyro_save_service_details($post_id) {
    if (!isset($_POST['ngyro_service_nonce']) || !wp_verify_nonce($_POST['ngyro_service_nonce'], 'ngyro_save_service_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['ngyro_service_icon'])) {
        update_post_meta($post_id, '_ngyro_service_icon', sanitize_text_field($_POST['ngyro_service_icon']));
    }
    
    if (isset($_POST['ngyro_service_price'])) {
        update_post_meta($post_id, '_ngyro_service_price', sanitize_text_field($_POST['ngyro_service_price']));
    }
}
add_action('save_post', 'ngyro_save_service_details');

/**
 * Кастомизатор темы
 */
function ngyro_customize_register($wp_customize) {
    // Секция контактов
    $wp_customize->add_section('ngyro_contact_section', array(
        'title'    => __('Контактная информация', 'ngyro'),
        'priority' => 30,
    ));
    
    // Телефон
    $wp_customize->add_setting('ngyro_phone', array(
        'default'           => '+7 (000) 000-00-00',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('ngyro_phone', array(
        'label'   => __('Телефон', 'ngyro'),
        'section' => 'ngyro_contact_section',
        'type'    => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('ngyro_email', array(
        'default'           => 'info@ngyro.ru',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('ngyro_email', array(
        'label'   => __('Email', 'ngyro'),
        'section' => 'ngyro_contact_section',
        'type'    => 'email',
    ));
    
    // Адрес
    $wp_customize->add_setting('ngyro_address', array(
        'default'           => 'г. Москва, ул. Промышленная, д. 1',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('ngyro_address', array(
        'label'   => __('Адрес', 'ngyro'),
        'section' => 'ngyro_contact_section',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'ngyro_customize_register');
?> 