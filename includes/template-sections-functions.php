<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

if ( ! function_exists( 'hook_header' ) ) {
    /**
     * Display Hooks Header
     */
    function hook_header() { 

        $phone = '';
        $phone_link = '';
        $mobile = '';
        $mobile_link = '';
        $email = '';
        $whatsapp = '';
        $telegram = '';
        $viber = '';
        $vk = '';
        $instagram = '';
        $youtube = '';    

        ?>
        <header class="header">
            <div class="header__wrap">
                <div class="header__left">
                    <?php if(is_home()) { ?><div class="header__logo"><?php } else { ?><a class="header__logo" href="<?php echo site_url(); ?>"><?php }; ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/files/icons/svg/logo.svg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                    <?php if(is_home()) { ?></div><?php } else { ?></a><?php }; ?>
                    <div class="header-catalog">
                        <div class="header-catalog__icon">
                            <div class="hamburger"></div>
                        </div>
                        <span>Каталог</span>
                    </div>
                </div>
                <div class="header__right">
                    <div class="header-mob__btn">
                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--header-btn"/></svg>
                        <span>Меню</span>
                    </div>
                    <div class="header-menu">
                        <?php echo header_menu_general(); ?>
                    </div>
                    <a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                        <span>Корзина</span>
                        <div class="header-cart__icon">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--cart"/></svg>
                            <?php $cartEmpty = wp_kses_data(WC()->cart->get_cart_contents_count()); ?>
                            <div class="count cart-customlocation<?php if ($cartEmpty > 0) { echo ' active';} ?>"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav__wrap">
                    <?php echo main_menu_cat(); ?>
                </div>
            </div>
        </header>
        
        <div class="header-mob">
            <div class="header-mob__close"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--header-nav-close"/></svg></div>
            <div class="header-mob__wrap">
                <?php if(is_home()) { ?><div class="header-mob__logo"><?php } else { ?><a class="header-mob__logo" href="<?php echo site_url(); ?>"><?php }; ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/files/icons/svg/logo-white.svg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                <?php if(is_home()) { ?></div><?php } else { ?></a><?php }; ?>
                <div class="header-mob__nav">
                    <?php header_mob_cat(); ?>
                </div>
                <div class="header-mob__nav">
                    <?php header_mob_general(); ?>
                </div>
                <div class="header-mob__social social">
                    <?php if($vk) : ?>
                        <a class="social__item vk" href="<?php echo $vk; ?>" target="_blank">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-vk"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if($youtube) : ?>
                        <a class="social__item youtube" href="<?php echo $youtube; ?>" target="_blank">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-youtube"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if($instagram) : ?>
                        <a class="social__item instagram" href="<?php echo $instagram; ?>" target="_blank">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-instagram"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="header-mob__phone">
                    <a href="<?php echo $phone_link; ?>"><?php echo $phone; ?></a>
                    <span>звонок бесплатный по России</span>
                </div>
                <div class="header-mob__phone">
                    <a href="<?php echo $mobile_link; ?>"><?php echo $mobile; ?></a>
                </div>
            </div>
        </div>
        <div class="header-mob__overlay"></div>
    <?php }
}

if ( ! function_exists( 'hook_nav' ) ) {
    /**
     * Display Hooks Nav
     */
    function hook_nav() {
        echo header_menu_general();
    }
}

if ( ! function_exists( 'hook_footer' ) ) {
    /**
     * Display Hooks Footer
     */
    function hook_footer() {

        $phone = '';
        $phone_link = '';
        $mobile = '';
        $mobile_link = '';
        $email = '';
        $whatsapp = '';
        $telegram = '';
        $viber = '';
        $vk = '';
        $instagram = '';
        $youtube = '';    

        ?>
            <footer id="footer" class="footer">
                <div class="container">
                    <div class="footer__wrap">
                        <div class="footer__col">
                            <div class="footer__col-title">Клиентам</div>
                            <?php echo footer_menu_general(); ?>
                        </div>
                        <div class="footer__col">
                            <div class="footer__col-title">Способы оплаты</div>
                            <div class="payments">
                                <div class="payments__item"><img src="/wp-content/themes/glasspsvinteriorcraft/assets/files/icons/svg/icon--payments-sberbank.svg" alt="Sberbank" /></div>
                                <div class="payments__item"><img src="/wp-content/themes/glasspsvinteriorcraft/assets/files/icons/svg/icon--payments-alfa.svg" alt="Alfa" /></div>
                                <div class="payments__item"><img src="/wp-content/themes/glasspsvinteriorcraft/assets/files/icons/svg/icon--payments-yookassa.svg" alt="Yookassa" /></div>
                                <div class="payments__item"><img src="/wp-content/themes/glasspsvinteriorcraft/assets/files/icons/svg/icon--payments-qiwi.svg" alt="Qiwi" /></div>
                            </div>
                        </div>
                        <div class="footer__col">
                            <div class="footer__col-title">Мы в соц. сетях</div>
                            <div class="social">
                                <?php if($vk) : ?>
                                    <a class="social__item vk" href="<?php echo $vk; ?>" target="_blank">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-vk"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if($youtube) : ?>
                                    <a class="social__item youtube" href="<?php echo $youtube; ?>" target="_blank">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-youtube"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if($instagram) : ?>
                                    <a class="social__item instagram" href="<?php echo $instagram; ?>" target="_blank">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-instagram"/></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="footer__col">
                            <div class="footer__col-title">Связаться с нами</div>
                            <div class="footer-nav">
                                <ul>
                                    <?php if($phone) : ?>
                                        <li>
                                            <a href="<?php echo $phone_link; ?>"><?php echo $phone; ?></a>
                                            <small>звонок бесплатный по России</small>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($mobile) : ?>
                                        <li>
                                            <a href="<?php echo $mobile_link; ?>"><?php echo $mobile; ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($email) : ?>
                                        <li>
                                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer__copy">
                        <div class="footer__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/files/icons/svg/logo.svg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                        <div class="footer__desc"><span>2015 — <?php echo date('Y'); ?> ©</span> glasspsvinterior — изделия из кожи ручной работы</div>
                    </div>
                </div>
            </footer>
        <?php
    }
}


if ( ! function_exists( 'hook_page_before' ) ) {
    /**
     * Display Hooks PAge Before
     */
    function hook_page_before() {
        ?>
        <div class="page__wrapper">
          <main class="main">
        <?php
    }
}

if ( ! function_exists( 'hook_page_after' ) ) {
    /**
     * Display Hooks Page after
     */
    function hook_page_after() {
        ?>
          </main>
        </div>
        <?php
    }
}

if ( ! function_exists( 'hook_intro' ) ) {
    /**
     * Display Hooks intro
     */
    function hook_intro() { ?>
        <section class="section section-intro">
            <div class="section-intro__wrap">
                <h1>Изделия из кожи <br>ручной работы</h1>
                <div class="section-intro__background">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/intro/bacground-intro.webp" type="image/webp">
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/intro/bacground-intro.jpg" type="image/jpg">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/intro/bacground-intro.jpg" alt="">
                    </picture>
                </div>
            </div>
        </section>
    <?php }
}

if ( ! function_exists( 'hook_home_category' ) ) {
    /**
     * Display Hooks Home Category
     */
    function hook_home_category() { 
        
        $category = get_field('category', 'option');

        if($category) :

        ?>
        <section class="section section-category category">
            <div class="category__wrap">
                <div class="category__row">
                    <?php
                        foreach($category as $category_item) :
                        $category_img = $category_item['category_img'];
                        $category_img_mob = $category_item['category_img_mob'];
                        $category_title = $category_item['category_title'];
                        $category_url = $category_item['category_url'];

                        // var_dump();
                    ?>
                    <a class="category-item" href="<?php if($category_url) { echo esc_html($category_url); } ?>">
                        <div class="category-item__title"><?php echo $category_title; ?></div>
                        <div class="category-item__image">
                            <picture>
                                <source media="(max-width: 800px)" srcset="<?php echo $category_img_mob; ?>">
                                <source media="(max-width: 1366px)" srcset="<?php echo $category_img; ?>">
                                <source media="(min-width: 1336px)" srcset="<?php echo $category_img; ?>">
                                <img src="<?php echo $category_img_mob; ?>">
                            </picture>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    
        endif;

    }
}

if ( ! function_exists( 'hook_corparative' ) ) {

    /**
     * Display Hooks Head Code
     */
    function hook_corparative() { ?>
        <section class="section section-corporate">
            <div class="section__wrap">
                <div class="section__title section__title-center">
                    <h2>Корпоративные подарки из кожи</h2>
                </div>
                <div class="section-corporate-image">
                    <div class="section-corporate-image__desc">
                        <div class="section-corporate-image__title">
                            Брендированные <br>корпоративные подарки
                        </div>
                        <a class="section-corporate-image__btn btn btn-solid btn-white" href="<?php echo site_url('korporativny-m-klientam'); ?>">
                            Подробнее
                        </a>
                    </div>
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/corporate/bacground-corporate.webp" type="image/webp">
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/corporate/bacground-corporate.jpg" type="image/jpg">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/corporate/bacground-corporate.jpg" alt="">
                    </picture>
                </div>
                <div class="section-corporate-text">
                    <p>Подарки принято дарить не только в повседневной жизни, но также и в деловой среде. Сувениры из кожи — ценный и актуальный подарок в бизнес сфере. Их дарят клиентам или партнерам при проведении деловых мероприятий, промо-акций, выставок и пр.</p>
                    <p>Вся продукция изготавливается в нашей собственной мастерской. По желанию клиента на изделиях наносим фирменный логотип методом горячего тиснения. Также важным дополнением является наша подарочная упаковка. Брендированные деревянные коробки с символикой вашей компании обязательно понравятся вашим клиентам!</p>
                </div>
            </div>
        </section>
    <?php }
}

if ( ! function_exists( 'hook_edge' ) ) {
    /**
     * Display Hooks Edge
     */
    function hook_edge() { ?>
        <section class="section section-edge edge">
            <div class="section__wrap">
                <div class="section__title section__title-center">
                    <h2>Наши преимущества</h2>
                </div>
                <div class="edge__wrap">
                    <div class="edge-item">
                        <div class="edge-item__icon">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-1"/></svg>
                        </div>
                        <div class="edge-item__title">Гарантия и качество</div>
                        <div class="edge-item__subtitle">5 лет гарантии и 100% ручная работа</div>
                    </div>
                    <div class="edge-item">
                        <div class="edge-item__icon">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-2"/></svg>
                        </div>
                        <div class="edge-item__title">Именной аксессуар</div>
                        <div class="edge-item__subtitle">Изделие с вашими инициалами</div>
                    </div>
                    <div class="edge-item">
                        <div class="edge-item__icon">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-3"/></svg>
                        </div>
                        <div class="edge-item__title">Подарочная упаковка</div>
                        <div class="edge-item__subtitle">Деревянная упаковка выделит ваш подарок среди остальных</div>
                    </div>
                    <div class="edge-item">
                        <div class="edge-item__icon">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-4"/></svg>
                        </div>
                        <div class="edge-item__title">Быстрая доставка</div>
                        <div class="edge-item__subtitle">Доставляем по России и СНГ</div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}

if ( ! function_exists( 'hook_head_code' ) ) {

    add_filter('wp_body_open', 'hook_head_code');
    /**
     * Display Hooks Head Code
     */
    function hook_head_code() {}
}

if ( ! function_exists( 'google_analytics' ) ) {
    add_filter('wp_head', 'google_analytics');
    function google_analytics() { ?>
    <?php }
}
if ( ! function_exists( 'yandex_metrika' ) ) {
    add_filter('wp_footer', 'yandex_metrika');
    function yandex_metrika() {
        ?>
        <?php
    }
}

if ( ! function_exists( 'hook_gotop' ) ) {
    // add_filter('wp_footer', 'hook_gotop');
    /**
     * Display Hooks gotop
     */
    function hook_gotop() {
    }
}

if ( ! function_exists( 'hook_popup' ) ) {
    add_filter('wp_footer', 'hook_popup');
    /**
     * Display Hooks hook_popup
     */
    function hook_popup() {

        if(is_product()) :

        ?>
            <div id="popup" class="popup popup-product-size">
                <div class="popup__overlay"></div>
                <div class="popup__wrap">
                    <div class="popup__close"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--close-popup"/></svg></div>
                    <div class="popup__header">
                        <div class="popup__title">Таблица размеров</div>
                    </div>
                    <div class="popup__container">
                        <div class="table">
                            <div class="table__row">
                                <div class="table__item" data-title="Длина ремня"><span>Длина ремня</span></div>
                                <div class="table__item">95</div>
                                <div class="table__item">100</div>
                                <div class="table__item">105</div>
                                <div class="table__item">110</div>
                                <div class="table__item">115</div>
                                <div class="table__item">120</div>
                                <div class="table__item">125</div>
                            </div>
                            <div class="table__row">
                                <div class="table__item" data-title="EU"><span>Международный размер</span></div>
                                <div class="table__item">XS</div>
                                <div class="table__item">S</div>
                                <div class="table__item">M</div>
                                <div class="table__item">L</div>
                                <div class="table__item">XL</div>
                                <div class="table__item">XXL</div>
                                <div class="table__item">XXXL</div>
                            </div>
                            <div class="table__row">
                                <div class="table__item" data-title="RU"><span>Российский размер</span></div>
                                <div class="table__item">44</div>
                                <div class="table__item">46</div>
                                <div class="table__item">48</div>
                                <div class="table__item">50</div>
                                <div class="table__item">52</div>
                                <div class="table__item">54</div>
                                <div class="table__item">56</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php

        endif;
    }
}

if ( ! function_exists( 'hook_fixed_btn' ) ) {
    add_filter('wp_footer', 'hook_fixed_btn');
    /**
     * Display Hooks hook_fixed_btn
     */
    function hook_fixed_btn() {
        $cartEmpty = wp_kses_data(WC()->cart->get_cart_contents_count());
        $phone_link = get_field('phone_link', 'option');
        ?>
        <div class="fixed-btn">
            <?php if(!is_cart()) { ?>
            <a class="fixed-btn__item" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                <div class="fixed-btn__inner">
                    <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--cart"/></svg>
                    <div class="count cart-customlocation<?php if ($cartEmpty > 0) { echo ' active';} ?>"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></div>
                </div>
            </a>
            <?php } ?>
        </div>
        <?php
    }
}