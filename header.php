<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-top">
        <div class="container">
            <div class="header-contact">
                <div class="contact-info">
                    <span class="phone">
                        <i class="fas fa-phone"></i>
                        <?php echo get_theme_mod('ngyro_phone', '+7 (000) 000-00-00'); ?>
                    </span>
                    <span class="email">
                        <i class="fas fa-envelope"></i>
                        <?php echo get_theme_mod('ngyro_email', 'info@ngyro.ru'); ?>
                    </span>
                    <span class="address">
                        <i class="fas fa-map-marker-alt"></i>
                        <?php echo get_theme_mod('ngyro_address', 'г. Москва, ул. Промышленная, д. 1'); ?>
                    </span>
                </div>
                <div class="social-links">
                    <!-- Социальные сети можно добавить через кастомизатор -->
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-main">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php 
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                
                <nav class="main-navigation" role="navigation">
                    <div class="menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>
                
                <div class="header-buttons">
                    <a href="#quote" class="btn btn-primary">Получить расчёт</a>
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="site-main" role="main"> 