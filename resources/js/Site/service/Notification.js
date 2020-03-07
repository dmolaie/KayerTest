const DEFAULT_OPTIONS = {
    text: '',
    type: 'simple',
    duration: 5000,
};

const GENERATE_UUID = () => (
    'xxxxxxxx'.replace(/./g, () => ( Math.random() * 16 | 0 ).toString( 16 ) )
);

const ATTRIBUTE_PREFIX = 'ntf-';
const HIDDEN_CLASSNAME = "notification__item--out";

const CREATE_INTERFACE = (item, UUID) => (`
    <div class="notification__item w-full h-full border border-solid rounded-1/2 overflow-hidden notification__item--${item.type}"
         data-type="${ATTRIBUTE_PREFIX}${UUID}"
    >
        <p class="notification__label font-base font-bold user-select-none cursor-pointer">
            ${item.text}
        </p>
        <div class="notification__progress-bar w-full">
            <div class="notification__progress-bar_percentage w-0"
                 style="animation-duration: ${item.duration}ms"
            ></div>
        </div>
    </div>
`);

const ADD_EVENT_LISTENER = ( element, uuid ) => {
    const NOTIF = element.querySelector(`.notification__item[data-type="${ATTRIBUTE_PREFIX}${uuid}"]`);

    const HIDDEN_NOTIFICATION = () => {
        if ( !!NOTIF ) NOTIF.classList.add( HIDDEN_CLASSNAME );
        setTimeout(() => {
            element.removeChild( NOTIF );
        }, 700)
    };

    if ( !!NOTIF ) {
        NOTIF.addEventListener('click', HIDDEN_NOTIFICATION );
        let progress_bar = NOTIF.querySelector('.notification__progress-bar_percentage');
        progress_bar.addEventListener('animationend', HIDDEN_NOTIFICATION );
    }
};

function Notification( options ) {
    const ELEMENT = this,
        OPTIONS = {
            ...DEFAULT_OPTIONS,
            ...options
        };

    const UUID = GENERATE_UUID();
    const INTERFACE = CREATE_INTERFACE( OPTIONS, UUID );

    ELEMENT.insertAdjacentHTML('beforeend', INTERFACE );

    ADD_EVENT_LISTENER.call( null, ELEMENT, UUID );
}

( !!HTMLElement ) ? (
    HTMLElement.prototype.Notification = Notification
) : (
    Object.prototype.Notification = Notification
);