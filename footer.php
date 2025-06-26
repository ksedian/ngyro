</main>

<footer class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h4>О компании NGYRO</h4>
                        <p>Профессиональная металлообработка с использованием современного оборудования. Токарные и фрезерные работы любой сложности.</p>
                        <div class="footer-contact">
                            <p><i class="fas fa-phone"></i> <?php echo get_theme_mod('ngyro_phone', '+7 (000) 000-00-00'); ?></p>
                            <p><i class="fas fa-envelope"></i> <?php echo get_theme_mod('ngyro_email', 'info@ngyro.ru'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h4>Наши услуги</h4>
                        <ul class="footer-services">
                            <li><a href="#">Токарная обработка</a></li>
                            <li><a href="#">Фрезерная обработка</a></li>
                            <li><a href="#">Расточные работы</a></li>
                            <li><a href="#">Слесарные работы</a></li>
                            <li><a href="#">Сварочные работы</a></li>
                            <li><a href="#">Изготовление деталей по чертежам</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h4>Контакты</h4>
                        <div class="footer-address">
                            <p><i class="fas fa-map-marker-alt"></i> <?php echo get_theme_mod('ngyro_address', 'г. Москва, ул. Промышленная, д. 1'); ?></p>
                            <p><i class="fas fa-clock"></i> Пн-Пт: 8:00 - 18:00<br>Сб: 9:00 - 15:00</p>
                        </div>
                        
                        <?php if (class_exists('WooCommerce')) : ?>
                            <div class="footer-shop-link">
                                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn">Перейти в магазин</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>
                </div>
                
                <div class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>
                
                <div class="footer-back-to-top">
                    <a href="#top" class="back-to-top">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 