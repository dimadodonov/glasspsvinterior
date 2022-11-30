<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$product_id = $product->get_id();

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
woocommerce_output_all_notices();

?>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<div class="container">
			<div class="product__wrap">

				<div class="product__row">
					<div class="product-gallery">
						<div class="product-gallery__wrap">

							<?php
								$text_youtube_field = get_post_meta( $post->ID, '_text_youtube_field' );
								if($text_youtube_field) {
									$video = $text_youtube_field['0'];
									if($video) :
										?>
											<a class="product-gallery-play" data-fancybox="youtube" href="https://www.youtube.com/watch?v=<?=$video;?>">
												<svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--play"/></svg>
											</a>
										<?php
									endif;
								}
								$product_image_id = $product->get_image_id();
								$product_gallery_ids = $product->get_gallery_image_ids();

								if( $product_image_id ) :
							?>

							<div class="swiper product-slider product-slider-big">
								<div class="swiper-wrapper">
									<div class="swiper-slide">

										<a href="<?php echo wp_get_attachment_image_url( $product_image_id, 'full' ); ?>" data-fancybox="gallery">
											<figure class="product-slider__item">
												<?php
													if ( $product->get_image_id() ) :
														echo wp_get_attachment_image( $product_image_id, 'woocommerce_thumbnail' );
													endif;
												?>
											</figure>
										</a>

									</div>

									<?php
										if( $product_gallery_ids ) :
											foreach( $product_gallery_ids as $product_gallery_id ) : ?>
												<div class="swiper-slide">

													<a href="<?php echo wp_get_attachment_image_url( $product_gallery_id, 'full' ); ?>" data-fancybox="gallery">
														<figure class="product-card-slide">
															<?php
																if ( $product->get_image_id() ) :
																	echo wp_get_attachment_image( $product_gallery_id, 'woocommerce_thumbnail' );
																endif;
															?>
														</figure>
													</a>

												</div>
											<?php endforeach;
										endif;
									?>
								</div>
							</div>

							<div class="swiper product-slider-thumbs">
								<div class="swiper-wrapper">
									<div class="swiper-slide">

										<figure class="product-slider-thumbs__item">
											<?php
												if ( $product->get_image_id() ) :
													echo wp_get_attachment_image( $product_image_id, 'thumbnail' );
												endif;
											?>
										</figure>

									</div>

									<?php
										if( $product_gallery_ids ) :
											foreach( $product_gallery_ids as $product_gallery_id ) : ?>
												<div class="swiper-slide">

													<figure class="product-slider-thumbs__item">
														<?php
															if ( $product->get_image_id() ) :
																echo wp_get_attachment_image( $product_gallery_id, 'thumbnail' );
															endif;
														?>
													</figure>

												</div>
											<?php endforeach;
										endif;
									?>
								</div>
							</div>

							<?php else : ?>

								<div class="swiper product-slider product-slider-big">
									<div class="swiper-wrapper">
										<div class="swiper-slide">

											<figure class="product-slider-thumbs__item">
												<?php echo woocommerce_placeholder_img('woocommerce_single'); ?>
											</figure>

										</div>
									</div>
								</div>

							<?php endif; ?>

						</div>
					</div>
					<div class="product-summary">
						<div class="product-title"><h1><?php echo $product->get_title(); ?></h1></div>
						<div class="product-badge badge">
							<?php
								// есле не распродажа, ничего не делаем
								if ( ! $product->is_on_sale() ) {
									// return;
								} else {
							
									if ( $product->is_type( 'simple' ) ) { // простые товары
								
										// рассчитываем процент скидки
										$percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
								
									} elseif ( $product->is_type( 'variable' ) ) { // вариативные товары
								
										$percentage = 0;
								
										// запускаем цикл для вариаций товара
										foreach ( $product->get_children() as $variation_id ) {
								
											// получаем объект вариации
											$variation = wc_get_product( $variation_id );
								
											// не распродажа? пропускаем итерацию цикла
											if( ! $variation->is_on_sale() ) {
												continue;
											}
								
											// обычная цена вариации
											$regular_price = $variation->get_regular_price();
											// цена распродажи вариации
											$sale_price = $variation->get_sale_price();
											// процент скидки вариации
											$variation_percentage = ( $regular_price - $sale_price ) / $regular_price * 100;
								
											if ( $variation_percentage > $percentage ) {
												$percentage = $variation_percentage;
											}
								
										}
								
									}
								
									if ( $percentage > 0 ) {
										echo '<div class="badge__item badge__proc">Скидка ' . round( $percentage ) . '%</div>';
									}
								}

								$handmade = get_field('handmade');

								if($handmade) {
									echo '<div class="badge__item badge__handmade">Ручная работа</div>';
								}
							?>
						</div>
						<?php
							$product_color = get_field('product_color');

							if($product_color) :


								echo '<div class="product-attr">';
								echo '<div class="product-attr__title">Выберите цвет</div><div class="product-attr__color">';

								foreach( $product_color as $color ): 
									$permalink = get_permalink( $color->ID );
									// $title = get_the_title( $color->ID );
									$product_color = get_field('product_color_hex', $color->ID );
									$product_color_name = get_field('product_color_name', $color->ID );
									?>									
									<a class="attached<?php if($product_id == $color->ID) : echo ' active'; endif;?>" href="<?php echo esc_url( $permalink ); ?>">
										<div class="attached-color" style="background-color: <?php echo $product_color; ?> !important;"></div>
										<div class="attached-name"><?php echo esc_html( $product_color_name ); ?></div>
									</a>
								<?php endforeach;

								echo '</div>';
								echo '</div>';

							endif;
						?>
						<?php woocommerce_template_single_add_to_cart(); ?>
					</div>
				</div>

				<?php 
					$feature = get_field('feature');
					if($feature) :
				?>
				<div class="product-desc">
					<div class="product-desc__title">
						<h2>Характеристики</h2>
					</div>
					<?php echo $feature; ?>
				</div>
				<?php endif; 
					$card = get_field('card');
					$banknotes = get_field('banknotes');
					$doc_pasport = get_field('doc_pasport');
					$doc_vod_prova = get_field('doc_vod_prova');
					$phone = get_field('phone');
					$doc_auto_teh = get_field('doc_auto_teh');
					$doc_a4 = get_field('doc_a4');
					$macbook = get_field('macbook');
					$stationery = get_field('stationery');
					if($card || $banknotes || $doc_pasport || $doc_vod_prova || $phone || $doc_auto_teh || $doc_a4 || $macbook || $stationery ) :
				?>
				<div class="product-desc">
					<div class="product-desc__title">
						<h2>Функциональность</h2>
					</div>
					<p class="product-desc__feature">
						<?php if($card) : echo '— Пластиковые карты <br>'; endif; ?>
						<?php if($banknotes) : echo '— Купюры <br>'; endif; ?>
						<?php if($doc_pasport) : echo '— Паспорт <br>'; endif; ?>
						<?php if($doc_vod_prova) : echo '— Водительские права <br>'; endif; ?>
						<?php if($phone) : echo '— Телефон<br>'; endif; ?>
						<?php if($doc_auto_teh) : echo '— Техпаспорт<br>'; endif; ?>
						<?php if($doc_a4) : echo '— Документы A4<br>'; endif; ?>
						<?php if($macbook) : echo '— Macbook 13<br>'; endif; ?>
						<?php if($stationery) : echo '— Канцтовары<br>'; endif; ?>
					</p>
				</div>
				<?php endif;
					$the_content = get_the_content();
					if($the_content) :
				?>
				<div class="product-desc">
					<div class="product-desc__title">
						<h2>Описание</h2>
					</div>
					<?php the_content(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

	</div>

	
	<section class="section section-related related">
		<div class="container">

				<?php
				$product_related = get_field('product_related');
				if( $product_related ): ?>

					
					<div class="section__title wrap">
						<h2><?php echo esc_html( 'Рекомендуем также' ); ?></h2>
					</div>

					<div class="loop products">
						<div class="loop__wrap loop-slider swiper swiper-container">
							<div class="swiper-wrapper">

							<?php foreach( $product_related as $post ): 

								// Setup this post for WP functions (variable must be named $post).
								setup_postdata($post);
									global $product;
									$post_id = get_the_ID();

									echo '<div class="swiper-slide">'; ?>

										<div <?php wc_product_class('product-card'); ?>>
											<?php if( current_user_can( 'edit_posts' ) ) {
												echo '<a href="' . get_edit_post_link() . '" class="product-card__edit"><span></span></a>';
											} ?>
											<a href="<?php echo $product->get_permalink(); ?>" title="<?php echo $product->get_title(); ?>" class="product-card__wrap">
												<figure class="product-card__thumb">
													<div class="products-badge">
														<?php

															$handmade = get_field('handmade');

															if($handmade) {
																// echo '<div class="products-badge__item products-badge__handmade">Ручная работа</div>';
															}

															if( has_term( 'featured', 'product_visibility', $post_id ) ) {
																echo '<div class="products-badge__item products-badge__proc">Хит продаж</div>';
															}

															// есле не распродажа, ничего не делаем
															if ( ! $product->is_on_sale() ) {
																// return;
															} else {
														
																if ( $product->is_type( 'simple' ) ) { // простые товары
															
																	// рассчитываем процент скидки
																	$percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
															
																} elseif ( $product->is_type( 'variable' ) ) { // вариативные товары
															
																	$percentage = 0;
															
																	// запускаем цикл для вариаций товара
																	foreach ( $product->get_children() as $variation_id ) {
															
																		// получаем объект вариации
																		$variation = wc_get_product( $variation_id );
															
																		// не распродажа? пропускаем итерацию цикла
																		if( ! $variation->is_on_sale() ) {
																			continue;
																		}
															
																		// обычная цена вариации
																		$regular_price = $variation->get_regular_price();
																		// цена распродажи вариации
																		$sale_price = $variation->get_sale_price();
																		// процент скидки вариации
																		$variation_percentage = ( $regular_price - $sale_price ) / $regular_price * 100;
															
																		if ( $variation_percentage > $percentage ) {
																			$percentage = $variation_percentage;
																		}
															
																	}
															
																}
															
																if ( $percentage > 0 ) {
																	echo '<div class="products-badge__item products-badge__proc">-' . round( $percentage ) . '%</div>';
																}
															}
														?>
													</div>
													<?php echo $product->get_image(); ?>
												</figure>

												<div class="product-card__name"><?php echo $product->get_title(); ?></div>

												<div class="product-card__prices">
													<?php
													
														$price = $product->get_price();
														$regular_price = $product->get_regular_price();
														$sale_price = $product->get_sale_price();

														// $product->is_type( $type ) checks the product type, string/array $type ( 'simple', 'grouped', 'variable', 'external' ), returns boolean
														if ( $product->is_type( 'variable' ) ) {
															if($price) { ?>
																<div class="product-card__price"><?php echo $price; ?><ins>₽</ins></div>
															<?php } 
														} else {
															if($sale_price) {?>
																<div class="product-card__price product-card__newprice"><?php echo $sale_price; ?><ins>₽</ins></div>
																<div class="product-card__price product-card__oldprice"><?php echo $regular_price; ?><ins>₽</ins></div>
															<?php } else { ?>
																<?php if($price) {?>
																	<div class="product-card__price"><?php echo $price; ?><ins>₽</ins></div>
																<?php } ?>
															<?php }
														}
													?>
												</div>
											</a>
										</div>

									<?php echo '</div>';
								
								endforeach; ?>							

							</div>
							<div class="loop-swiper-button-arrow loop-swiper-button-prev"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--loop-next"/></svg></div>
							<div class="loop-swiper-button-arrow loop-swiper-button-next"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--loop-next"/></svg></div>
						</div>
					</div>
					
					<?php 
					// Reset the global post object so that the rest of the page works correctly.
					wp_reset_postdata(); ?>
				<?php endif; ?>

		</div>
	</section>

	<?php
		woocommerce_output_related_products();
	?>

<?php do_action( 'woocommerce_after_single_product' ); ?>