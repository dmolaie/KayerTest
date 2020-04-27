import Swiper from 'swiper';

const SpaceBetweenItem = 32;

try {
    const mountRelativeGalleryCarousel = () => {
        try {
            let galleryCarousel = new Swiper('.relative-gallery .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: 16,
                watchOverflow: true,
                resistanceRatio: 0,
                pagination: {
                    clickable: false,
                    el: '.relative-gallery .carousel__pagination'
                },
                breakpoints: {
                    0: {
                        freeMode: true,
                        freeModeMomentumBounce: false,
                        freeModeMinimumVelocity: 0.06,
                        longSwipesMs: 1000,
                        slidesPerView: 'auto',
                        spaceBetween: 14,
                    },
                    520: {
                        slidesPerView: 2,
                        spaceBetween: SpaceBetweenItem,
                    },
                    900: {
                        slidesPerView: 3,
                        spaceBetween: SpaceBetweenItem,
                    },
                    1300: {
                        slidesPerView: 4,
                        spaceBetween: SpaceBetweenItem,
                    },
                    2000: {
                        slidesPerView: 5,
                        spaceBetween: SpaceBetweenItem,
                    }
                }
            });
        } catch ( exception ) { }
    };

    window.addEventListener(
        'load', () => {
            mountRelativeGalleryCarousel()
        }
    )
} catch ( exception ) { }