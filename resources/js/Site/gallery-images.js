import Swiper from 'swiper';
import { showScrollbar, hideScrollbar, ChildIndex } from '@vendor/plugin/helper';

try {
    let carouselInstance = null;
    const DISPLAY_NONE_CLASS = 'none';
    const OPENED_CLASSNAME = 'gai-page__modal--opened';
    const CLOSED_CLASSNAME = 'gai-page__modal--closed';
    const CARD_ITEMS_CLASSNAME = 'gai-page__figure';
    const MODAL = document.querySelector('.gai-page .gai-page__modal');
    const MODAL_BODY = document.querySelector('.gai-page .gai-page__modal_body');
    const CARD_ITEMS_WRAPPER = document.querySelector('.gai-page .gai-page__content');

    const onClickOutSideModal = ({ target }) => {
        if (!MODAL_BODY.contains( target )) TOGGLE_MODAL.hidden();
    };

    const mountCarousel = initialSlid => {
        carouselInstance = new Swiper('.gai-page .carousel__container', {
            lazy: true,
            spaceBetween: 4,
            slidesPerView: 1,
            draggable: false,
            resistanceRatio: 0,
            watchOverflow: true,
            initialSlide: initialSlid,
            navigation: {
                nextEl: '.gai-page .gai-page__carousel-btn--left',
                prevEl: '.gai-page .gai-page__carousel-btn--right',
            },
        });
    };

    const destroyCarousel = () => {
        carouselInstance.destroy();
        carouselInstance = null;
        console.log('carouselInstance: ', carouselInstance);
    };

    const TOGGLE_MODAL = {
        visible( initialSlid ) {
            hideScrollbar();
            MODAL.classList.remove( DISPLAY_NONE_CLASS );
            MODAL.classList.remove( CLOSED_CLASSNAME );
            MODAL.classList.add( OPENED_CLASSNAME );
            mountCarousel( initialSlid );
            MODAL.addEventListener('click', onClickOutSideModal);
        },
        hidden() {
            showScrollbar();
            MODAL.classList.add( CLOSED_CLASSNAME );
            MODAL.removeEventListener('click', onClickOutSideModal);
            setTimeout(() => {
                MODAL.classList.remove( OPENED_CLASSNAME );
                MODAL.classList.add( DISPLAY_NONE_CLASS );
                destroyCarousel();
            }, 320);
        }
    };

    CARD_ITEMS_WRAPPER.addEventListener(
        'click',
        ({ target }) => {
            if (target.classList.contains( CARD_ITEMS_CLASSNAME ))
                TOGGLE_MODAL.visible( ChildIndex(target.parentElement) );
        }
    );
} catch ( exception ) {
    console.log('exception: ', exception);
}