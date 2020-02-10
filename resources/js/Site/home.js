import Swiper from 'swiper';
import {
    Length,
    ChildIndex,
    GetNumberInString
} from '@vendor/plugin/helper';

const SpaceBetweenItem = 32;

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

            if ( matchMedia("(min-width: 900px)").matches ) {
                let slides = document.querySelectorAll('.p-home .slider__container .slider__item');

                let bullets = (
                    Object.values( sliderCarousel.pagination.bullets )
                ).slice(0, -1);

                const renderPreviewImage = (el, src) => {
                    el.insertAdjacentHTML(
                        'beforeend',
                        `<span class="slider__image-preview absolute bg-white bg-no-repeat bg-size-cover"
                                style="background-image: url('${src}')"></span>`
                    )
                };

                bullets
                    .forEach( el => {
                        el.addEventListener(
                            'mouseenter',
                            ( { target } ) =>{
                                try {
                                    let image = slides[ChildIndex( target )].querySelector('img'),
                                        src = image.getAttribute('data-src') || image.src;
                                    renderPreviewImage( target, src );
                                } catch (e) {
                                    //
                                }
                            }
                        );
                        el.addEventListener(
                            'mouseleave',
                            ( { target } ) =>{
                                try {
                                    target.innerHTML = null
                                } catch (e) {
                                    //
                                }
                            }
                        )
                    })
            }
        } catch (e) {
            //
        }
    };

    const MountSpecialNewsCarousel = () => {
        try {
            let specialNewsCarousel = new Swiper('.p-home .s-news__section .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: 16,
                watchOverflow: true,
                resistanceRatio: 0,
                navigation: {
                    nextEl: '.s-news__section .carousel-btn--right',
                    prevEl: '.s-news__section .carousel-btn--left',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 11,
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
        } catch ( e ) {
            //
        }
    };

    const MountRecentlyEventsCarousel = () => {
        try {
            let recentlyEventsCarousel = new Swiper('.p-home .r-events__section .r-events__item_wrapper .carousel__container', {
                direction: 'vertical',
                spaceBetween: 38,
                resistanceRatio: 0,
                watchOverflow: true,
                observer: true,
                observeParents: true,
                breakpoints: {
                    0: {
                        slidesPerView: 3,
                    },
                    520: {
                        slidesPerView: 3,
                    },
                    900: {
                        slidesPerView: 4,
                    }
                }
            });

            let recentlyEventsImageCarousel = new Swiper('.p-home .r-events__section .r-events__image_wrapper .carousel__container', {
                direction: 'vertical',
                spaceBetween: 0,
                slidesPerView: 1,
                resistanceRatio: 0,
                watchOverflow: true,
                simulateTouch: false,
                allowTouchMove: false,
                observer: true,
                observeParents: true,
                navigation: {
                    nextEl: '.r-events__section .carousel-btn--down',
                    prevEl: '.r-events__section .carousel-btn--up',
                },
                thumbs: {
                    swiper: recentlyEventsCarousel,
                },
            });
        } catch ( e ) {
            //
        }
    };

    const MountEventsCarousel = () => {
        try {
            let eventsCarousel = new Swiper('.p-home .events__section .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: 16,
                watchOverflow: true,
                resistanceRatio: 0,
                navigation: {
                    nextEl: '.events__section .carousel-btn--right',
                    prevEl: '.events__section .carousel-btn--left',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 11,
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
        } catch ( e ) {
            //
        }
    };

    const MountEhdaNewsCarousel = () => {
        try {
            let eventsCarousel = new Swiper('.p-home .ehda-news__section .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: 16,
                watchOverflow: true,
                resistanceRatio: 0,
                navigation: {
                    nextEl: '.ehda-news__section .carousel-btn--right',
                    prevEl: '.ehda-news__section .carousel-btn--left',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 11,
                    },
                    520: {
                        slidesPerView: 2,
                        spaceBetween: SpaceBetweenItem,
                    },
                    900: {
                        slidesPerView: 2,
                        spaceBetween: SpaceBetweenItem,
                    },
                    1300: {
                        slidesPerView: 3,
                        spaceBetween: SpaceBetweenItem,
                    },
                    2000: {
                        slidesPerView: 4,
                        spaceBetween: SpaceBetweenItem,
                    }
                }
            });
        } catch ( e ) {
            //
        }
    };

    const HeartBeatAnimation = () => {
        try {
            const RequestAnimationFrame = callback => {
                const RequestAnimation = (
                    window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame
                );
                ( !!RequestAnimation ) ? (
                    RequestAnimation( callback )
                ) : (
                    setTimeout( callback, 100 )
                )
            };

            const Canvas = document.querySelector('.heartbeat__canvas'),
                CTX =  Canvas.getContext("2d"),
                WindowsWidth = window.innerWidth,
                CanvasWidth  = 115;

            Canvas.width = WindowsWidth;
            Canvas.height = 80;

            let beat = [
                    40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
                    38, 36, 34, 32, 30, 32, 34, 36, 38, 40,
                    42, 44, 46, 48, 50, 52, 50, 48, 46, 44, 42, 40,
                    40, 40, 40, 40, 40, 40, 40,
                    38, 36, 34, 36, 38, 40,
                    40, 40, 40, 40, 40, 40, 40, 40, 40,
                    37, 34, 31, 28, 25, 22, 19, 16, 13, 10, 7,
                    17, 21, 28, 35, 42, 49, 56, 63, 70, 77,
                    72, 65, 58, 51, 44, 42,
                    40, 40, 40, 40, 40, 40, 40, 40, 40, 40,
                    38, 36, 34, 32, 34, 36, 38, 40,
                    40, 40, 40, 40, 40, 40,
                    38, 36, 34, 32, 30, 32, 34, 36, 38, 40, 40,
                ],
                X = 1;

            let points = [];

            for ( let i = 0; i < Math.ceil( WindowsWidth / CanvasWidth ); i++ ) {
                points = points.concat( beat );
            }

            const Animate = () => {
                setTimeout(() => {
                    CTX.lineWidth = 1.2;
                    CTX.strokeStyle = 'rgba(169, 208, 225, .9)';

                    if ( !X < Length(points) )
                        CTX.clearRect(( X + 1 ), 0, Canvas.width, Canvas.height);

                    ( X < Length( points ) ) ? (
                        X += 1
                    ) : (
                        X = 1
                    );

                    CTX.beginPath();
                    CTX.moveTo(( X - 1 ), points[X - 1]);
                    CTX.lineTo(X, points[X]);
                    CTX.stroke();

                    RequestAnimationFrame( Animate );
                }, 35)
            };

            if ( "IntersectionObserver" in window ) {
                const Observer = new IntersectionObserver( entries => {
                    entries.forEach( entry => {
                        if ( entry.isIntersecting ) {
                            Animate( entry.target );
                            Observer.unobserve( entry.target )
                        }
                    })
                }, {
                    root: null,
                    threshold: 0.25,
                    rootMargin: '0px 0px 10px 0px'
                });

                Observer.observe( Canvas );

            } else Animate();

            Animate();
        } catch ( exception ) {
            //
        }
    };

    const ProgressBarAnimate = () => {
        try {
            const CalculateProgressValue = data => {
                return (
                    (2 * Math.PI * 30) * (1 - data)
                )
            };

            const SetValueOnSvg = ( el, data ) => {
                let pathElement = el.querySelector('.c-progress_bar');
                pathElement.style
                    .transitionDuration = `${!!data ? '.7s' : 0 }`;
                pathElement
                    .style.strokeDashoffset = CalculateProgressValue((
                    data / 100
                ));
            };

            const GetTime12HourFormat = date => {
                return (
                    GetNumberInString(date.toLocaleTimeString('en-US', {
                        hour12: true,
                        hour: 'numeric',
                    }))
                )
            };

            const ProgressEvery10Min = () => {
                try {
                    let date = new Date(),
                        MinMinute = new Date( Math.floor( new Date().getTime() / ( 1000 * 60 * 10 ) ) * ( 1000 * 60 * 10 ) ).getMinutes(),
                        CurrentMinute = date.getMinutes(),
                        MaxMinute = ( MinMinute + 10 );

                    let percent = (
                        ( ( CurrentMinute + ( date.getSeconds() / 60 ) ) - MinMinute ) /
                        ( MaxMinute - MinMinute )
                    ) * 100;

                    SetValueOnSvg(
                        document.querySelector('.p-home .c-progress-10'),
                        percent
                    )
                } catch (e) {
                    //
                }
            };

            const ProgressEvery2Hour = () => {
                try {
                    let date = new Date();
                    let Hour = GetTime12HourFormat( date );
                    let percent = 0;

                    ( !(Hour % 2) ) ? (
                        percent = (
                            (( Hour + ( date.getMinutes() / 60 ) ) - Hour) /
                            (( Hour + 2 ) - Hour)
                        ) * 100
                    ) : (
                        percent = (
                            (( Hour + ( date.getMinutes() / 60 ) ) - ( Hour - 1 )) /
                            (( Hour + 1 ) - (Hour - 1))
                        ) * 100
                    );
                    SetValueOnSvg(
                        document.querySelector('.p-home .c-progress-2'),
                        percent
                    );
                } catch (e) {
                    //
                }
            };

            const ProgressEvery12Hour = () => {
                try {
                    let Hour = GetTime12HourFormat( new Date() );
                    SetValueOnSvg(
                        document.querySelector('.p-home .c-progress-12'),
                        ( ( Hour * 8.34 ) <= 100 ) ? ( Hour * 8.34 ) : (( Hour * 8.34 ) - 100)
                    );
                } catch (e) {
                    //
                }
            };

            ProgressEvery10Min();
            ProgressEvery2Hour();
            ProgressEvery12Hour();

            setInterval( () => {
                ProgressEvery10Min();
            }, 1000);

            setInterval( () => {
                ProgressEvery2Hour();
            }, 1000 * 60);
        } catch (e) {
            //
        }
    };

    document.addEventListener(
        'DOMContentLoaded',
        () => {
            HeartBeatAnimation();
            ProgressBarAnimate();
        }
    );

    window.addEventListener(
        'load',
        () => {
            MountSliderCarousel();
            MountSpecialNewsCarousel();
            MountRecentlyEventsCarousel();
            MountEventsCarousel();
            MountEhdaNewsCarousel();
        }
    );
} catch (e) {
    //
}