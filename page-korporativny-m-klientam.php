<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mitroliti
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="main">
			<div class="page__wrap">
				<section class="section section-corporate">
					<div class="section__wrap">
						<div class="section-corporate-image">
							<div class="section-corporate-image__desc">
								<div class="section-corporate-image__title">Корпоративные подарки <br>из кожи</div>
							</div>
							<picture>
								<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/corporate/bacground-corporate.webp" type="image/webp">
								<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/corporate/bacground-corporate.jpg" type="image/jpg">
								<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/corporate/bacground-corporate.jpg" alt="">
							</picture>
						</div>
						<div class="section__title section__title-center">
							<h2>Деревянная упаковка и тиснение c вашим логотипом</h2>
						</div>
						<?php
							$corp_gallery = get_field('corp_gallery');

							if($corp_gallery) :
						?>
						<div class="section-corporate-slider">
							<div class="swiper corporateSwiper">
								<div class="swiper-wrapper">
									<?php
										foreach($corp_gallery as $corp_gallery_item) :
										$corp_gallery_img = $corp_gallery_item['corp_gallery_img'];
										$corp_gallery_img_mob = $corp_gallery_item['corp_gallery_img_mob'];

										// var_dump();
									?>
									<div class="swiper-slide swiper-slide-border">
										<picture>
											<source media="(max-width: 800px)" srcset="<?php echo $corp_gallery_img_mob; ?>">
											<source media="(max-width: 1366px)" srcset="<?php echo $corp_gallery_img; ?>">
											<source media="(min-width: 1336px)" srcset="<?php echo $corp_gallery_img; ?>">
											<img src="<?php echo $corp_gallery_img_mob; ?>">
										</picture>
									</div>
									<?php endforeach; ?>
								</div>
								<div class="swiper-pagination"></div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</section>

				<?php
					$corp_category = get_field('corp_category');

					if($corp_category) :

					?>
					<section class="section section-category category">
						<div class="category__wrap">
							<div class="category__row">
								<?php
									foreach($corp_category as $corp_category_item) :
									$corp_category_img = $corp_category_item['corp_category_img'];
									$corp_category_img_mob = $corp_category_item['corp_category_img_mob'];
									$corp_category_title = $corp_category_item['corp_category_title'];
									$corp_category_url = $corp_category_item['corp_category_url'];

									// var_dump();
								?>
                    			<a class="category-item" href="<?php if($corp_category_url) { echo esc_html($corp_category_url); } ?>">
									<div class="category-item__title"><?php echo $corp_category_title; ?></div>
									<div class="category-item__image">
										<picture>
											<source media="(max-width: 800px)" srcset="<?php echo $corp_category_img_mob; ?>">
											<source media="(max-width: 1366px)" srcset="<?php echo $corp_category_img; ?>">
											<source media="(min-width: 1336px)" srcset="<?php echo $corp_category_img; ?>">
											<img src="<?php echo $corp_category_img_mob; ?>">
										</picture>
									</div>
								</a>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<?php

					endif;
				?>

				<section class="section section-corporate">
					<div class="section__wrap">
						<div class="section__title section__title-center">
							<h2>Брендированные корпоративные подарки</h2>
						</div>
						<div class="section-corporate-text">
							<p>Подарки принято дарить не только в повседневной жизни, но также и в деловой среде. Сувениры из кожи —
							ценный и актуальный подарок в бизнес сфере. Их дарят клиентам или партнерам при проведении деловых мероприятий, промо-акций, выставок и пр.</p>

							<p>Вся продукция изготавливается в нашей собственной мастерской. По желанию клиента на изделиях наносим фирменный логотип методом горячего тиснения. Также важным дополнением является наша подарочная упаковка. Брендированные деревянные коробки с символикой вашей компании обязательно понравятся вашим клиентам!</p>
						</div>
					</div>
				</section>

				<section class="section section-form section-form-catalog">
					<div class="section__wrap">
						<div class="section__title section__title-center">
							<h2>Скачать каталог</h2>
							<p>Наш полный каталог продукции в формате pdf</p>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="59" title="Скачать каталог"]'); ?>
					</div>
				</section>

				<section class="section section-edge edge">
					<div class="section__wrap">
						<div class="section__title section__title-center">
							<h2>Наши преимущества</h2>
						</div>
						<div class="edge__wrap">
							<div class="edge-item edge-item-3">
								<div class="edge-item__icon">
									<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-2"/></svg>
								</div>
								<div class="edge-item__title">Нанесение логотипа</div>
								<div class="edge-item__subtitle">Возможность нанесения корпоративной <br>символики на любое изделие.</div>
							</div>
							<div class="edge-item edge-item-3">
								<div class="edge-item__icon">
									<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-3"/></svg>
								</div>
								<div class="edge-item__title">Красивая упаковка</div>
								<div class="edge-item__subtitle">Деревянные коробки не только надежно защитят ваш подарок, но и красиво выглядят.</div>
							</div>
							<div class="edge-item edge-item-3">
								<div class="edge-item__icon">
									<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-4"/></svg>
								</div>
								<div class="edge-item__title">Быстрые сроки</div>
								<div class="edge-item__subtitle">Всегда готовы ускориться и выполнить ваш заказ в кратчайшие сроки.</div>
							</div>
							<div class="edge-item edge-item-3">
								<div class="edge-item__icon">
									<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-5"/></svg>
								</div>
								<div class="edge-item__title">Стоимость изделий</div>
								<div class="edge-item__subtitle">На цену влияет тираж и способ оплаты. Всегда готовы сделать хорошую скидку.</div>
							</div>
							<div class="edge-item edge-item-3">
								<div class="edge-item__icon">
									<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-6"/></svg>
								</div>
								<div class="edge-item__title">Индивидуальный подход</div>
								<div class="edge-item__subtitle">Свяжитесь с нами и мы сделаем все возможное, чтобы воплотить вашу идею.</div>
							</div>
							<div class="edge-item edge-item-3">
								<div class="edge-item__icon">
									<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-7"/></svg>
								</div>
								<div class="edge-item__title">Натуральный материал</div>
								<div class="edge-item__subtitle">Для производства применяется натуральная кожа, прошедшая искусную обработку.</div>
							</div>
						</div>
					</div>
				</section>

				<div class="section__wrap">
					<section class="section section-clients clients">
						<div class="clients__title">Наши клиенты</div>
						<div class="clients__slider">
							<div class="swiper clientsSwiper">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<picture>
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/1.webp" type="image/webp">
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/1.png" type="image/png">
											<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/1.png" alt="">
										</picture>
									</div>
									<div class="swiper-slide">
										<picture>
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/2.webp" type="image/webp">
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/2.png" type="image/png">
											<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/2.png" alt="">
										</picture>
									</div>
									<div class="swiper-slide">
										<picture>
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/3.webp" type="image/webp">
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/3.png" type="image/png">
											<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/3.png" alt="">
										</picture>
									</div>
									<div class="swiper-slide">
										<picture>
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/4.webp" type="image/webp">
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/4.png" type="image/png">
											<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/4.png" alt="">
										</picture>
									</div>
									<div class="swiper-slide">
										<picture>
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/5.webp" type="image/webp">
											<source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/5.png" type="image/png">
											<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/clients/5.png" alt="">
										</picture>
									</div>
								</div>
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</section>
				</div>

				<section class="section section-faq faq">
					<div class="section__wrap">
						<div class="section__title section__title-center">
							<h2>Вопросы и ответы</h2>
							<p>Часто задаваемые вопросы</p>
						</div>
						<div class="faq__wrap">
							<div class="faq__item">
								<div class="faq__title">Срок изготовления заказа?</div>
								<div class="faq__desc">Срок изготовления заказа зависит от количества изделий и сложности выполнения заказа. После подписания договора и внесения предоплаты мы сразу же приступим к изготовлению подарочных наборов.</div>
							</div>
							<div class="faq__item">
								<div class="faq__title">Как оплатить заказ?</div>
								<div class="faq__desc">Мы принимаем оплату на расчетный счет и предоставляем все необходимые закрывающие документы. Работаем только по предоплате. Сумма аванса обычно составляет 50% от стоимости заказа.</div>
							</div>
							<div class="faq__item">
								<div class="faq__title">Как вы доставляете заказ?</div>
								<div class="faq__desc">Мы пользуемся услугами транспортных компаний, курьерских служб, а при необходимости можем упаковать и передать заказ вашему курьеру.</div>
							</div>
							<div class="faq__item">
								<div class="faq__title">Вы делаете тестовый образец?</div>
								<div class="faq__desc">Мы предоставим вам визуальный пример вашего логотипа на изделии и на коробке, если это требуется.</div>
							</div>
						</div>
					</div>
				</section>

				<section class="section section-form section-form-callback">
					<div class="section__wrap">
						<div class="section__title section__title-center">
							<h2>Обратная связь</h2>
							<p>Оставьте заявку и мы свяжемся с вами в течении дня</p>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="60" title="Обратная связь"]'); ?>
					</div>
				</section>
			</div>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();