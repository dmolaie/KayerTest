import Swiper from 'swiper';

try {
    const MountNewsCarousel = () => {
        try {
            let eventsCarousel = new Swiper('.n-list-page .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                watchOverflow: true,
                resistanceRatio: 0,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                }
            });
        } catch ( e ) {
            //
        }
    };

    const ToggleButton = document.querySelector('.n-list-page .i-page__panel .i-page__panel_button');
    const ToggleSection = document.querySelector('.n-list-page .i-page__panel .i-page__panel_toggle');
    const ActiveClassName = 'i-page__panel_button--active';

    const ToggleFn = {
        open() {
            ToggleSection.style
                .height = ToggleSection.children[0].offsetHeight + 'px';
            ToggleButton.textContent = 'کمتر...';
            ToggleButton.classList.add( ActiveClassName );
        },
        close() {
            ToggleSection.style = null;
            ToggleButton.textContent = 'بیشتر...';
            ToggleButton.classList.remove( ActiveClassName );
        }
    };

    if ( !!ToggleButton ) {
        ToggleButton.addEventListener(
            'click',
            event => {
                event.preventDefault();
                ( !ToggleButton.classList.contains( ActiveClassName ) ) ? (
                    ToggleFn.open()
                ) : (
                    ToggleFn.close()
                )
            }
        )
    }

    window.addEventListener(
        'load', () => {
            MountNewsCarousel()
        }
    )
} catch (e) {
    //
}