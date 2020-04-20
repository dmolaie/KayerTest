import donationCard from '@vendor/plugin/donationCard';

try {
    (async () => {
        const LOADING_CLASS = 'image_loading';
        const IMAGE_ELEMENT = document.querySelector('.single_cart');
        const CARD_LABEL = document.getElementById('label').textContent.trim();
        console.log(LOADING_CLASS);
        let response = await Promise.all([
            donationCard(CARD_LABEL),
        ]);
        IMAGE_ELEMENT.src = response[0].base64;
        IMAGE_ELEMENT.parentElement.classList.remove( LOADING_CLASS )
    })();
} catch (e) {}