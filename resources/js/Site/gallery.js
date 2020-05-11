import {
    HasLength, Length,
    getParameterFromUrl
} from '@vendor/plugin/helper';


try {
    const CHECKBOX_CLASSNAME = 'checkbox-square__input';
    const CATEGORY_CHECKBOXES = document.querySelectorAll(`.${CHECKBOX_CLASSNAME}`);
    const SEARCH_FIELD = document.querySelector('.search_input');
    const SEARCH_SUBMIT = document.querySelector('.search_button');

    const URLRedirection = url => {
        try {
            location.href = url;
        } catch (e) {}
    };

    const QUERY_KEY = {
        ['type']: 'type',
        ['sort']: 'sort',
        ['title']: 'first_title',
        ['categories']: 'categories[]',
    };

    const generateFilterByUrl = () => {
        try {
            let categoriesQuery = '';
            const GALLERY_TYPE = getParameterFromUrl( QUERY_KEY['type'] ) || 'voice',
                  SORT = getParameterFromUrl( QUERY_KEY['sort'] ) || '';

            const CHECKED_CATEGORIES = document.querySelectorAll(`.${CHECKBOX_CLASSNAME}:checked`);

            if (Length( CHECKED_CATEGORIES ) !== Length( CATEGORY_CHECKBOXES )) {
                [].concat(...CHECKED_CATEGORIES).map(({ value }) => {
                    categoriesQuery += `&${QUERY_KEY['categories']}=${value}`;
                });
            }

            const PATHNAME = location.pathname;
            return `${PATHNAME}?${QUERY_KEY['type']}=${GALLERY_TYPE}${categoriesQuery}${SORT ? `&${QUERY_KEY['sort']}=${SORT}` : ''}`;
        } catch (e) {}
    };

    const onChangeCheckboxInput = () => {
        const SEARCH_VALUE = getParameterFromUrl( QUERY_KEY['title'] ) || '';
        URLRedirection(
            generateFilterByUrl() + `${SEARCH_VALUE ? `&${QUERY_KEY['title']}=${SEARCH_VALUE}` : ''}`
        );
    };

    CATEGORY_CHECKBOXES.forEach(checkbox => {
        checkbox.addEventListener('change', onChangeCheckboxInput);
    });

    const handelSearchAction = () => {
        const SEARCH_VALUE = SEARCH_FIELD.value;
        const CURRENT_URL = generateFilterByUrl();
        URLRedirection(
            CURRENT_URL + (HasLength( SEARCH_VALUE.trim() ) ? `&${QUERY_KEY['title']}=${SEARCH_VALUE}` : '')
        );
    };

    SEARCH_FIELD.addEventListener(
        'keyup',
        ({ key }) => {
            key === "Enter" && handelSearchAction();
        }
    );

    SEARCH_SUBMIT.addEventListener('click', handelSearchAction);

} catch (e) {}

try {
    const DATA_PREFIX = 'data-id';
    const ACTIVE_TAB_CLASSNAME = 'ga-page__tab--active';
    const TABS_WRAPPER = document.querySelector('.ga-page .ga-page__header');
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