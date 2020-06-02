import Swiper from 'swiper';
import { Length } from "@vendor/plugin/helper";

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
} catch (e) {}

try {
    const CHECKBOX_CLASSNAME = 'checkbox-square';
    const CHECKBOX_CHECKED_CLASSNAME = 'checked';
    const QUERYSTRING = {
        'title': 'first_title',
        'categories': 'categories[]',
    };
    const SEARCH_INPUT = document.querySelector('.i-page__panel_input');
    const CATEGORY_CHECKBOXES = document.querySelectorAll(`.${CHECKBOX_CLASSNAME}`);

    const redirect = querystring => {
        try {
            const PATHNAME = location.pathname;
            location.href = `${PATHNAME}?${querystring}`;
        } catch ( exception ) {}
    };

    const filterBy = () => {
        try {
            let categoriesQuery = '';
            const SEARCH_VALUE = SEARCH_INPUT.value.trim();
            const CHECKED_CATEGORIES = document.querySelectorAll(`.${CHECKBOX_CLASSNAME}.${CHECKBOX_CHECKED_CLASSNAME}`);
            if (Length( CHECKED_CATEGORIES ) !== Length( CATEGORY_CHECKBOXES )) {
                [].concat(...CHECKED_CATEGORIES).map(element => {
                    categoriesQuery += `&${QUERYSTRING['categories']}=${element.getAttribute('data-slug')}`;
                });
            }
            redirect(
                `${!!SEARCH_VALUE ? `${QUERYSTRING['title']}=${SEARCH_VALUE}` : ''}${categoriesQuery || ''}`
            )
        } catch ( exception ) {}
    };

    SEARCH_INPUT.addEventListener(
        'keyup',
        ({ key }) => {
            key === "Enter" && filterBy();
        }
    );

    CATEGORY_CHECKBOXES.forEach(
        item => {
            item.addEventListener(
                'click',
                ({ target }) => {
                    target.classList.contains( CHECKBOX_CHECKED_CLASSNAME ) ? (
                        target.classList.remove( CHECKBOX_CHECKED_CLASSNAME )
                    ) : (
                        target.classList.add( CHECKBOX_CHECKED_CLASSNAME )
                    );
                    filterBy();
                }
            )
        }
    )
} catch ( exception ) {}