import { getParameterFromUrl } from '@vendor/plugin/helper';

try {
    const DATA_PREFIX = 'data-id';
    const DISPLAY_NONE_CLASSNAME = 'none';
    const ACTIVE_TAB_CLASSNAME = 'ga-page__tab--active';
    const ACTIVE_CONTENT_CLASSNAME = 'ga-page__content--active';
    const TABS_WRAPPER = document.querySelector('.ga-page .ga-page__header');
    const CONTENT_WRAPPER = document.querySelector('.ga-page .ga-page__content');
    const TAB_ITEMS = document.querySelectorAll('.ga-page .ga-page__tab');
    const GALLERY_TYPE = {
        'voice': 'audio',
        'image': 'images',
        'text': 'text',
        'video': 'video',
    };

    const activeTabByQueryString = () => {
        try {
            const QUERY_TYPE = getParameterFromUrl('type'),
                  TYPE = GALLERY_TYPE[QUERY_TYPE] || GALLERY_TYPE['voice'];
            const TAB = TABS_WRAPPER.querySelector(`a[${DATA_PREFIX}="${TYPE}"]`);
            !!TAB && TAB.classList.add( ACTIVE_TAB_CLASSNAME );
            // const CURRENT_TAB = CONTENT_WRAPPER.querySelector(`div[${DATA_PREFIX}="${TYPE}"]`);
            // if ( !!CURRENT_TAB ) {
            //     CURRENT_TAB.classList.add( ACTIVE_CONTENT_CLASSNAME );
            //     CURRENT_TAB.classList.remove( DISPLAY_NONE_CLASSNAME );
            // }
        } catch ( exception ) {}
    };

    activeTabByQueryString();

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