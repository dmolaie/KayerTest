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
} catch (e) {}