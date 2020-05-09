import Notification from './service/Notification';
import { hideScrollbar, showScrollbar } from '@vendor/plugin/helper';

try {
    const SPINNER_LOADING_CLASSNAME = 'spinner-loading';
    const INVALID_FORMAT_ERROR_MESSAGE = 'فرمت فایل انتخابی نامعتبر است.';
    const INVALID_SIZE_ERROR_MESSAGE = 'حجم فایل باید کمتر از ۱۰ مگ باشد.';
    const DROP_BOX_ACTIVE_CLASSNAME = 'd-share__drop--hover';
    const DROP_BOX = document.querySelector('.d-share .d-share__drop');
    const DROP_BOX_INPUT = document.querySelector('.d-share .d-share__uploadField');
    const NOTIFICATION = document.querySelector('.d-share .notification');

    const DROP_BOX_HOVER = {
        show() {
            DROP_BOX.classList.add( DROP_BOX_ACTIVE_CLASSNAME );
        },
        hidden() {
            DROP_BOX.classList.remove( DROP_BOX_ACTIVE_CLASSNAME );
        }
    };

    const getSizeOfVideo = size => (size / 1000000).toFixed(2);

    const getImagePreviewFromVideo = async file => {
        try {
            return await new Promise(resolve => {
                const fReader = new FileReader();
                fReader.addEventListener(
                    'load',
                    () => {
                        resolve( fReader.result );
                    }
                );
                fReader.readAsDataURL( file );
            });
        } catch (e) {}
    };

    const onSelectVideo = async file => {
        try {
            const FILE_TYPE = file.type;
            const FILE_SIZE = getSizeOfVideo( file.size );

            if ( !FILE_TYPE.includes('video') ) throw new Error( INVALID_FORMAT_ERROR_MESSAGE );
            if (FILE_SIZE > 10) throw new Error( INVALID_SIZE_ERROR_MESSAGE );
            // document.getElementById('images').src = await getImagePreviewFromVideo( file );
        } catch ( exception ) {
            NOTIFICATION.Notification({
                text: exception?.message,
                type: 'error',
            });
        }
    };

    DROP_BOX.addEventListener('dragleave',() => DROP_BOX_HOVER.hidden());
    DROP_BOX.addEventListener('dragover', event => event.preventDefault());
    DROP_BOX.addEventListener(
        'dragenter',
            event => {
                event.preventDefault();
                DROP_BOX_HOVER.show();
            }
    );
    DROP_BOX.addEventListener(
        'drop',
        async event => {
            event.preventDefault();
            const { files } = event.dataTransfer;
            DROP_BOX_HOVER.hidden();
            await onSelectVideo( files[0] )
        }
    );
    DROP_BOX_INPUT.addEventListener(
        'change',
        async ({ target: { files } }) => { await onSelectVideo( files[0] ) }
    );


} catch (e) {}

try {
    const DISPLAY_NONE_CLASS = 'none';
    const OPENED_CLASSNAME = 'd-share__confirm--opened';
    const CLOSED_CLASSNAME = 'd-share__confirm--closed';
    const REMOVE_BUTTON_CLASSNAME = 'd-share__tButton';
    const TBODY_ELEMENT = document.querySelector('.d-share__tbody');
    const MODAL = document.querySelector('.d-share__confirm');
    const MODAL_BODY = document.querySelector('.d-share__confirmWrapper');
    const DISCARD_BUTTON = document.querySelector('.d-share__confirmButton--discard');

    const onClickOutSideOfModal = ({ target }) => {
        if (!MODAL_BODY.contains( target )) toggleConfirmModal.hidden();
    };

    const toggleConfirmModal = {
        visible() {
            hideScrollbar();
            MODAL.classList.remove( DISPLAY_NONE_CLASS );
            MODAL.classList.remove( CLOSED_CLASSNAME );
            MODAL.classList.add( OPENED_CLASSNAME );
            MODAL.addEventListener('click', onClickOutSideOfModal);
        },
        hidden() {
            showScrollbar();
            MODAL.classList.add( CLOSED_CLASSNAME );
            MODAL.removeEventListener('click', onClickOutSideOfModal);
            setTimeout(() => {
                MODAL.classList.remove( OPENED_CLASSNAME );
                MODAL.classList.add( DISPLAY_NONE_CLASS );
            }, 320)
        }
    };

    DISCARD_BUTTON.addEventListener('click', () => toggleConfirmModal.hidden());

    TBODY_ELEMENT.addEventListener(
        'click',
        event => {
            event.preventDefault();
            const TARGET = event.target || event.srcElement;
            TARGET.classList.contains( REMOVE_BUTTON_CLASSNAME ) && toggleConfirmModal.visible();
        }
    )
} catch (e) {}