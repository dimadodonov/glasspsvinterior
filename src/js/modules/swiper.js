import Swiper from 'swiper/swiper-bundle.min';

export default () => {
    if (window.innerWidth < 480) {
    } else {
    }

    const galleryThumbs = new Swiper('.product-slider-thumbs', {
        spaceBetween: 16,
        slidesPerView: 'auto',
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        autoHeight: true, //enable auto height
        breakpoints: {
            // when window width is >= 320px
            320: {
                spaceBetween: 10,
            },
            // when window width is >= 480px
            480: {
                spaceBetween: 10,
            },
            // when window width is >= 640px
            640: {
                spaceBetween: 16,
            },
        },
    });
    const galleryTop = new Swiper('.product-slider', {
        spaceBetween: 0,
        // navigation: {
        //     nextEl: '.swiper-btn-next',
        //     prevEl: '.swiper-btn-prev',
        // },
        thumbs: {
            swiper: galleryThumbs,
        },
    });

    const corporateSwiper = new Swiper('.corporateSwiper', {
        spaceBetween: 0,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
    });

    const clientsSwiper = new Swiper('.clientsSwiper', {
        spaceBetween: 70,
        slidesPerView: 5,
        freeMode: true,
        // watchSlidesVisibility: true,
        // watchSlidesProgress: true,
        // autoHeight: true, //enable auto height
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                freeMode: false,
                pagination: {
                    dynamicBullets: false,
                },
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
                freeMode: false,
                pagination: {
                    dynamicBullets: false,
                },
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 5,
            },
        },
    });

    const loopHits = new Swiper('.loop-slider', {
        slidesPerView: 2,
        spaceBetween: 20,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.loop-swiper-button-next',
            prevEl: '.loop-swiper-button-prev',
        },
        lazy: true,
        pagination: {
            el: '.my-swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 5,
            },
        },
    });
};
