try {
    const DATA_PREFIX = 'data-id';
    const DISPLAY_NONE_CLASSNAME = 'none';
    const ACTIVE_TAB_CLASSNAME = 'ga-page__tab--active';
    const ACTIVE_CONTENT_CLASSNAME = 'ga-page__content--active';
    const TABS_WRAPPER = document.querySelector('.ga-page .ga-page__header');
    const CONTENT_WRAPPER = document.querySelector('.ga-page .ga-page__content');
    const TAB_ITEMS = document.querySelectorAll('.ga-page .ga-page__tab');

    const onClickTabItem = event => {
        event.preventDefault();
        const TARGET = event.target || event.srcElement;
        const DATA_ID = TARGET.getAttribute( DATA_PREFIX );
        if ( !!DATA_ID ) {
            const CURRENT_TAB = TABS_WRAPPER.querySelector('.' + ACTIVE_TAB_CLASSNAME);
            CURRENT_TAB.classList.remove( ACTIVE_TAB_CLASSNAME );
            TARGET.classList.add( ACTIVE_TAB_CLASSNAME );

            const TARGET_CONTENT = CONTENT_WRAPPER.querySelector(`div[${DATA_PREFIX}="${DATA_ID}"]`);
            const CURRENT_CONTENT = CONTENT_WRAPPER.querySelector('.' + ACTIVE_CONTENT_CLASSNAME);
            CURRENT_CONTENT.classList.add( DISPLAY_NONE_CLASSNAME );
            CURRENT_CONTENT.classList.remove( ACTIVE_CONTENT_CLASSNAME );
            TARGET_CONTENT.classList.add( ACTIVE_CONTENT_CLASSNAME );
            TARGET_CONTENT.classList.remove( DISPLAY_NONE_CLASSNAME );
        }
    };

    TAB_ITEMS.forEach(item => {
        item.addEventListener('click', onClickTabItem)
    });

    const TABLE_MEDIA_QUERY = window.matchMedia( "(max-width: 900px)" );

    if ( TABLE_MEDIA_QUERY.matches ) {
        const HEADER_PANEL_ACTIVE = 'ga-page__panel_header--opened';
        const HEADER_PANEL = document.querySelectorAll('.ga-page .ga-page__panel_header');

        const collapseToggle = {
            visible(tab, collapse) {
                tab.classList.add( HEADER_PANEL_ACTIVE );
                if ( !!collapse.children[0] ) collapse.style.height = `${collapse.children[0].offsetHeight}px`;
            },
            hidden(tab, collapse) {
                collapse.style = null;
                tab.classList.remove( HEADER_PANEL_ACTIVE );
            }
        };

        const onClickHeaderPanel = event => {
            event.preventDefault();
            const TARGET = event.target || event.srcElement;
            const COLLAPSE_ELEMENT = TARGET.nextElementSibling;
            if ( !!COLLAPSE_ELEMENT ) {
                TARGET.classList.contains( HEADER_PANEL_ACTIVE ) ? (
                    collapseToggle.hidden(TARGET, COLLAPSE_ELEMENT)
                ) : collapseToggle.visible(TARGET, COLLAPSE_ELEMENT)
            }
        };

        HEADER_PANEL.forEach(item => item.addEventListener('click', onClickHeaderPanel))
    }
} catch (e) {}