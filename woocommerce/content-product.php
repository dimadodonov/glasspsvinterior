<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

defined('ABSPATH') || exit();

global $product;
$product_id = $product->get_id();

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$product_published = $product->get_date_created();
$post_id = get_the_ID();

// $product_published->date
?>

<div <?php wc_product_class('product-card product-card__loop'); ?>>
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
					<?php } else { 
						if($price) { ?>
						<div class="product-card__price"><?php echo $price; ?><ins>₽</ins></div>
						<?php }
					}
				}
			?>
		</div>
	</a>
</div>
