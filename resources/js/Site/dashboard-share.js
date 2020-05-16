const tus = require("tus-js-client");
import Endpoint from '@endpoints';
import HTTPService from './service/HttpService';
import Notification from './service/Notification';
import ExceptionService from '@services/service/exception';
import ShareVideoPresenter from '@js/presenter/ShareVideo';
import {hideScrollbar, showScrollbar} from '@vendor/plugin/helper';

const ENDPOINT = {
    "ARVAN_UPLOAD_FILE": `https://napi.arvancloud.com/vod/2.0/channels/${CHANNEL_ID}/files`,
    "ARVAN_UPLOAD_VIDEOS": `https://napi.arvancloud.com/vod/2.0/channels/${CHANNEL_ID}/videos`,
};

const SUCCESS_TEXT = "بارگزاری کامل شد";
const LOADING_TEXT = "در حال بارگذاری ویدیو ...";
const HEIGHT_0_CLASSNAME = 'h-0';
const SPINNER_LOADING_CLASSNAME = 'spinner-loading';
const DROP_BOX_ACTIVE_CLASSNAME = 'd-share__drop--hover';
const LOADING_PROGRESS_BAR = 'd-share__progressbar--loading';
const INVALID_FORMAT_ERROR_MESSAGE = 'فرمت فایل انتخابی نامعتبر است. فرمت های مجاز: MP4 | AVI | M4V';
const FIRST_STEP = document.querySelector('.d-share__inputs');
const SECOND_STEP = document.querySelector('.d-share__details');
const IMAGE_PREVIEW = document.querySelector('.d-share__previewImage');
const STATUS_EL = document.querySelector('.d-share__sts');
const FILE_SIZE_EL = document.querySelector('.d-share__size');
const PROGRESSBAR_EL = document.querySelector('.d-share__progressbar');
const DROP_BOX = document.querySelector('.d-share .d-share__drop');
const DROP_BOX_INPUT = document.querySelector('.d-share .d-share__uploadField');
const NOTIFICATION_EL = document.querySelector('.d-share .notification');
const SUBMIT_BUTTON = document.querySelector('.d-share .d-share__submit');
const TEXTAREA = document.querySelector('.d-share .d-share__textarea');

class Video {
    #file = null;

    constructor(file) {
        this.#file = file;
        this.videoElement = document.createElement('video');
        this.videoElement.muted = true;
        this.videoElement.preload = 'metadata';
        this.videoElement.setAttribute('crossOrigin', 'anonymous');
        this.canvas = document.createElement('canvas');
        this.canvasContext = this.canvas.getContext('2d');
    }

    get getBobUrl() {
        try {
            return new Promise(resolve => {
                const fReader = new FileReader();
                fReader.addEventListener(
                    'load',
                    () => {
                        resolve(fReader.result);
                    }
                );
                fReader.readAsDataURL(this.#file);
            });
        } catch (e) {
        }
    }

    async createVideoElement() {
        try {
            this.videoElement.src = `${await this.getBobUrl}`;
            await this.videoElement.play();
        } catch (e) {
        }
    }

    async getThumbnails() {
        try {
            return await new Promise(async resolve => {
                this.videoElement.addEventListener(
                    'loadeddata', async () => {
                        this.videoElement.currentTime = (this.videoElement.duration / 2);
                        document.body.append(this.videoElement);
                        this.canvas.width = this.videoElement?.videoWidth || 400;
                        this.canvas.height = this.videoElement?.videoHeight || 400;
                        this.canvasContext.drawImage(this.videoElement, 0, 0);
                        await this.videoElement.pause();
                        resolve(this.canvas.toDataURL('image/jpeg'));
                    }
                );
                await this.createVideoElement();
            });
        } catch (e) {
        }
    }

}

const createManageTable = response => {
    const TBODY = document.querySelector('.d-share .d-share__tbody');
    TBODY.innerHTML = (`
        <div class="d-share__tr w-full flex font-xs font-bold cursor-default">
            <div class="d-share__cell flex-2 inline-flex items-center justify-start">
                <a href="${response.link}‍‍" target="_blank" data-url="${response.link}"
                   class="text-blue l:transition-color l:hover:color-blue-200"
                >
                    دریافت ویدیو
                </a>
            </div>
            <div class="d-share__cell flex-2 inline-flex items-center justify-center">
                ${response.publish_date}
            </div>
            <div class="d-share__cell flex-1 inline-flex items-center justify-center">
                <span class="d-share__status d-share__status--accept font-1xs font-medium border border-solid rounded">
                    ارسال شده
                </span>
            </div>
            <div class="d-share__cell d-share__action inline-flex items-center justify-center">
                <button class="d-share__tButton block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                        data-item="{user_id: ${response.user_id}, file_id: ${response.file_id}}"
                >
                    حذف ویدیو
                </button>
            </div>
        </div>
    `)
};

(async () => {
    try {
        let response = await HTTPService.postRequest(Endpoint.get(Endpoint.GET_ARVANVOD_ITEM), {
            user_id: 2,
        });
        response = new ShareVideoPresenter( response );
        console.log('response', response);
        createManageTable( response );
    } catch ( exeption ) {
        NOTIFICATION_EL.Notification({
            type: 'error',
            text: ExceptionService._GetErrorMessage( exeption ),
        });
    } finally {

    }
})();

try {
    let fileName = null,
        isPending = false;

    const STEPS = {
        showStep2() {
            try {
                FIRST_STEP.classList.add(HEIGHT_0_CLASSNAME);
                SECOND_STEP.style.height = `${SECOND_STEP.firstElementChild.offsetHeight}px`;
                SECOND_STEP.classList.remove(HEIGHT_0_CLASSNAME);
            } catch (e) {
            }
        }
    };

    const DROP_BOX_HOVER = {
        show() {
            DROP_BOX.classList.add(DROP_BOX_ACTIVE_CLASSNAME);
        },
        hidden() {
            DROP_BOX.classList.remove(DROP_BOX_ACTIVE_CLASSNAME);
        }
    };

    const request = ({input, method, body = null}) => {
        try {
            return new Promise((resolve, reject) => {
                const HEADERS = new Headers();
                HEADERS.append('Authorization', ARVAN_VOD);
                HEADERS.append('Accept-Language', "en");

                const INIT_OPTION = {};
                INIT_OPTION.headers = HEADERS;
                INIT_OPTION.method = method;
                if ( !!body ) INIT_OPTION.body = body;

                fetch(input, INIT_OPTION)
                    .then(response => {
                        const RESPONSE = response.json();
                        ( response.ok ) ? (
                            resolve( RESPONSE )
                        ) : (
                            reject( RESPONSE )
                        )
                    })
                    .catch(except => reject(except))
            })
        } catch ( exception ) {}
    };

    const getSizeOfVideo = size => (size / 1000000).toFixed(2);

    const uploadVideoInAbrVod = async file => {
        try {
            return await new Promise((resolve, reject) => {
                PROGRESSBAR_EL.style.setProperty('--progress', "0%");
                PROGRESSBAR_EL.classList.add( LOADING_PROGRESS_BAR );
                STATUS_EL.textContent = LOADING_TEXT;

                const OPTIONS = {
                    "acceptLanguage": "en",
                    "authorization": ARVAN_VOD,
                    "url": ENDPOINT['ARVAN_UPLOAD_FILE'],
                    "uuid": file.name + file.size + file.lastModified,
                };

                let upload = new tus.Upload(file, {
                    fingerprint: () => {
                        return Promise.resolve(OPTIONS['uuid'])
                    },
                    chunkSize: 1048576, // 1MB
                    endpoint: OPTIONS['url'],
                    retryDelays: [0, 500, 1000, 1500, 2000, 2500],
                    headers: {
                        'Authorization': OPTIONS['authorization'],
                        'Accept-Language': OPTIONS['acceptLanguage']
                    },
                    metadata: {
                        filename: file.name,
                        filetype: file.type,
                    },
                    onBeforeRequest: () => {
                        STEPS.showStep2();
                    },
                    onError: function ( error) {
                        reject(error);
                    },
                    onProgress: function (bytesUploaded, bytesTotal) {
                        try {
                            PROGRESSBAR_EL.classList.remove( LOADING_PROGRESS_BAR );
                            const PERCENTAGE = (bytesUploaded / bytesTotal * 100).toFixed(2);
                            PROGRESSBAR_EL.style.setProperty('--progress', PERCENTAGE + "%");
                        } catch (e) {}
                    },
                    onSuccess: function ( response ) {
                        console.log("response", response);
                        STATUS_EL.textContent = SUCCESS_TEXT;
                        console.log("Download %s from %s", upload.file.name, upload.url);
                        resolve({
                            url: upload.url,
                            name: upload.file.name
                        })
                    },
                });
                upload.start();
            }).catch(except => {
                throw except
            })
        } catch ( exception ) {
            console.log('exception', exception);
        }
    };

    const changeStatusVideo = async video => {
        try {
            const formData = new FormData();
            formData.append('file_id', video['id']);
            formData.append('description', '');
            formData.append('thumbnail_time', 3);
            formData.append('video_url', video['url']);
            formData.append('convert_mode', "auto");
            formData.append('title', 'فیلم اهدا - یوزر آی‌دی: 2');

            await request({
                body: formData,
                method: 'POST',
                input: ENDPOINT['ARVAN_UPLOAD_VIDEOS'],
            });
        } catch ( exception ) {}
    };

    /**
     * @param requestPayload { Object }
     */
    const assignVideoToUser = async ( requestPayload ) => {
        try {
            const REQUEST_PAYLOAD = requestPayload;
            // if ( !REQUEST_PAYLOAD['description'] ) delete REQUEST_PAYLOAD['description'];
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.CREATE_ARVANVOD_ITEM), REQUEST_PAYLOAD);
            NOTIFICATION_EL.Notification({
                type: 'success',
                text: response.message,
            });
        } catch ( exception ) {
            NOTIFICATION_EL.Notification({
                type: 'error',
                text: ExceptionService._GetErrorMessage( exception ),
            });
        }
    };

    const onSelectVideo = async file => {
        try {
            isPending = true;
            fileName = file.name;
            const FILE_TYPE = file.type;
            const FILE_SIZE = getSizeOfVideo(file.size);

            if ( !FILE_TYPE.includes('video') ) throw new Error( INVALID_FORMAT_ERROR_MESSAGE );

            const video = new Video( file );
            IMAGE_PREVIEW.src = await video.getThumbnails();
            FILE_SIZE_EL.textContent = `حجم فایل: ${FILE_SIZE}Mb`;

            let response = await uploadVideoInAbrVod( file );
            console.log('response', response);
            isPending = false;
        } catch ( exception ) {
            NOTIFICATION_EL.Notification({
                type: 'error',
                text: ExceptionService._GetErrorMessage( exception ),
            });
        }
    };

    SUBMIT_BUTTON.addEventListener(
        'click',
        async event => {
            try {
                event.preventDefault();
                if ( isPending ) {
                    throw new Error('تا بارگذاری کامل ویدیو منتظر بمانید.')
                }

                SUBMIT_BUTTON.classList.add( SPINNER_LOADING_CLASSNAME );

                let PENDING_FILES = await request({
                    method: 'GET',
                    input: ENDPOINT['ARVAN_UPLOAD_FILE'],
                }).then(response => response.data);

                let user_video = PENDING_FILES.find(item => item.filename === fileName);
                user_video = user_video || PENDING_FILES[0];

                await Promise.all([
                    await changeStatusVideo( user_video ),
                    await assignVideoToUser({
                        user_id: 2,
                        link: user_video['url'],
                        file_id: user_video['id'],
                        description: TEXTAREA.value
                    })
                ]);
            } catch ( exception ) {
                NOTIFICATION_EL.Notification({
                    type: 'error',
                    text: ExceptionService._GetErrorMessage( exception ),
                });
            } finally {
                SUBMIT_BUTTON.classList.remove( SPINNER_LOADING_CLASSNAME );
            }
        }
    );

    DROP_BOX.addEventListener('dragleave', () => DROP_BOX_HOVER.hidden());
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
            const {files} = event.dataTransfer;
            DROP_BOX_HOVER.hidden();
            await onSelectVideo(files[0])
        }
    );
    DROP_BOX_INPUT.addEventListener(
        'change',
        async ({target: {files}}) => {
            await onSelectVideo(files[0])
        }
    );

} catch (e) {
}

try {
    const DISPLAY_NONE_CLASS = 'none';
    const OPENED_CLASSNAME = 'd-share__confirm--opened';
    const CLOSED_CLASSNAME = 'd-share__confirm--closed';
    const REMOVE_BUTTON_CLASSNAME = 'd-share__tButton';
    const TBODY_ELEMENT = document.querySelector('.d-share__tbody');
    const MODAL = document.querySelector('.d-share__confirm');
    const MODAL_BODY = document.querySelector('.d-share__confirmWrapper');
    const DISCARD_BUTTON = document.querySelector('.d-share__confirmButton--discard');

    const onClickOutSideOfModal = ({target}) => {
        if (!MODAL_BODY.contains(target)) toggleConfirmModal.hidden();
    };

    const toggleConfirmModal = {
        visible() {
            hideScrollbar();
            MODAL.classList.remove(DISPLAY_NONE_CLASS);
            MODAL.classList.remove(CLOSED_CLASSNAME);
            MODAL.classList.add(OPENED_CLASSNAME);
            MODAL.addEventListener('click', onClickOutSideOfModal);
        },
        hidden() {
            showScrollbar();
            MODAL.classList.add(CLOSED_CLASSNAME);
            MODAL.removeEventListener('click', onClickOutSideOfModal);
            setTimeout(() => {
                MODAL.classList.remove(OPENED_CLASSNAME);
                MODAL.classList.add(DISPLAY_NONE_CLASS);
            }, 320)
        }
    };

    DISCARD_BUTTON.addEventListener('click', () => toggleConfirmModal.hidden());

    TBODY_ELEMENT.addEventListener(
        'click',
        event => {
            event.preventDefault();
            const TARGET = event.target || event.srcElement;
            TARGET.classList.contains(REMOVE_BUTTON_CLASSNAME) && toggleConfirmModal.visible();
        }
    )
} catch (e) {
}