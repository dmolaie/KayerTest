import { Length } from "@vendor/plugin/helper";

const DATA_ATTR = 'data-page';
export const CLASSNAME = {
    'item': 'pagination__item',
    'break': 'pagination__item--break',
    'container': 'pagination__container',
    'item--page': 'pagination__item--page',
    'selected': 'pagination__item--selected',
    'disabled': 'pagination__item--disabled',
    'last-page': 'pagination__item--last-page',
    'first-page': 'pagination__item--first-page',
};


export default class PaginationService {
    constructor({element, currentPage = 1, perPage = 10, total}) {
        this.element = element;
        this.currentPage = currentPage;
        this.perPage = perPage;
        this.total = total;
        this.pageRange = 3;
        // this.bindEvent = this.onClickPaginate.bind( this );
    }

    get pageCount() {
        return Math.ceil((
            this.total / this.perPage
        ))
    }

    get firstPageSelected() {
        return this.currentPage === 1
    }

    get lastPageSelected() {
        return (this.currentPage === this.pageCount) || (this.pageCount === 0)
    }

    get pages() {
        let items = {};
        if ( this.pageCount <= this.pageRange ) {
            for (let index = 0; index < this.pageCount; index++) {
                items[index] = {
                    index: index,
                    content: index + 1,
                    selected: index === (this.currentPage - 1)
                }
            }
        }
        else {
            const halfPageRange = Math.floor(this.pageRange / 2);

            let setPageItem = index => {
                items[index] = {
                    index: index,
                    content: index + 1,
                    selected: index === (this.currentPage - 1)
                }
            };

            let setBreakView = index => {
                items[index] = {
                    disabled: true,
                    breakView: true
                }
            };

            for (let i = 0; i < 1; i++) {
                setPageItem(i);
            }

            let selectedRangeLow = 0;
            if (this.currentPage - halfPageRange > 0)
                selectedRangeLow = this.currentPage - 1 - halfPageRange;

            let selectedRangeHigh = selectedRangeLow + this.pageRange - 1;

            if (selectedRangeHigh >= this.pageCount) {
                selectedRangeHigh = this.pageCount - 1;
                selectedRangeLow = selectedRangeHigh - this.pageRange + 1;
            }

            for (let i = selectedRangeLow; i <= selectedRangeHigh && i <= this.pageCount - 1; i++) {
                setPageItem(i);
            }

            if ( selectedRangeLow )
                setBreakView(selectedRangeLow - 1);

            if (selectedRangeHigh + 1 < this.pageCount - 1)
                setBreakView(selectedRangeHigh + 1);

            for (let i = this.pageCount - 1; i >= this.pageCount - 1; i--) {
                setPageItem(i);
            }
        }
        return items
    }

    mount() {
        try {
            const PAGES = Object.values( this.pages );
            if ( Length( PAGES ) < 2 ) {
                this.element.innerHTML = '';
                return ;
            }
            const PAGE = [].concat( PAGES ).map(page => {
                if ( page.breakView ) {
                    return (`
                        <div class="${CLASSNAME['item']}">
                            <div class="${CLASSNAME['break']} font-sm font-bold w-full h-full text-center cursor-default pointer-event-none"
                            > … </div>
                        </div>
                    `).trim()
                }
                if ( page.disabled ) {
                    return (`
                        <div class="${CLASSNAME['item']}">
                            <div class="${CLASSNAME['disabled']} font-sm font-bold w-full h-full text-center cursor-default pointer-event-none"
                            > ${page.content} </div>
                        </div>
                    `).trim()
                }
                return (`
                    <div class="${CLASSNAME['item']}">
                        <button class="w-full h-full font-sm font-bold text-center ${page.selected ? CLASSNAME['selected'] : ''}"
                                ${DATA_ATTR}="${page.index + 1}"
                        > ${page.content} </button>
                    </div>
                `).trim()
            }).join('');
            this.element.innerHTML = (`
                <div class="${CLASSNAME['container']} flex flex-row-reverse items-stretch justify-start">
                    <button class="${this.firstPageSelected ? CLASSNAME['disabled'] : ''} ${CLASSNAME['item'] + ' ' + CLASSNAME['item--page'] + ' ' + CLASSNAME['first-page']} text-center"
                    > </button>
                    ${PAGE}
                    <button class="${this.lastPageSelected ? CLASSNAME['disabled'] : ''} ${CLASSNAME['item'] + ' ' + CLASSNAME['item--page'] + ' ' + CLASSNAME['last-page']} text-center"
                    > </button>
                </div>
            `).trim();
            // this.element.addEventListener('click', this.bindEvent);
        } catch (e) {
            console.log(e);
        }
    }
}