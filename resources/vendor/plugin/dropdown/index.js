import {
    HasLength, Debounce
} from "@vendor/plugin/helper";

const DEFAULT_OPTIONS = {
    inputClass: "",
    optionClass: "",
    filterClass: "",
    filterPlaceholder: "",
    dropdownClass: "",
    onSelected: false,
    hasFilterItem: false,
};

const DISPLAY_NONE = 'none';
const ATTRIBUTE_PREFIX = 'dpd';
const DROPDOWN_UUID_ATTRIBUTE = 'data-uuid';
const DROPDOWN_OPTION_ATTRIBUTE = 'data-val';

const DROPDOWN_CLASS = {
    'dropdown': 'dropdown',
    'input'   : 'dropdown__input',
    'body'    : 'dropdown__body',
    'options' : 'dropdown__options',
    'option'  : 'dropdown__option',
    'filter'  : 'dropdown__filter',
    'active'  : 'dropdown--active',
    'has_filter'    : 'dropdown__body--filter',
    'filter_input'  : 'dropdown__filter_input',
    'filter_btn'  : 'dropdown__filter_btn',
    'selected'  : 'dropdown__option--selected',
};

const GENERATE_UUID = () => (
  'xxxxxxxx'.replace(/./g, () => ( Math.random() * 16 | 0 ).toString( 16 ) )
);

const CREATE_OPTION_ELEMENT = ( options, optionClass ) => (
    [].concat( ...options )
        .map(option => {
            let { value, textContent } = option,
                attribute = HasLength( value ) ? `${ATTRIBUTE_PREFIX}-${value}` : '';
            option.setAttribute( DROPDOWN_OPTION_ATTRIBUTE, attribute );
            return (`
                <div class="${DROPDOWN_CLASS['option']} cursor-pointer user-select-none ${optionClass}"
                     ${DROPDOWN_OPTION_ATTRIBUTE}="${attribute}"
                >
                    ${textContent.trim()}
                </div>
            `)
        }).join('')
);

const CREATE_FILTER_SECTION = ( filterClass, filterPlaceholder ) => {
    return (`
        <div class="${DROPDOWN_CLASS['filter']} w-full relative ${filterClass}">
            <input type="text"
                   placeholder="${filterPlaceholder}"
                   class="w-full ${DROPDOWN_CLASS['filter_input']}"
            />
            <button class="${DROPDOWN_CLASS['filter_btn']} ${DISPLAY_NONE} absolute"></button>
        </div>
    `)
};

const CREATE_INTERFACE = ( element, UUID, dropdownClass, inputClass, optionClass, hasFilterItem, filterClass, filterPlaceholder ) => {
    let attribute = `${ATTRIBUTE_PREFIX}-${UUID}`;

    element.classList.add( DISPLAY_NONE );
    element.setAttribute( DROPDOWN_UUID_ATTRIBUTE, attribute );

    const OPTIONS = element.querySelectorAll('option');
    if ( HasLength( OPTIONS ) ) {
        const CREATED_OPTION = CREATE_OPTION_ELEMENT( OPTIONS, optionClass );
        element.parentElement.insertAdjacentHTML(
            'beforeend',`
                <div class="${DROPDOWN_CLASS['dropdown']} relative ${dropdownClass}"
                     ${DROPDOWN_UUID_ATTRIBUTE}="${attribute}"
                >
                    <div class="${DROPDOWN_CLASS['input']} cursor-pointer user-select-none ${inputClass}">
                        ${OPTIONS[0].textContent.trim()}
                    </div>
                    <div class="${DROPDOWN_CLASS['body']} ${!!hasFilterItem ? DROPDOWN_CLASS['has_filter'] : ''} absolute w-full opacity-0 visibility-hidden pointer-event-none transition-opacity">
                        ${!!hasFilterItem ? CREATE_FILTER_SECTION(filterClass, filterPlaceholder) : ""}
                        <div class="${DROPDOWN_CLASS['options']} w-full">
                            ${CREATED_OPTION}
                        </div>
                    </div>
                </div>
            `
        )
    } else {
        throw "CREATE_INTERFACE: You don't have any child option"
    }
};

const ADD_EVENT_LISTENER = ( parentElement, UUID, onSelected, hasFilterItem ) => {
    const DROPDOWN_ELEMENT = parentElement.querySelector(`.${DROPDOWN_CLASS['dropdown']}[${DROPDOWN_UUID_ATTRIBUTE}=${ATTRIBUTE_PREFIX + '-' +UUID}]`),
          DROPDOWN_BODY_ELEMENT = DROPDOWN_ELEMENT.querySelector(`.${DROPDOWN_CLASS['body']}`),
          DROPDOWN_INPUT_ELEMENT = DROPDOWN_ELEMENT.querySelector(`.${DROPDOWN_CLASS['input']}`),
          DROPDOWN_FILTER_ELEMENT = DROPDOWN_ELEMENT.querySelector(`.${DROPDOWN_CLASS['filter_input']}`),
          DROPDOWN_FILTER_BTN_ELEMENT = DROPDOWN_ELEMENT.querySelector(`.${DROPDOWN_CLASS['filter_btn']}`),
          DROPDOWN_OPTIONS_ELEMENT = DROPDOWN_ELEMENT.querySelector(`.${DROPDOWN_CLASS['options']}`),
          DROPDOWN_OPTION_ELEMENT = DROPDOWN_ELEMENT.querySelectorAll(`.${DROPDOWN_CLASS['option']}`);

    const SET_DROPDOWN_POSITION = () => {
        DROPDOWN_BODY_ELEMENT
            .style.top = `${DROPDOWN_INPUT_ELEMENT.offsetHeight}px`
    };

    const CLICK_OUTSIDE_EVENT = ( { target } ) => {
        console.log('inja', !DROPDOWN_ELEMENT.contains(target));
        if ( !DROPDOWN_ELEMENT.contains(target) )
            TOGGLE_DROPDOWN.close();
    };

    const RESET_FILTER_EFFECT = () => {
        DROPDOWN_FILTER_ELEMENT.value = null;
        [].concat( ...DROPDOWN_OPTION_ELEMENT ).forEach(item => {
            item.classList.remove( DISPLAY_NONE )
        });
    };

    const FILTER_OPTION_ELEMENT = value => {
        let optionElement = [].concat( ...DROPDOWN_OPTION_ELEMENT );
        optionElement.forEach(item => {
            let text = item.textContent || item.innerText;
            ( ( text.toLowerCase() ).includes( value ) ) ? (
                item.classList.remove( DISPLAY_NONE )
            ) : (
                item.classList.add( DISPLAY_NONE )
            )
        });
        ( !!value ) ? (
            DROPDOWN_FILTER_BTN_ELEMENT.classList.remove( DISPLAY_NONE )
        ) : (
            DROPDOWN_FILTER_BTN_ELEMENT.classList.add( DISPLAY_NONE )
        )
    };

    const DEBOUNCE_FILTER_OPTION_ELEMENT = Debounce( FILTER_OPTION_ELEMENT, 300 );

    const ONINPUT_FILTER_INPUT = ( { target: { value } } ) => {
        let inputValue = value.toLowerCase();
        DEBOUNCE_FILTER_OPTION_ELEMENT( inputValue );
    };

    const ONCLICK_RESET_FILTER_BTN = event => {
        event.preventDefault();
        RESET_FILTER_EFFECT();
        DROPDOWN_FILTER_BTN_ELEMENT.classList.add( DISPLAY_NONE );
    };

    const SET_TEXT_CONTENT= ( text = '' ) => {
        DROPDOWN_INPUT_ELEMENT.textContent = text.trim();
        SET_DROPDOWN_POSITION();
    };

    const ONCLICK_DROPDOWN_OPTIONS = ( { target } ) => {
        const DATA_VAL = target.getAttribute( DROPDOWN_OPTION_ATTRIBUTE );
        if ( !!DATA_VAL ) {
            const SELECT_ELEMENT  = parentElement.querySelector(`select[${DROPDOWN_UUID_ATTRIBUTE}=${ATTRIBUTE_PREFIX + '-' +UUID}]`);
            const SELECTED_OPTION = SELECT_ELEMENT.querySelector(`option[${DROPDOWN_OPTION_ATTRIBUTE}=${DATA_VAL}]`);
            const PREV_SELECTED_OPTION  = DROPDOWN_OPTIONS_ELEMENT.querySelector(`.${DROPDOWN_CLASS['selected']}`);
            if ( !!PREV_SELECTED_OPTION ) PREV_SELECTED_OPTION.classList.remove( DROPDOWN_CLASS['selected'] );
            SELECTED_OPTION.selected = true;
            target.classList.add( DROPDOWN_CLASS['selected'] );
            SET_TEXT_CONTENT( target.textContent );
            if ( !!onSelected ) onSelected( DROPDOWN_ELEMENT, SELECTED_OPTION );
            TOGGLE_DROPDOWN.close();
        }
    };

    const TOGGLE_DROPDOWN = {
        open() {
            SET_DROPDOWN_POSITION();
            DROPDOWN_ELEMENT.classList.add( DROPDOWN_CLASS['active'] );
            document.addEventListener('click', CLICK_OUTSIDE_EVENT);
            DROPDOWN_OPTIONS_ELEMENT.addEventListener('click', ONCLICK_DROPDOWN_OPTIONS, false);
            if ( !!hasFilterItem ) {
                DROPDOWN_FILTER_ELEMENT.addEventListener('input', ONINPUT_FILTER_INPUT);
                DROPDOWN_FILTER_BTN_ELEMENT.addEventListener('click', ONCLICK_RESET_FILTER_BTN);
            }
        },
        close() {
            DROPDOWN_ELEMENT.classList.remove( DROPDOWN_CLASS['active'] );
            document.removeEventListener('click', CLICK_OUTSIDE_EVENT);
            DROPDOWN_OPTIONS_ELEMENT.removeEventListener('click', ONCLICK_DROPDOWN_OPTIONS, false);
            if ( !!hasFilterItem ) {
                DROPDOWN_FILTER_ELEMENT.removeEventListener('input', ONINPUT_FILTER_INPUT);
                DROPDOWN_FILTER_BTN_ELEMENT.removeEventListener('click', ONCLICK_RESET_FILTER_BTN);
                RESET_FILTER_EFFECT();
            }
        }
    };

    const ONCLICK_DROPDOWN = ( { target } ) => {
        const PARENT_ELEMENT  = target.parentElement;
        ( !PARENT_ELEMENT.classList.contains( DROPDOWN_CLASS['active'] ) ) ? (
            TOGGLE_DROPDOWN.open()
        ) : (
            TOGGLE_DROPDOWN.close()
        );
    };

    DROPDOWN_INPUT_ELEMENT
        .addEventListener( 'click', ONCLICK_DROPDOWN );
};

function MountDropdown( options ) {
    const ELEMENT = this,
          OPTIONS = {
              ...DEFAULT_OPTIONS,
              ...options
          };

    let {
        inputClass,
        optionClass,
        dropdownClass,
        onSelected,
        hasFilterItem,
        filterClass,
        filterPlaceholder
    } = OPTIONS;

    const UUID = GENERATE_UUID();

    CREATE_INTERFACE.call( null, ELEMENT, UUID, dropdownClass, inputClass, optionClass, hasFilterItem, filterClass, filterPlaceholder );
    ADD_EVENT_LISTENER.call( null, ELEMENT.parentElement, UUID, onSelected, hasFilterItem );
}

( !!HTMLElement ) ? (
    HTMLElement.prototype.MountDropdown = MountDropdown
) : (
    Object.prototype.MountDropdown = MountDropdown
);