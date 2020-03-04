import {
    Length, Debounce
} from "@vendor/plugin/helper";

try {
    const PANEL_BODY_CLASSNAME = 'faq-page__body';
    const ACTIVE_CLASSNAME = 'faq-page__item--active';
    const TABS_WRAPPER = document.querySelector('.faq-page .faq-page__container');
    const TABS_ELEMENT = document.querySelectorAll('.faq-page__item .faq-page__header');

    const TOGGLE_PANEL_BODY = {
        setHeight( element ) {
            try {
                const BODY = element.querySelector(`.${PANEL_BODY_CLASSNAME}`);
                BODY.style.height = ( BODY.children[0].offsetHeight ) + 'px';
            } catch (e) {}
        },
        visible( element ) {
            const CURRENT_ACTIVE_ITEM = TABS_WRAPPER.querySelector(`.${ACTIVE_CLASSNAME}`);
            if ( CURRENT_ACTIVE_ITEM )
                TOGGLE_PANEL_BODY.hidden( CURRENT_ACTIVE_ITEM );
            element.classList.add( ACTIVE_CLASSNAME );
            TOGGLE_PANEL_BODY.setHeight( element );
        },
        hidden( element ) {
            element.classList.remove( ACTIVE_CLASSNAME );
            element.querySelector(`.${PANEL_BODY_CLASSNAME}`)
                .style = null;
        }
    };

    const onClickTabButton = ( { target: { parentElement } } ) => {
        ( parentElement.classList.contains( ACTIVE_CLASSNAME ) ) ? (
            TOGGLE_PANEL_BODY.hidden( parentElement )
        ) : (
            TOGGLE_PANEL_BODY.visible( parentElement )
        )
    };

    if ( !!TABS_ELEMENT ) {
        TABS_ELEMENT.forEach(item => {
            item.addEventListener('click', onClickTabButton )
        })
    }

    const DISPLAY_NONE_CLASSNAME = 'none';
    const ERROR_BOX = document.querySelector('.faq-page .error-box');
    const PANEL_ELEMENTS = document.querySelectorAll('.faq-page .faq-page__item');

    const searchAction = value => {
        let disableCount = 0;
        PANEL_ELEMENTS.forEach(item => {
            let header = item.querySelector('.faq-page__header').textContent;
            if ( header.includes( value ) )
                item.classList.remove( DISPLAY_NONE_CLASSNAME );
            else {
                disableCount += 1;
                item.classList.add( DISPLAY_NONE_CLASSNAME );
            }
            TOGGLE_PANEL_BODY.hidden( item )
        });
        ( Length( PANEL_ELEMENTS ) === disableCount ) ? (
            ERROR_BOX.classList.remove( DISPLAY_NONE_CLASSNAME )
        ) : (
            ERROR_BOX.classList.add( DISPLAY_NONE_CLASSNAME )
        );
    };

    const DEBOUNCE_EVENT = Debounce( searchAction, 300 );

    const FORM_ELEMENT = document.querySelector('.faq-page form');
    const SEARCH_INPUT = document.querySelector('.faq-page input[name="search"]');

    SEARCH_INPUT.addEventListener(
        'input',
        ( { target: { value } } ) => { DEBOUNCE_EVENT( value ) }
    );

    FORM_ELEMENT.addEventListener(
        'submit',
        event => {
            event.preventDefault();
            DEBOUNCE_EVENT( SEARCH_INPUT.value );
        }
    );



} catch (e) {}