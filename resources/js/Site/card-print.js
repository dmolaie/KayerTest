import {
    printCard
} from '@vendor/plugin/donationCard';

try {
    window.addEventListener(
        'load',
        () => {
            new Promise(async resolve => {
                const LOADING_CLASS = 'image_loading';
                const IMAGE_ELEMENT = document.querySelector('.print_cart');
                const CARD_LABELS = document.getElementById('label')?.textContent?.split('$');
                let response = await printCard({
                    name: CARD_LABELS[0],
                    mobile: CARD_LABELS[1],
                    email: CARD_LABELS[2]
                });
                IMAGE_ELEMENT.src = response.base64;
                IMAGE_ELEMENT.parentElement.classList.remove( LOADING_CLASS );
                resolve()
            }).then(() => {
                window.print();
                window.close()
            });
        }
    );
} catch (e) {}