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
} catch (e) {}