import CopyToClipboard from '../vendor/plugin/CopyToClipboard/index';

try {
    const Clipboard = document.querySelector('.clipboard');
    if ( !!Clipboard ) {
        Clipboard.addEventListener(
            'click',
            () => {
                CopyToClipboard( Clipboard );
                let messageEl = Clipboard.querySelector('.clipboard__message');
                if ( !!messageEl ) {
                    messageEl.classList.add('opacity-1');
                    setTimeout(() => {
                        messageEl.classList.remove('opacity-1');
                    }, 1200)
                }
            }
        )
    }
} catch (e) {
    //
}