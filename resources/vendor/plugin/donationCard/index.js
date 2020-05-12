const DONATION_CARD = {
    ['single']: {
        type: 'single',
        width: 800,
        height: 518,
        textY: 375,
        color: '#424242',
        font: '36px Zar',
        url: '/images/cards/single.jpg',
    },
    ['mini']: {
        type: 'mini',
        width: 800,
        height: 1036,
        textY: 905,
        color: '#424242',
        font: '36px Zar',
        url: '/images/cards/mini.jpg',
    },
    ['social']: {
        type: 'social',
        width: 1200,
        height: 1200,
        textY: 1086,
        textY2: 1134,
        color: '#01aef0',
        font: '48px Zar',
        url: '/images/cards/social.jpg',
    },
    ['print']: {
        type: 'social',
        width: 2480,
        height: 3425,
        color: '#424242',
        url: '/images/cards/print.jpg',
    }
};

const donationCard = async (text = '', type = 'single') => {
    return await new Promise(resolve => {
        const IMAGE = new Image();
        const CARD = DONATION_CARD[type];
        IMAGE.addEventListener(
            'load', async () => {
                const CANVAS = document.createElement('canvas');
                CANVAS.width  = CARD.width;
                CANVAS.height = CARD.height;
                const CTX = CANVAS.getContext('2d');
                CTX.drawImage(IMAGE, 0, 0);
                CTX.fillStyle = CARD.color;
                CTX.font = CARD.font;
                CTX.textBaseline = 'middle';
                CTX.textAlign = "center";
                if (CARD.type === 'social') {
                    let [full_name, card_id] = text.split(' - ');
                    CTX.fillText(full_name, (CANVAS.width / 2), CARD.textY);
                    CTX.fillText(card_id, (CANVAS.width / 2), CARD.textY2);
                } else {
                    CTX.fillText(text, (CANVAS.width / 2), CARD.textY);
                }
                const DOWNLOAD_LINK = await new Promise(resolve => {
                    CANVAS.toBlob(blob => {
                        let response = URL.createObjectURL(blob);
                        resolve(response);
                    });
                });
                resolve({
                    base64: CANVAS.toDataURL('image/png'),
                    download: DOWNLOAD_LINK
                });
            }
        );
        IMAGE.src = CARD.url;
    }).catch(exception => console.warn('exception: ', exception))
};

export default donationCard;

export const printCard = async ({ name, mobile, email }) => {
    return await new Promise(resolve => {
        const IMAGE = new Image();
        const CARD = DONATION_CARD['print'];

        IMAGE.addEventListener(
            'load',
            async () => {
                const CANVAS = document.createElement('canvas');
                CANVAS.width  = CARD['width'];
                CANVAS.height = CARD['height'];

                const RECT_X = 1213;
                const RECT_WIDTH = 958;

                const CTX = CANVAS.getContext('2d');
                CTX.drawImage(IMAGE, 0, 0);

                CTX.fillStyle = "#424242";
                CTX.font = "43px Zar";
                CTX.textAlign = "center";
                CTX.fillText(name, (RECT_X + (RECT_WIDTH / 2)), 825);

                CTX.textAlign = 'right';
                CTX.font = "56px Zar";
                CTX.fillText(mobile, (CARD['width'] - 660), (CARD['height'] - 1310));
                CTX.font = "44px arial";
                CTX.fillText(email, (CARD['width'] - 650), (CARD['height'] - 1235));

                const DOWNLOAD_LINK = await new Promise(resolve => {
                    CANVAS.toBlob(blob => {
                        let response = URL.createObjectURL(blob);
                        resolve(response);
                    });
                });

                resolve({
                    base64: CANVAS.toDataURL('image/png'),
                    download: DOWNLOAD_LINK
                });
            }
        );

        IMAGE.src = CARD['url'];
    }).catch(exception => console.warn('exception: ', exception))
};