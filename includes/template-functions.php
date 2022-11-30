<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки сайта',
		'menu_title'	=> 'Настройки сайта',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Навигация по каталогу',
		'menu_title'	=> 'Навигация по каталогу',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}



/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );
add_theme_support( 'woocommerce' );

//        add_theme_support( 'wc-product-gallery-zoom' );
//        add_theme_support( 'wc-product-gallery-lightbox' );
//        add_theme_support( 'wc-product-gallery-slider' );

// disable flexslider js
function flex_dequeue_script() {
    wp_dequeue_script( 'flexslider' );
}
add_action( 'wp_print_scripts', 'flex_dequeue_script', 100 );

// disable zoom jquery js file
function zoom_dequeue_script() {
    wp_dequeue_script( 'zoom' );
}
add_action( 'wp_print_scripts', 'zoom_dequeue_script', 100 );

// disable photoswipe js file
function photoswipe_dequeue_script() {
    wp_dequeue_script( 'photoswipe-ui-default' );
}
add_action( 'wp_print_scripts', 'photoswipe_dequeue_script', 100 );

// Включаем миниатюры в записях
add_theme_support('post-thumbnails');

// Отключение scaling & Disabling the scaling
add_filter( 'big_image_size_threshold', '__return_false' );


## Добавляем свой размер для миниатюр
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'product', 1024, 1024, true );
}

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    // now pass that through and do the same for iframes...
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');


/**
 * @snippet       Регионы России для добавления в доставкее и на странице оформления заказа
 * @sourcecode    https://wpruse.ru/my-plugins/dobavit-regiony-dostavki-v-woocommerce/
 * @testedwith    WooCommerce 3.8
 * @author        Artem Abramovich
 * @see           https://ru.wordpress.org/plugins/wc-city-select/
 */
// add_filter( 'woocommerce_states', 'awrr_states_russia' );
function awrr_states_russia( $states ) {

	$states['RU'] = array(
		'01' => 'Республика Адыгея',
		'02' => 'Республика Башкортостан',
		'03' => 'Республика Бурятия',
		'04' => 'Республика Алтай',
		'05' => 'Республика Дагестан',
		'06' => 'Республика Ингушетия',
		'07' => 'Республика Кабардино-Балкария',
		'08' => 'Республика Калмыкия',
		'09' => 'Республика Карачаево-Черкессия',
		'10' => 'Республика Карелия',
		'11' => 'Республика Коми',
		'12' => 'Республика Марий Эл',
		'13' => 'Республика Мордовия',
		'14' => 'Республика Саха',
		'15' => 'Республика Северная Осетия — Алания',
		'16' => 'Республика Татарстан',
		'17' => 'Республика Тыва',
		'18' => 'Удмуртская Республика',
		'19' => 'Республика Хакасия',
		'20' => 'Чеченская республика',
		'21' => 'Чувашская Республика',
		'22' => 'Алтайский край',
		'23' => 'Краснодарский край',
		'24' => 'Красноярский край',
		'25' => 'Приморский край',
		'26' => 'Ставропольский край',
		'27' => 'Хабаровский край',
		'28' => 'Амурская область',
		'29' => 'Архангельская область',
		'30' => 'Астраханская область',
		'31' => 'Белгородская область',
		'32' => 'Брянская область',
		'33' => 'Владимирская область',
		'34' => 'Волгоградская область',
		'35' => 'Вологодская область',
		'36' => 'Воронежская область',
		'37' => 'Ивановская область',
		'38' => 'Иркутская область',
		'39' => 'Калининградская область',
		'40' => 'Калужская область',
		'41' => 'Камчатский край',
		'42' => 'Кемеровская область',
		'43' => 'Кировская область',
		'44' => 'Костромская область',
		'45' => 'Курганская область',
		'46' => 'Курская область',
		'47' => 'Ленинградская область',
		'48' => 'Липецкая область',
		'49' => 'Магаданская область',
		'50' => 'Московская область',
		'51' => 'Мурманская область',
		'52' => 'Нижегородская область',
		'53' => 'Новгородская область',
		'54' => 'Новосибирская область',
		'55' => 'Омская область',
		'56' => 'Оренбургская область',
		'57' => 'Орловская область',
		'58' => 'Пензенская область',
		'59' => 'Пермский край',
		'60' => 'Псковская область',
		'61' => 'Ростовская область',
		'62' => 'Рязанская область',
		'63' => 'Самарская область',
		'64' => 'Саратовская область',
		'65' => 'Сахалинская область',
		'66' => 'Свердловская область',
		'67' => 'Смоленская область',
		'68' => 'Тамбовская область',
		'69' => 'Тверская область',
		'70' => 'Томская область',
		'71' => 'Тульская область',
		'72' => 'Тюменская область',
		'73' => 'Ульяновская область',
		'74' => 'Челябинская область',
		'75' => 'Забайкальский край',
		'76' => 'Ярославская область',
		'77' => 'Москва',
		'78' => 'Санкт-Петербург',
		'79' => 'Еврейская автономная область',
		'82' => 'Республика Крым',
		'83' => 'Ненецкий автономный округ',
		'86' => 'Ханты-Мансийский автономный округ — Югра',
		'87' => 'Чукотский автономный округ',
		'89' => 'Ямало-Ненецкий автономный округ',
		'92' => 'Севастополь',

	);

	return $states;
}

/**
 * Filter for adding wrappers around embedded objects
 */
function responsive_embeds( $content ) {
	$content = preg_replace( "/<object/Si", '<div class="embed-container"><object', $content );
	$content = preg_replace( "/<\/object>/Si", '</object></div>', $content );
	
	/**
	 * Added iframe filtering, iframes are bad.
	 */
	$content = preg_replace( "/<iframe.+?src=\"(.+?)\"/Si", '<div class="embed-container"><iframe src="\1" frameborder="0" allowfullscreen>', $content );
	$content = preg_replace( "/<\/iframe>/Si", '</iframe></div>', $content );

	return $content;
}

add_filter( 'the_content', 'responsive_embeds' );

add_action( 'wp_footer', 'add_download_pdf_file' );
function add_download_pdf_file()
{
   $pdf_url = '/wp-content/uploads/2022/03/glasspsvinterior-prajs-v2.1.pdf';
   $contactform_id = (int) 59;
   $filename = 'Каталог Mitroliti';
   ?>

   <script>
      document.addEventListener( 'wpcf7mailsent', function( event ) 
      {
         if ( <?php echo $contactform_id;?> == event.detail.contactFormId )
         {
            jQuery('body').append('<a id="cf7fd-attachment-link" href="<?php echo $pdf_url; ?>" target="_blank" download="<?php echo $filename; ?>"></a>');
            jQuery('#cf7fd-attachment-link')[0].click();

            setTimeout(function()
            {
               jQuery('#cf7fd-attachment-link').remove();
            },2000);
         }
      }, false );
   </script>
   <?php
}