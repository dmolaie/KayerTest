import Swiper from 'swiper';

const SpaceBetweenItem = 32;

try {
    const MountRelativeNewsCarousel = () => {
        try {
            let eventsCarousel = new Swiper('.n-show-page .relative-news .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: SpaceBetweenItem,
                watchOverflow: true,
                resistanceRatio: 0,
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 11,
                    },
                    520: {
                        slidesPerView: 2,
                        spaceBetween: SpaceBetweenItem,
                    },
                    1000: {
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
        } catch ( e ) {
            //
        }
    };

    window.addEventListener(
        'load', () => {
            MountRelativeNewsCarousel()
        }
    )
} catch (e) {
    //
}