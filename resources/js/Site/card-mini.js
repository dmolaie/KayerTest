import donationCard from '@vendor/plugin/donationCard';

try {
    window.addEventListener(
        'load',
        async () => {
            const LOADING_CLASS = 'image_loading';
            const IMAGE_ELEMENT = document.querySelector('.mini_cart');
            const CARD_LABEL = document.getElementById('label').textContent.trim();
            let response = await donationCard(CARD_LABEL, 'mini');
            IMAGE_ELEMENT.src = response.base64;
            IMAGE_ELEMENT.parentElement.classList.remove( LOADING_CLASS )
        }
    )
} catch (e) {}