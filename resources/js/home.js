import Swiper from 'swiper';
import ImageLazyLoading from "../vendor/plugin/imageLazyLoading/index";

try {
    const MountSliderCarousel = () => {
        try {
            let sliderCarousel = new Swiper('.p-home .slider__container', {
                slidesPerView: 1,
                spaceBetween: 0,
                watchOverflow: true,
                resistanceRatio: 0,
                autoplay: {
                    delay: 7000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.slider__container .slider__pagination',
                    clickable: true,
                },
            });
            document.querySelectorAll('.p-home .slider__container .swiper-pagination-bullet')
                .forEach(el => {
                    el.addEventListener(
                        'mousemove', ( event ) =>{
                            console.log(event);
                        }
                    )
                })
        } catch (e) {
            console.log(e);
            //
        }
    };

    const ProgressBarAnimate = () => {
        try {
            const ProgressItems = document.querySelectorAll('.p-home .progress_bar__item_icon');

            const CalculateProgressValue = data => {
                return (
                    (2 * Math.PI * 30) * (1 - data)
                )
            };

            const SetValueOnSvg = el => {
                el.querySelector('.c-progress_bar')
                    .style.strokeDashoffset = (
                    CalculateProgressValue((
                        parseInt( el.querySelector('.c-progress').getAttribute('data-progress') )
                        /
                        100
                    ))
                )
            };

            const FallBack = () => {
                ProgressItems.forEach(
                    item => SetValueOnSvg( item )
                )
            };

            if ( "IntersectionObserver" in window ) {
                const Observer = new IntersectionObserver( entries => {
                    entries.forEach( entry => {
                        if ( entry.isIntersecting ) {
                            SetValueOnSvg( entry.target );
                            Observer.unobserve( entry.target )
                        }
                    })
                }, {
                    root: null,
                    threshold: 0.25,
                    rootMargin: '0px 0px -200px'
                });

                document.querySelectorAll('.p-home .progress_bar__item_icon')
                    .forEach( item => Observer.observe( item ) )

            } else FallBack();
        } catch (e) {
            //
        }
    };

    document.addEventListener(
        'DOMContentLoaded',
        () => {
            ImageLazyLoading(
                document.querySelectorAll('.has-skeleton')
            );
            ProgressBarAnimate();
            MountSliderCarousel()
        }
    );

    // window.addEventListener(
    //     'load',
    //     () => {
    //         MountSliderCarousel()
    //     }
    // );
} catch (e) {
    //
}