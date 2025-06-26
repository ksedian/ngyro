<?php get_header(); ?>

<!-- Hero секция -->
<section class="hero-section">
    <div class="hero-background">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Профессиональная металлообработка</h1>
                <p class="hero-subtitle">Токарные и фрезерные работы любой сложности. Современное оборудование, высокое качество, соблюдение сроков.</p>
                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary">Наши услуги</a>
                    <a href="#quote" class="btn btn-secondary">Получить расчёт</a>
                </div>
            </div>
            <div class="hero-features">
                <div class="feature-item">
                    <i class="fas fa-cog"></i>
                    <span>Современное оборудование</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-clock"></i>
                    <span>Соблюдение сроков</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-medal"></i>
                    <span>Высокое качество</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- О компании -->
<section class="about-section" id="about">
    <div class="container">
        <div class="section-header">
            <h2>О компании NGYRO</h2>
            <p>Мы специализируемся на высокоточной металлообработке с использованием современных технологий</p>
        </div>
        <div class="about-content">
            <div class="about-text">
                <h3>Опыт и профессионализм</h3>
                <p>Компания NGYRO работает в сфере металлообработки более 10 лет. За это время мы выполнили тысячи заказов для предприятий различных отраслей промышленности.</p>
                
                <h3>Современное оборудование</h3>
                <p>В нашем распоряжении новейшие токарные и фрезерные станки с ЧПУ, что позволяет выполнять работы с высочайшей точностью и в кратчайшие сроки.</p>
                
                <div class="about-stats">
                    <div class="stat-item">
                        <span class="stat-number">1000+</span>
                        <span class="stat-label">Выполненных заказов</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Постоянных клиентов</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">10+</span>
                        <span class="stat-label">Лет опыта</span>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-placeholder.jpg" alt="Металлообработка NGYRO" />
            </div>
        </div>
    </div>
</section>

<!-- Услуги -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-header">
            <h2>Наши услуги</h2>
            <p>Полный спектр услуг металлообработки для вашего бизнеса</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Токарная обработка</h3>
                <p>Высокоточная токарная обработка деталей на станках с ЧПУ. Изготовление валов, втулок, фланцев и других деталей.</p>
                <ul class="service-features">
                    <li>Точность до 0.01 мм</li>
                    <li>Диаметр до 500 мм</li>
                    <li>Длина до 2000 мм</li>
                </ul>
                <div class="service-price">от 500 руб/час</div>
                <a href="#quote" class="btn">Заказать</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cube"></i>
                </div>
                <h3>Фрезерная обработка</h3>
                <p>Фрезерование деталей любой сложности. Изготовление корпусных деталей, кронштейнов, планок.</p>
                <ul class="service-features">
                    <li>3-х и 4-х координатное фрезерование</li>
                    <li>Размеры до 1000×500×400 мм</li>
                    <li>Работа с различными материалами</li>
                </ul>
                <div class="service-price">от 800 руб/час</div>
                <a href="#quote" class="btn">Заказать</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-circle-notch"></i>
                </div>
                <h3>Расточные работы</h3>
                <p>Расточка отверстий с высокой точностью. Восстановление изношенных поверхностей.</p>
                <ul class="service-features">
                    <li>Диаметр от 10 до 800 мм</li>
                    <li>Глубина до 1500 мм</li>
                    <li>Точность 6-7 квалитет</li>
                </ul>
                <div class="service-price">от 600 руб/час</div>
                <a href="#quote" class="btn">Заказать</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Слесарные работы</h3>
                <p>Комплексные слесарные работы: сборка, подгонка, доводка деталей.</p>
                <ul class="service-features">
                    <li>Ручная доводка</li>
                    <li>Сборка узлов</li>
                    <li>Контрольные операции</li>
                </ul>
                <div class="service-price">от 400 руб/час</div>
                <a href="#quote" class="btn">Заказать</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <h3>Сварочные работы</h3>
                <p>Сварка различными методами: TIG, MIG/MAG, ручная дуговая сварка.</p>
                <ul class="service-features">
                    <li>Все виды сталей</li>
                    <li>Алюминий, нержавейка</li>
                    <li>Толщина от 0.5 до 50 мм</li>
                </ul>
                <div class="service-price">от 300 руб/час</div>
                <a href="#quote" class="btn">Заказать</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h3>Изготовление по чертежам</h3>
                <p>Полный цикл изготовления деталей и узлов по вашим техническим требованиям.</p>
                <ul class="service-features">
                    <li>Любая сложность</li>
                    <li>Единичное и серийное производство</li>
                    <li>Контроль качества</li>
                </ul>
                <div class="service-price">Индивидуально</div>
                <a href="#quote" class="btn">Заказать</a>
            </div>
        </div>
    </div>
</section>

<!-- Преимущества -->
<section class="advantages-section">
    <div class="container">
        <div class="section-header">
            <h2>Наши преимущества</h2>
            <p>Почему выбирают именно нас</p>
        </div>
        <div class="advantages-grid">
            <div class="advantage-item">
                <i class="fas fa-award"></i>
                <h3>Качество</h3>
                <p>Строгий контроль качества на всех этапах производства</p>
            </div>
            <div class="advantage-item">
                <i class="fas fa-shipping-fast"></i>
                <h3>Скорость</h3>
                <p>Оперативное выполнение заказов в установленные сроки</p>
            </div>
            <div class="advantage-item">
                <i class="fas fa-ruble-sign"></i>
                <h3>Цены</h3>
                <p>Конкурентные цены без скрытых доплат</p>
            </div>
            <div class="advantage-item">
                <i class="fas fa-users"></i>
                <h3>Опыт</h3>
                <p>Команда опытных специалистов</p>
            </div>
        </div>
    </div>
</section>

<!-- Магазин (если WooCommerce активен) -->
<?php if (class_exists('WooCommerce')) : ?>
<section class="shop-section" id="shop">
    <div class="container">
        <div class="section-header">
            <h2>Наш магазин</h2>
            <p>Готовые изделия и заготовки в наличии</p>
        </div>
        <div class="shop-preview">
            <?php
            // Показываем последние 4 товара
            $products = wc_get_products(array(
                'limit' => 4,
                'status' => 'publish'
            ));
            
            if ($products) : ?>
                <div class="products-grid">
                    <?php foreach ($products as $product) : ?>
                        <div class="product-card">
                            <div class="product-image">
                                <?php echo $product->get_image(); ?>
                            </div>
                            <h3><?php echo $product->get_name(); ?></h3>
                            <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                            <a href="<?php echo $product->get_permalink(); ?>" class="btn">Подробнее</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="shop-link">
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-primary">Посмотреть все товары</a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Форма обратной связи -->
<section class="contact-section" id="quote">
    <div class="container">
        <div class="section-header">
            <h2>Получить расчёт стоимости</h2>
            <p>Отправьте нам описание вашего заказа, и мы свяжемся с вами в ближайшее время</p>
        </div>
        <div class="contact-content">
            <div class="contact-form">
                <form class="quote-form" action="#" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Ваше имя *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="company">Компания</label>
                            <input type="text" id="company" name="company">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service">Вид работ</label>
                        <select id="service" name="service">
                            <option value="">Выберите услугу</option>
                            <option value="turning">Токарная обработка</option>
                            <option value="milling">Фрезерная обработка</option>
                            <option value="boring">Расточные работы</option>
                            <option value="assembly">Слесарные работы</option>
                            <option value="welding">Сварочные работы</option>
                            <option value="custom">Изготовление по чертежам</option>
                            <option value="other">Другое</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Описание заказа *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Опишите что нужно изготовить, приложите чертежи если есть..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="files">Прикрепить файлы (чертежи, эскизы)</label>
                        <input type="file" id="files" name="files[]" multiple accept=".pdf,.jpg,.jpeg,.png,.dwg,.dxf">
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить запрос</button>
                </form>
            </div>
            <div class="contact-info">
                <h3>Контактная информация</h3>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span><?php echo get_theme_mod('ngyro_address', 'г. Москва, ул. Промышленная, д. 1'); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span><?php echo get_theme_mod('ngyro_phone', '+7 (000) 000-00-00'); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span><?php echo get_theme_mod('ngyro_email', 'info@ngyro.ru'); ?></span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <span>Пн-Пт: 8:00 - 18:00<br>Сб: 9:00 - 15:00</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?> 