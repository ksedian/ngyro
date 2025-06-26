/**
 * NGYRO Theme JavaScript
 * 
 * @package NGYRO
 * @version 1.0
 */

(function($) {
    'use strict';

    // Инициализация при загрузке DOM
    $(document).ready(function() {
        initMobileMenu();
        initSmoothScrolling();
        initBackToTop();
        initQuoteForm();
        initAnimations();
        initCartUpdate();
    });

    /**
     * Мобильное меню
     */
    function initMobileMenu() {
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.nav-menu').slideToggle(300);
            
            // Анимация гамбургера
            $(this).find('span').toggleClass('active');
        });

        // Закрытие меню при клике на ссылку
        $('.nav-menu a').on('click', function() {
            if ($(window).width() <= 768) {
                $('.nav-menu').slideUp(300);
                $('.menu-toggle').removeClass('active');
            }
        });

        // Закрытие меню при изменении размера окна
        $(window).resize(function() {
            if ($(window).width() > 768) {
                $('.nav-menu').show();
                $('.menu-toggle').removeClass('active');
            }
        });
    }

    /**
     * Плавная прокрутка к якорям
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = $(this.hash);
            if (target.length) {
                var headerHeight = $('.site-header').outerHeight();
                var targetOffset = target.offset().top - headerHeight - 20;
                
                $('html, body').animate({
                    scrollTop: targetOffset
                }, 800, 'swing');
            }
        });
    }

    /**
     * Кнопка "Наверх"
     */
    function initBackToTop() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });
    }

    /**
     * Обработка формы заявки
     */
    function initQuoteForm() {
        $('.quote-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var formData = new FormData(this);
            
            // Простая валидация
            var isValid = validateForm(form);
            if (!isValid) {
                return false;
            }
            
            // Показываем индикатор загрузки
            var submitBtn = form.find('button[type="submit"]');
            var originalText = submitBtn.text();
            submitBtn.text('Отправка...').prop('disabled', true);
            
            // Симуляция отправки (здесь должна быть реальная отправка на сервер)
            setTimeout(function() {
                showMessage('Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.', 'success');
                form[0].reset();
                submitBtn.text(originalText).prop('disabled', false);
            }, 1500);
        });
    }

    /**
     * Валидация формы
     */
    function validateForm(form) {
        var isValid = true;
        
        // Удаляем предыдущие ошибки
        form.find('.error').removeClass('error');
        form.find('.error-message').remove();
        
        // Проверяем обязательные поля
        form.find('input[required], textarea[required]').each(function() {
            var field = $(this);
            var value = field.val().trim();
            
            if (value === '') {
                showFieldError(field, 'Это поле обязательно для заполнения');
                isValid = false;
            } else if (field.attr('type') === 'email' && !isValidEmail(value)) {
                showFieldError(field, 'Введите корректный email адрес');
                isValid = false;
            }
        });
        
        return isValid;
    }

    /**
     * Показать ошибку поля
     */
    function showFieldError(field, message) {
        field.addClass('error');
        field.after('<div class="error-message" style="color: #e74c3c; font-size: 14px; margin-top: 5px;">' + message + '</div>');
    }

    /**
     * Проверка email
     */
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    /**
     * Показать сообщение
     */
    function showMessage(message, type) {
        var messageClass = type === 'success' ? 'success' : 'error';
        var bgColor = type === 'success' ? '#27ae60' : '#e74c3c';
        
        var messageDiv = $('<div class="form-message ' + messageClass + '" style="background-color: ' + bgColor + '; color: white; padding: 15px; border-radius: 5px; margin-top: 20px; text-align: center;">' + message + '</div>');
        
        $('.quote-form').append(messageDiv);
        
        setTimeout(function() {
            messageDiv.fadeOut(function() {
                $(this).remove();
            });
        }, 5000);
    }

    /**
     * Анимации при прокрутке
     */
    function initAnimations() {
        // Счетчики статистики
        var hasAnimated = false;
        
        $(window).scroll(function() {
            var statsSection = $('.about-stats');
            if (statsSection.length && !hasAnimated) {
                var statsTop = statsSection.offset().top;
                var windowBottom = $(window).scrollTop() + $(window).height();
                
                if (windowBottom > statsTop + 100) {
                    hasAnimated = true;
                    animateCounters();
                }
            }
        });
    }

    /**
     * Анимация счетчиков
     */
    function animateCounters() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var target = parseInt($this.text().replace(/\D/g, ''));
            var suffix = $this.text().replace(/[0-9]/g, '');
            
            $({ countNum: 0 }).animate({
                countNum: target
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum) + suffix);
                },
                complete: function() {
                    $this.text(target + suffix);
                }
            });
        });
    }

    /**
     * Обновление корзины (для WooCommerce)
     */
    function initCartUpdate() {
        // Обновление счетчика корзины при добавлении товара
        $(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
            // Обновляем счетчик корзины
            $('.cart-count').text(fragments['div.widget_shopping_cart_content'].match(/(\d+)/)[0]);
        });
    }

    /**
     * Прелоадер (если нужен)
     */
    function initPreloader() {
        $(window).on('load', function() {
            $('.preloader').fadeOut('slow');
        });
    }

    /**
     * Параллакс эффект для hero секции
     */
    function initParallax() {
        $(window).scroll(function() {
            var scrolled = $(window).scrollTop();
            var rate = scrolled * -0.5;
            
            $('.hero-section').css('transform', 'translate3d(0, ' + rate + 'px, 0)');
        });
    }

    /**
     * Инициализация модальных окон
     */
    function initModals() {
        // Модальное окно для галереи
        $('.gallery-item').on('click', function(e) {
            e.preventDefault();
            var imageSrc = $(this).find('img').attr('src');
            var imageAlt = $(this).find('img').attr('alt');
            
            var modal = $('<div class="modal-overlay">' +
                '<div class="modal-content">' +
                '<img src="' + imageSrc + '" alt="' + imageAlt + '">' +
                '<button class="modal-close">&times;</button>' +
                '</div>' +
                '</div>');
            
            $('body').append(modal);
            modal.fadeIn();
        });

        // Закрытие модального окна
        $(document).on('click', '.modal-overlay, .modal-close', function(e) {
            if (e.target === this) {
                $('.modal-overlay').fadeOut(function() {
                    $(this).remove();
                });
            }
        });
    }

    /**
     * Ленивая загрузка изображений
     */
    function initLazyLoading() {
        $('img[data-src]').each(function() {
            var img = $(this);
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var lazyImg = $(entry.target);
                        lazyImg.attr('src', lazyImg.data('src'));
                        lazyImg.removeClass('lazy');
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(this);
        });
    }

    /**
     * Фильтрация услуг
     */
    function initServiceFilter() {
        $('.service-filter').on('click', function(e) {
            e.preventDefault();
            var filterValue = $(this).data('filter');
            
            $('.service-filter').removeClass('active');
            $(this).addClass('active');
            
            if (filterValue === 'all') {
                $('.service-card').fadeIn();
            } else {
                $('.service-card').hide();
                $('.service-card[data-category="' + filterValue + '"]').fadeIn();
            }
        });
    }

    // Дополнительные функции можно добавить по мере необходимости

})(jQuery); 