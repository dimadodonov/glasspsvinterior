import $ from 'jquery';
import fancybox from '@fancyapps/fancybox';

export default () => {
    (function ($) {
        let inputCity = $('#select2-billing_city-container').attr('title');
        function chengeCity(sity) {
            // const postcode = $('#billing_postcode').length;
            if (sity === 'Балаково') {
                const shipping = $('#shipping_method_0_local_pickup-9');

                shipping.trigger('click');
                if (shipping.is(':checked')) {
                    // alert("it's checked");
                } else {
                    shipping.prop('checked', true);
                }

                console.log('Балаково');
                $('#shipping_method_0_local_pickup-9')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .show()
                    .css('order', '-1');
                $('#shipping_method_0_cdek_shipping-1')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .hide();
                $('#shipping_method_0_cdek_shipping-4')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .hide();
                $('#shipping_method_0_rpaefw_post_calc-2')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .hide();
            } else {
                $('#shipping_method_0_local_pickup-9')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .hide();
                $('#shipping_method_0_cdek_shipping-1')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .show();
                $('#shipping_method_0_cdek_shipping-4')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .show();
                $('#shipping_method_0_rpaefw_post_calc-2')
                    .parent('.shipping-radio_wrap')
                    .parent('.shipping-radio')
                    .show();
                // console.log('Не Балаково');

                // if (!postcode) {
                //     console.log('Не пусто');
                // }
            }
            console.log('Выбранный город: ' + sity);
        }

        chengeCity(inputCity);

        jQuery(document.body).on('updated_checkout', function () {
            inputCity = $('#select2-billing_city-container').attr('title');
            chengeCity(inputCity);
        });

        $('[data-fancybox]').fancybox({
            clickOutside: 'close',
            buttons: [
                //"zoom",
                //"share",
                //"slideShow",
                //"fullScreen",
                //"download",
                //"thumbs",
                'close',
            ],
            protect: true, // РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ РЅРµ РјРѕР¶РµС‚ СЃРѕС…СЂР°РЅРёС‚СЊ РёР·РѕР±СЂР°Р¶РµРЅРёРµ
            // toolbar  : false // СѓР±СЂР°Р»Рё РїР°РЅРµР»СЊ РёРЅСЃС‚СЂСѓРјРµРЅС‚РѕРІ
            mobile: {
                clickContent: 'close',
                clickSlide: 'close',
            },
        });
        var proQty = $('.pro-qty');
        // proQty.append('<div class="inc qty-btn">+</div>');
        // proQty.append('<div class= "dec qty-btn">-</div>');
        $('body').on('click', '.qty-btn', function (e) {
            e.preventDefault();
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            var step = $button.parent().find('input').attr('step');
            const btnOrder = $('.btn-order');
            if (!oldValue) {
                oldValue = 50;
            }
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + +step;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > +step) {
                    var newVal = parseFloat(oldValue) - +step;
                } else {
                    newVal = step;
                }
            }
            $button.parent().find('input').val(newVal).change();
            btnOrder.attr('data-quantity', newVal);
        });

        $(document).on('click', '.qty-btn', function () {
            $("[name='update_cart']").trigger('click');
        });

        $('div.woocommerce').on('change', '.qty', function () {
            const minValue = $(this).attr('min');
            const count = $(this).val();

            if (+count <= +minValue) {
                $(this).val(minValue);
                // return false;
                $("[name='update_cart']").trigger('click');
            } else {
                $("[name='update_cart']").trigger('click');
            }
        });

        $('.woocommerce').on('change', '.qty', function () {
            const minValue = $(this).attr('min');
            const count = $(this).val();

            if (+count <= +minValue) {
                $(this).val(minValue);
                // return false;
            }
        });

        $('.variations-btn .attached').on('click', function () {
            if ($(this).hasClass('active')) {
                return;
            }

            var el = $(this),
                name = el.text(),
                val = el.data('value'),
                parent = el.parents('.variations-btn').data('id');

            $('.variations-btn .attached').removeClass('active');
            el.addClass('active');

            $('#' + parent).val(val);
            $('#' + parent).change();
        });

        $('.single_variation_wrap').on(
            'show_variation',
            function (event, variation) {
                if (variation.image.url) {
                    const variationImage =
                        '<div class="swiper-slide">' +
                        '<a href="' +
                        variation.image.url +
                        '" data-fancybox="gallery"><figure class="product-slider-big__item">' +
                        '<img src="' +
                        variation.image.url +
                        '" loading="lazy"></figure></a>' +
                        '</div>';
                    // $('p.price').html(variation.price_html);
                    $('.product-slider-big .swiper-slide')
                        .first()
                        .html(variationImage);
                }
                // console.log(variation);
            }
        );

        const sizeProductInfo =
            '<div class="product-size-info initpopup" data-popup="product-size"><ins></ins>Таблица размеров</div>';

        $('#size_product').find('.tc-epo-label').append(sizeProductInfo);
        $('#product_addtitle').find('.tc-epo-label').append('<ins>290₽</ins>');

        // const $product_title = $('.product-title').text();
        // $('.product-group__wrap').prepend(
        //     '<div class="product-group__title">' + $product_title + '</div>'
        // );
    })(jQuery.noConflict());

    const headerCatalog = document.querySelector('.header-catalog');
    const headerNav = document.querySelector('.header-nav');
    const hamburger = document.querySelector('.hamburger');

    headerCatalog.addEventListener('click', () => {
        hamburger.classList.toggle('animate');
        headerNav.classList.toggle('on');
    });

    const addtitle = document.querySelector('.product-addtitle');

    const regex = /^[A-Za-z0-9\s.,;:&()*%#-_]+$/;
    function validate(e) {
        const chars = e.target.value.split('');
        const char = chars.pop();
        const desc = document.querySelector(
            '#product_addtitle .tm-description'
        );
        if (!regex.test(char)) {
            e.target.value = chars.join('');
            desc.style.color = 'red';
            desc.style.opacity = '1';
        } else {
            desc.style.color = '#1d1a1a';
            desc.style.opacity = '0.3';

            let value = e.target.value;
            let upText = value.toUpperCase();
            e.target.value = upText;
        }
    }

    function nopaste(e) {
        e.preventDefault();
    }

    if (addtitle) {
        addtitle.addEventListener('input', validate);
        addtitle.addEventListener('paste', nopaste);
    }
};
