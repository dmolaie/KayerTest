import {
    SmoothScroll,
    HasLength, Length,
    getParameterFromUrl
} from '@vendor/plugin/helper';
import Endpoint from '@endpoints';
import HTTPService from '@js/service/HttpService';
import ExceptionService from '@services/service/exception';
import GalleryPresenter from '@js/presenter/Gallery';
import CategoryPresenter from '@js/presenter/Category';
import PaginationService, { CLASSNAME } from '@js/service/Pagination';
import '@vendor/plugin/urlSearchParams';

const DATA_PREFIX = 'data-id';
const OFF_LOADING = 'ga-page__loading--hidden';
const CHECKBOX_CLASSNAME = 'checkbox-square__input';
const ACTIVE_TAB_CLASSNAME = 'ga-page__tab--active';
const HEADER_PANEL_ACTIVE = 'ga-page__panel_header--opened';
const GALLERY_TYPE = {
    'voice': 'voice',
    'image': 'image',
    'text': 'text',
    'video': 'video',
};
const SORT = { 'asc': 'asc', 'desc': 'desc' };
const LOCATION = { 'asc': 'صعودی', 'desc': 'نزولی' };
const QUERY_STRING = {
    'type': 'type',
    'sort': 'sort',
    'page': 'page',
    'title': 'first_title',
    'categories': 'categories[]',
};
const PAGE_COUNT = {
    'xxl': 20, 'xl': 15, 'other': 10,
};

const ITEMS_WRAPPER = document.getElementById('items_wrapper');
const TAB_ITEMS = document.querySelectorAll('.ga-page .ga-page__tab');
const TABS_WRAPPER = document.querySelector('.ga-page .ga-page__header');
const CONTENT_WRAPPER = document.querySelector('.ga-page .ga-page__content');
const CATEGORIES_WRAPPER = document.getElementById('categories_wrapper');
const CLEAR_FILTER_BUTTON = document.getElementById('clear_filter');
const SORT_BUTTON = document.getElementById('sort_button');
const SEARCH_FIELD = document.querySelector('.search_input');
const SEARCH_SUBMIT = document.querySelector('.search_button');
const PAGINATION_ELEMENT = document.querySelector('.pagination');
const LOADING_ELEMENT = document.querySelector('.ga-page__loading');
const TABLE_MEDIA_QUERY = window.matchMedia( "(max-width: 900px)" );

class GalleryInterface {
    static get sort() {
        const QUERY_SORT = getParameterFromUrl( QUERY_STRING['sort'] );
        return QUERY_SORT || '';
    }
    static get page() {
        try {
            const QUERY_PAGE = getParameterFromUrl( QUERY_STRING['page'] );
            return QUERY_PAGE || '';
        } catch (e) {}
    }
    static get title() {
        try {
            const QUERY_TITLE = getParameterFromUrl( QUERY_STRING['title'] );
            return QUERY_TITLE || '';
        } catch (e) {}
    }
    static get galleryType() {
        const QUERY_TYPE = getParameterFromUrl( QUERY_STRING['type'] );
        return GALLERY_TYPE[QUERY_TYPE] || GALLERY_TYPE['voice'];
    }
    static get currentLang() {
        try {
            return window.location.pathname.slice(1, 3);
        } catch (e) {
            return 'fa'
        }
    }
    static get categories() {
        const SEARCH = new URLSearchParams(window.location.search);
        return SEARCH.getAll( QUERY_STRING['categories'] );
    }
    static get generateFilterByUrl() {
        let categoriesQuery = '';
        const CATEGORY_CHECKBOXES = document.querySelectorAll(`.${CHECKBOX_CLASSNAME}`);
        const GALLERY_TYPE = GalleryInterface.galleryType,
              SORT = GalleryInterface.sort,
              TITLE = GalleryInterface.title;
        const CHECKED_CATEGORIES = document.querySelectorAll(`.${CHECKBOX_CLASSNAME}:checked`);
        if (Length( CHECKED_CATEGORIES ) !== Length( CATEGORY_CHECKBOXES )) {
            [].concat(...CHECKED_CATEGORIES).map(({ value }) => {
                categoriesQuery += `&${QUERY_STRING['categories']}=${value}`;
            });
        }

        return `?${QUERY_STRING['type']}=${GALLERY_TYPE}${categoriesQuery}${SORT ? `&${QUERY_STRING['sort']}=${SORT}` : ''}${TITLE ? `&${QUERY_STRING['title']}=${TITLE}` : ''}`;
    }
    static get createRequestQueryString() {
        try {
            const QUERIES = {
                [QUERY_STRING['type']]: GalleryInterface.galleryType,
                [QUERY_STRING['sort']]: GalleryInterface.sort,
                [QUERY_STRING['page']]: GalleryInterface.page,
                [QUERY_STRING['title']]: GalleryInterface.title,
            };
            !HasLength( QUERIES['sort'] ) && delete QUERIES['sort'];
            !HasLength( QUERIES['page'] ) && delete QUERIES['page'];
            !HasLength( QUERIES['title'] ) && delete QUERIES['title'];
            GalleryInterface.categories.forEach((slug, index) => {
                QUERIES[`categories[${index}]`] = slug
            });
            
            return QUERIES;
        } catch (e) {
            console.log(e);
        }
    }
    static updateURL( newUrl ) {
        try {
            history.pushState({}, null, newUrl);
            window.dispatchEvent(new Event('changeState'));
            LOADING_ELEMENT.classList.remove( OFF_LOADING );
        } catch ( exception ) {}
    }
    /**
     * @param category_type { String }
     */
    static async getGalleryCategoryByType( category_type ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.SITE_GET_CATEGORY_LIST), { category_type });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    };
    /**
     * @param queryString { Object }
     */
    static async getGalleryListFilterBy( queryString ) {
        try {
            let page_count = 0;
            const XXL_SCREEN = window.matchMedia("(min-width: 2000px)");
            const XL_SCREEN = window.matchMedia("(min-width: 1400px)");
            if ( XXL_SCREEN.matches ) {
                page_count = PAGE_COUNT['xxl']
            } else if ( XL_SCREEN.matches ) {
                page_count = PAGE_COUNT['xl']
            } else {
                page_count = PAGE_COUNT['other']
            }
            return await HTTPService.getRequest(Endpoint.get(Endpoint.SITE_GET_GALLERY_LIST, {
                lang: GalleryInterface.currentLang
            }), {
                page_count,
                ...queryString
            });
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    };
    /**
     * @param category_type { String }
     */
    static activeTabByQueryString( category_type ) {
        try {
            const CURRENT_TAB = TABS_WRAPPER.querySelector('.' + ACTIVE_TAB_CLASSNAME);
            CURRENT_TAB && CURRENT_TAB.classList.remove( ACTIVE_TAB_CLASSNAME );
            const TAB = TABS_WRAPPER.querySelector(`button[${DATA_PREFIX}="${category_type}"]`);
            !!TAB && TAB.classList.add( ACTIVE_TAB_CLASSNAME );
        } catch ( exception ) {}
    }
    /**
     * @param response { Array }
     */
    static async createCategoriesInterface( response ) {
        try {
            await new Promise(resolve => {
                const CATEGORIES = GalleryInterface.categories;
                const isChecked = category_slug => {
                    if ( !HasLength( CATEGORIES ) ) return true;
                    return CATEGORIES.includes( category_slug );
                };
                CATEGORIES_WRAPPER.innerHTML = `${(
                    [].concat( response ).map(item => (`
                    <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold">
                        <input type="checkbox" value="${item['slug']}"
                               class="checkbox-square__input" name="gallery"
                               ${isChecked( item['slug'] ) ? 'checked="checked"' : ''}
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded pointer-event-none"></span>
                        <span class="checkbox-square__label rounded user-select-none pointer-event-none">
                            ${ GalleryInterface.currentLang === 'fa' ? item['name_fa'] : item['name_en'] }
                        </span>
                    </label>
                `))
                ).join('')}`;
                resolve();
            })
        } catch (e) {}
    }
    /**
     * @param response { Array }
     */
    static async createGalleryItem( response ) {
        try {
            await new Promise(resolve => {
                if ( !HasLength( response ) ) {
                    ITEMS_WRAPPER.innerHTML = `<p class="block w-full text-center font-base font-bold text-blue-800 cursor-default">چیزی برای نمایش وجود ندارد.</p>`;
                } else {
                    ITEMS_WRAPPER.innerHTML = `${(
                        [].concat( response ).map(item => (`
                            <div class="ga-page__item xxl:w-1/4 xl:w-1/3 w-1/2 sm:w-full">
                                <a href="${item['href']}"
                                   class="ga-page__card relative w-full block font-xs font-bold border border-solid rounded-10 has-shadow">
                                    <figure class="ga-page__card_image relative w-full block rounded-inherit rounded-bl-none rounded-br-none">
                                        ${item['is_image'] ? '<span class="ga-page__card_camera absolute"></span>' : ''}
                                        ${(item['is_video'] || item['is_voice']) ? '<span class="ga-page__card_play absolute bg-white rounded-50"></span>' : ''}
                                        <img src="${item['image_path']}"
                                             alt="${item['title']}"
                                             class="block w-full h-full rounded-inherit object-cover"
                                        >
                                    </figure>
                                    <div class="ga-page__card_body">
                                        ${item['is_voice'] ? (`
                                            <p class="ga-page__card_category flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 415.963 415.963"
                                                     class="object-contain"
                                                >
                                                    <path d="M328.712,264.539c12.928-21.632,21.504-48.992,23.168-76.064c1.056-17.376-2.816-35.616-11.2-52.768  c-13.152-26.944-35.744-42.08-57.568-56.704c-16.288-10.912-31.68-21.216-42.56-35.936l-1.952-2.624  c-6.432-8.64-13.696-18.432-14.848-26.656c-1.152-8.32-8.704-14.24-16.96-13.76c-8.384,0.576-14.88,7.52-14.88,15.936v285.12  c-13.408-8.128-29.92-13.12-48-13.12c-44.096,0-80,28.704-80,64s35.904,64,80,64s80-28.704,80-64V165.467  c24.032,9.184,63.36,32.576,74.176,87.2c-2.016,2.976-3.936,6.176-6.176,8.736c-5.856,6.624-5.216,16.736,1.44,22.56  c6.592,5.888,16.704,5.184,22.56-1.44c4.288-4.864,8.096-10.56,11.744-16.512C328.04,265.563,328.393,265.083,328.712,264.539z"/>
                                                </svg>
                                                موسیقی
                                            </p>
                                        `) : ''}
                                        <p class="${item['is_voice'] ? 'ga-page__card_title text-center' : 'ga-page__card_iTitle text-right' } text-blue-800">
                                            ${item['title']}
                                        </p>
                                        ${(item['is_video'] || item['is_image']) ? (`
                                            <time class="ga-page__card_release has_notebook--gray w-full block text-gray-200 font-1xs text-left text-left">
                                                ${item['publish_date']}
                                            </time>
                                        `) : ''}
                                    </div>
                                    <p class="ga-page__card_link text-center">
                                        + ادامه
                                    </p>
                                </a>
                            </div>
                        `))
                    ).join('')}`;
                }
                resolve()
            })
        } catch (e) {}
    }
    static createSortButtonInterface() {
        try {
            const PREFIX = 'زمان انتشار ';
            const SORT_STATUS = GalleryInterface.sort || SORT['desc'];
            SORT_BUTTON.innerHTML = (`
                ${PREFIX + ' ' + LOCATION[SORT_STATUS]}
                <span class="ga-page__published--${SORT_STATUS}"></span>
            `).trim();
        } catch (e) {}
    }
}

const onChangeHistoryState = async () => {
    try {
        const GALLERY_TYPE = GalleryInterface.galleryType;
        GalleryInterface.activeTabByQueryString( GALLERY_TYPE );
        GalleryInterface.createSortButtonInterface();
        let response = await Promise.all([
            GalleryInterface.getGalleryCategoryByType( GALLERY_TYPE ),
            GalleryInterface.getGalleryListFilterBy( GalleryInterface.createRequestQueryString ),
        ]);
        await Promise.all([
            GalleryInterface.createCategoriesInterface(
                new CategoryPresenter( response[0].data )
            ),
            GalleryInterface.createGalleryItem(
                new GalleryPresenter( response[1].data?.items )
            )
        ]);
        const PAGINATION = new PaginationService({
            element: PAGINATION_ELEMENT,
            total: response[1].data['total'],
            perPage: response[1].data['per_page'],
            currentPage: response[1].data['current_page'],
        });
        PAGINATION.mount();
        response = null;
        collapseToggle.update();
        LOADING_ELEMENT.classList.add( OFF_LOADING );
    } catch (e) {}
};

const onclickCheckBoxes = event => {
    event.preventDefault();
    event.stopPropagation();
    const TARGET = event.target || event.srcElement;
    if ( /checkbox-square/.test(TARGET.className) ) {
        const INPUT = TARGET.querySelector('input[type="checkbox"]');
        INPUT.checked = !INPUT.checked;
        GalleryInterface.updateURL(
            GalleryInterface.generateFilterByUrl
        )
    }
};

const handelSearchAction = () => {
    const SEARCH_VALUE = SEARCH_FIELD.value;
    const SEARCH = new URLSearchParams( GalleryInterface.generateFilterByUrl );
    SEARCH.delete( QUERY_STRING['title'] );
    GalleryInterface.updateURL(
        '?' + SEARCH.toString() + `${SEARCH_VALUE ? `&${QUERY_STRING['title']}=${SEARCH_VALUE}` : ''}`
    );
};

const handelPagination = ({ target }) => {
    try {
        const PAGE = target.getAttribute('data-page');
        const numericPage = !!GalleryInterface.page ? parseInt( GalleryInterface.page ) : 1;
        const SEARCH = new URLSearchParams( GalleryInterface.generateFilterByUrl );
        SEARCH.delete( QUERY_STRING['page'] );
        if ( !!PAGE ) {
            GalleryInterface.updateURL(
                '?' + SEARCH.toString() + `&${QUERY_STRING['page']}=${PAGE}`
            );
        } else if ( target.classList.contains(CLASSNAME['first-page']) ) {
            GalleryInterface.updateURL(
                '?' + SEARCH.toString() + `&${QUERY_STRING['page']}=${numericPage - 1}`
            );
        } else if ( target.classList.contains(CLASSNAME['last-page']) ) {
            GalleryInterface.updateURL(
                '?' + SEARCH.toString() + `&${QUERY_STRING['page']}=${numericPage + 1}`
            );
        }
        SmoothScroll( CONTENT_WRAPPER.offsetTop );
    } catch (e) {
        console.log(e);
    }
};

(async () => {
    try {
        await onChangeHistoryState();
        window.addEventListener('popstate', async () => {
            LOADING_ELEMENT.classList.remove( OFF_LOADING );
            await onChangeHistoryState();
        });
        window.addEventListener('changeState', onChangeHistoryState);

        CATEGORIES_WRAPPER.addEventListener('click', onclickCheckBoxes);
        CLEAR_FILTER_BUTTON.addEventListener(
            'click',
            () => {
                GalleryInterface.updateURL(`?${QUERY_STRING['type']}=${GalleryInterface.galleryType}`);
            }
        );
        SORT_BUTTON.addEventListener(
            'click',
            () => {
                const SORT_STATUS = GalleryInterface.sort || SORT['desc'];
                const IS_DESC = SORT_STATUS === SORT['desc'];
                const SEARCH = new URLSearchParams( GalleryInterface.generateFilterByUrl );
                SEARCH.delete( QUERY_STRING['sort'] );
                GalleryInterface.updateURL(
                    '?' + SEARCH.toString() + `&${QUERY_STRING['sort']}=${IS_DESC ? SORT['asc'] : SORT['desc']}`
                )
            }
        );
        PAGINATION_ELEMENT.addEventListener('click', handelPagination);
        SEARCH_FIELD.addEventListener(
        'keyup',
        ({ key }) => {
                key === "Enter" && handelSearchAction();
            }
        );
        SEARCH_SUBMIT.addEventListener('click', handelSearchAction);
    } catch ( exception ) {}
})();

const collapseToggle = {
    visible(tab, collapse) {
        if ( !tab ) return tab;
        tab.classList.add( HEADER_PANEL_ACTIVE );
        if ( !!collapse.children[0] ) collapse.style.height = `${collapse.children[0].offsetHeight}px`;
    },
    hidden(tab, collapse) {
        if ( !tab ) return tab;
        collapse.style = null;
        tab.classList.remove( HEADER_PANEL_ACTIVE );
    },
    update() {
        if ( !TABLE_MEDIA_QUERY.matches ) return;
        const TARGET = document.querySelector('.' + HEADER_PANEL_ACTIVE);
        if ( !TARGET ) return;
        const COLLAPSE = TARGET.nextElementSibling;
        if ( !!COLLAPSE.children[0] ) COLLAPSE.style.height = `${COLLAPSE.children[0].offsetHeight}px`;
    }
};

if ( TABLE_MEDIA_QUERY.matches ) {
    const HEADER_PANEL = document.querySelectorAll('.ga-page .ga-page__panel_header');

    const onClickHeaderPanel = event => {
        try {
            event.preventDefault();
            const TARGET = event.target || event.srcElement;
            const COLLAPSE_ELEMENT = TARGET.nextElementSibling;
            if ( !!COLLAPSE_ELEMENT ) {
                TARGET.classList.contains( HEADER_PANEL_ACTIVE ) ? (
                    collapseToggle.hidden(TARGET, COLLAPSE_ELEMENT)
                ) : collapseToggle.visible(TARGET, COLLAPSE_ELEMENT)
            }
        } catch (e) {}
    };

    HEADER_PANEL.forEach(item => item.addEventListener('click', onClickHeaderPanel))
}

const onClickTabItem = event => {
    event.preventDefault();
    const TARGET = event.target || event.srcElement;
    const GALLERY_TYPE = TARGET.getAttribute( DATA_PREFIX );
    GalleryInterface.updateURL(`?${QUERY_STRING['type']}=${GALLERY_TYPE}`);
};

TAB_ITEMS.forEach(item => {
    item.addEventListener('click', onClickTabItem);
});