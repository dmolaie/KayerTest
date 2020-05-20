import Share from '@vendor/plugin/shareSocialMedia';
import donationCard, {
    printCard
} from '@vendor/plugin/donationCard';

try {
    const SHARE_TAB_INDEX = 2;
    const PRINT_TAB_INDEX = 3;
    const ACTIVE_TAB_CLASSNAME = 'tab__item--active';
    const ACTIVE_CONTENT_CLASSNAME = 'content__item--active';
    const TAB_CONTAINER = document.querySelector('.profile-p .tab');
    const CONTENT_CONTAINER = document.querySelector('.profile-p .content');

    const TOGGLE_TABS = {
        visibleTab( element ) {
            TOGGLE_TABS.hiddenActiveTab();
            element.classList.add( ACTIVE_TAB_CLASSNAME );
            CONTENT_CONTAINER.querySelector(`[tabindex="${element.getAttribute('tabindex')}"]`)
                .classList.add( ACTIVE_CONTENT_CLASSNAME );
        },
        visibleSpecificTab( tabindex ) {
            TOGGLE_TABS.hiddenActiveTab();
            TAB_CONTAINER.querySelector(`[tabindex="${tabindex}"]`)
                .classList.add( ACTIVE_TAB_CLASSNAME );
            CONTENT_CONTAINER.querySelector(`[tabindex="${tabindex}"]`)
                .classList.add( ACTIVE_CONTENT_CLASSNAME );
        },
        hiddenActiveTab() {
            let tab = TAB_CONTAINER.querySelector(`.${ACTIVE_TAB_CLASSNAME}`);
            let content = CONTENT_CONTAINER.querySelector(`.${ACTIVE_CONTENT_CLASSNAME}`);
            if ( tab && content ) {
                tab.classList.remove( ACTIVE_TAB_CLASSNAME );
                content.classList.remove( ACTIVE_CONTENT_CLASSNAME );
            }
        }
    };

    TAB_CONTAINER.querySelectorAll('.tab__item')
        .forEach(item => {
            item.addEventListener(
                'click',
                ( { target } ) => {
                    TOGGLE_TABS.visibleTab( target );
                }
            )
        });

    const OPEN_PRINT_TAB = document.querySelectorAll('.profile-p .print-tab');

    if ( !!OPEN_PRINT_TAB ) {
        OPEN_PRINT_TAB.forEach(item => {
            item.addEventListener(
                'click',
                () => {
                    TOGGLE_TABS.visibleSpecificTab( PRINT_TAB_INDEX );
                }
            )
        })
    }

    const OPEN_SHARE_TAB_CLASSNAME = 'share-box--active';
    const SHARE_BUTTON = document.querySelector('#share_button');
    const SHARE_BOX = document.querySelector('.profile-p .share-box');
    const OPEN_SHARE_TAB = document.querySelectorAll('.profile-p .share-tab');

    const TOGGLE_SHARE_BOX = {
        visible() {
            SHARE_BOX
                .style.height = `${SHARE_BOX.children[0].offsetHeight}px`;
            SHARE_BOX.classList.add( OPEN_SHARE_TAB_CLASSNAME );
        },
        hidden() {
            SHARE_BOX.style = null;
            SHARE_BOX.classList.remove( OPEN_SHARE_TAB_CLASSNAME );
        }
    };

    if ( !!OPEN_SHARE_TAB ) {
        OPEN_SHARE_TAB.forEach(item => {
            item.addEventListener(
                'click',
                () => {
                    TOGGLE_TABS.visibleSpecificTab( SHARE_TAB_INDEX );
                }
            )
        })
    }

    if ( !!SHARE_BUTTON ) {
        SHARE_BUTTON.addEventListener(
            'click',
            () => {
                ( !SHARE_BOX.classList.contains( OPEN_SHARE_TAB_CLASSNAME ) ) ? (
                    TOGGLE_SHARE_BOX.visible()
                ) : (
                    TOGGLE_SHARE_BOX.hidden()
                );
            }
        )
    }

    const SHARE_URL = SHARE_BUTTON.getAttribute('data-share');

    document.getElementById('share-section').Share({
        via: 'ehda.center',
        hashtags: 'ehdacenter,ehda,انجمن اهدا عضو ایرانیان',
        url: SHARE_URL,
        media: SHARE_URL,
        content: 'کارت اهدا اینجانب در انجمن اهدا ایرانیان برای شما ارسال شده است',
        share: [
            {
                name: 'email',
                class: 'i-page__social ic--gmail transition-opacity opacity-80 l:hover:opacity-1',
            },
            {
                name: 'facebook',
                class: 'i-page__social ic--facebook transition-opacity opacity-80 l:hover:opacity-1',
            },
            {
                name: 'telegram',
                class: 'i-page__social ic--telegram transition-opacity opacity-80 l:hover:opacity-1',
            },
            {
                name: 'twitter',
                class: 'i-page__social ic--twitter transition-opacity opacity-80 l:hover:opacity-1',
            },
            {
                name: 'pinterest',
                class: 'i-page__social ic--pinterest transition-opacity opacity-80 l:hover:opacity-1',
            },
        ]
    });

    window.addEventListener(
        'load',
        async () => {
            try {
                const LOADING_CLASS = 'image_loading';
                const CARD_LABEL = document.querySelector('#card_info span').textContent.trim();
                const CARD_LABELS = document.querySelector('#card_info p')?.textContent?.split('$');
                let response = await Promise.all([
                    donationCard(CARD_LABEL),
                    donationCard(CARD_LABEL, 'mini'),
                    donationCard(CARD_LABEL, 'social'),
                    printCard({
                        name: CARD_LABELS[0],
                        mobile: CARD_LABELS[1],
                        email: ''
                    })
                ]);
                document.querySelector('.single_cart').src = response[0].base64;
                document.querySelector('.d-single_cart').href = response[0].download;
                document.querySelector('.mini_cart').src = response[1].base64;
                document.querySelector('.d-mini_cart').href = response[1].download;
                document.querySelector('.social_cart').src = response[2].base64;
                document.querySelector('.d-social_cart').href = response[2].download;
                document.querySelector('.print_card').src = response[3].base64;
                document.querySelectorAll('.' + LOADING_CLASS)
                    .forEach(item => item.classList.remove( LOADING_CLASS ))
            } catch (e) { }
        })
} catch (e) {}