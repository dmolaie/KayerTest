try {
    const SELECTED_TAB_CLASSNAME = "fou-page__tab--selected";
    const ACTIVE_TAB_CLASSNAME = "fou-page__tab_item--active";
    const ACTIVE_CONTENT_CLASSNAME = "fou-page__content_item--active";

    const TABS = document.querySelectorAll('.fou-page .fou-page__tab_item');
    const TABS_CONTAINER = document.querySelector('.fou-page .fou-page__tab');
    const CONTENT_CONTAINER = document.querySelector('.fou-page .fou-page__content');

    TABS.forEach(tab => {
        tab.addEventListener(
            'click',
            ( { target } ) => {
                if ( !TABS_CONTAINER.classList.contains( SELECTED_TAB_CLASSNAME ) ) TABS_CONTAINER.classList.add( SELECTED_TAB_CLASSNAME );

                let prevActiveTab = TABS_CONTAINER.querySelector('.' + ACTIVE_TAB_CLASSNAME );
                if ( !!prevActiveTab ) prevActiveTab.classList.remove( ACTIVE_TAB_CLASSNAME );

                let dataTab = target.getAttribute('data-tab');
                target.classList.add( ACTIVE_TAB_CLASSNAME );

                let prevActiveContent = CONTENT_CONTAINER.querySelector('.' + ACTIVE_CONTENT_CLASSNAME );
                if ( !!prevActiveContent ) prevActiveContent.classList.remove( ACTIVE_CONTENT_CLASSNAME );

                let currentActiveContent = CONTENT_CONTAINER.querySelector('.fou-page__content_item[data-tab=' + dataTab + ']' )
                if ( !!currentActiveContent ) {
                    currentActiveContent.classList.add( ACTIVE_CONTENT_CLASSNAME );
                }
            }
        )
    })
} catch (e) {}