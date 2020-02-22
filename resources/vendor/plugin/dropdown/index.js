import {
    HasLength
} from "@vendor/plugin/helper";

const DEFAULT_OPTIONS = {
    inputClass: "",
    optionClass: "",
    dropdownClass: "",
    onSelected: false,
};

const ATTRIBUTE_PREFIX = 'dropdown';
const DROPDOWN_ATTRIBUTE = 'data-val';

const DROPDOWN_CLASS = {
    'dropdown': 'dropdown',
    'input'   : 'dropdown__input',
    'body'    : 'dropdown__body',
    'options' : 'dropdown__options',
    'option'  : 'dropdown__option',
    'active'  : 'dropdown--active',
};

const CREATE_OPTION_ELEMENT = ( options, optionClass ) => (
    [].concat( ...options )
        .map(option => {
            let { value, textContent } = option,
                attribute = HasLength( value ) ? `${ATTRIBUTE_PREFIX}-${value}` : '';
            option.setAttribute( DROPDOWN_ATTRIBUTE, attribute );
            return (`
                <div class="${DROPDOWN_CLASS['option']} ${optionClass}"
                     ${DROPDOWN_ATTRIBUTE}="${attribute}"
                >
                    ${textContent.trim()}
                </div>
            `)
        }).join('')
);

const CREATE_INTERFACE = ( element, dropdownClass, inputClass, optionClass ) => {
    const OPTIONS = element.querySelectorAll('option');
    if ( HasLength( OPTIONS ) ) {
        const CREATED_OPTION = CREATE_OPTION_ELEMENT( OPTIONS, optionClass );
        element.parentElement.insertAdjacentHTML(
            'beforeend',`
                <div class="${DROPDOWN_CLASS['dropdown']} relative ${dropdownClass}">
                    <div class="${DROPDOWN_CLASS['input']} cursor-pointer ${inputClass}">
                        ${OPTIONS[0].textContent.trim()}
                    </div>
                    <div class="${DROPDOWN_CLASS['body']} absolute w-full opacity-0 visibility-hidden pointer-event-none transition-opacity">
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

const CLICK_OUTSIDE_EVENT = ( { target } ) => {
    console.log(target, 'CLICK_OUTSIDE_EVENT');
};

const ONCLICK_DROPDOWN_OPTIONS = ( { target } ) => {
    try {
        console.log('d');
        const DATA_VAL = target.getAttribute( DROPDOWN_ATTRIBUTE );
        let SELECT_ELEMENT =
            target.parentElement?.parentElement?.parentElement;
        console.log(SELECT_ELEMENT, DATA_VAL,'ONCLICK_DROPDOWN_OPTIONS');
    } catch (e) {}
};

const TOGGLE_DROPDOWN = {
    open( options ) {
        options.addEventListener('click', ONCLICK_DROPDOWN_OPTIONS);
        // document.addEventListener('click', CLICK_OUTSIDE_EVENT);
    },
    close( options ) {
        options.removeEventListener('click', ONCLICK_DROPDOWN_OPTIONS);
        // document.removeEventListener('click', CLICK_OUTSIDE_EVENT);
    }
};

const ONCLICK_DROPDOWN = ( { target } ) => {
    const PARENT_ELEMENT  = target.parentElement,
          OPTIONS_ELEMENT = PARENT_ELEMENT.querySelector(`.${DROPDOWN_CLASS['options']}`);

    ( !PARENT_ELEMENT.classList.contains( DROPDOWN_CLASS['active'] ) ) ? (
        TOGGLE_DROPDOWN.open( OPTIONS_ELEMENT )
    ) : (
        TOGGLE_DROPDOWN.close( OPTIONS_ELEMENT )
    );
    PARENT_ELEMENT.classList.toggle( DROPDOWN_CLASS['active'] );
};

const ADD_EVENT_LISTENER = ( parentElement ) => {
    parentElement.querySelector(`.${DROPDOWN_CLASS['input']}`)
        .addEventListener( 'click', ONCLICK_DROPDOWN );
};

function MountDropdown( options ) {
    const ELEMENT = this,
          OPTIONS = Object.assign( DEFAULT_OPTIONS, options );

    let {
        inputClass,
        optionClass,
        dropdownClass,
    } = OPTIONS;

    CREATE_INTERFACE.call( null, ELEMENT, dropdownClass, inputClass, optionClass );
    ADD_EVENT_LISTENER.call( null, ELEMENT.parentElement );
}

( !!HTMLElement ) ? (
    HTMLElement.prototype.MountDropdown = MountDropdown
) : (
    Object.prototype.MountDropdown = MountDropdown
);