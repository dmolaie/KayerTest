import CopyToClipboard from '../vendor/plugin/CopyToClipboard/index';

try {
    const Clipboard = document.querySelector('.clipboard');
    if ( !!Clipboard ) {
        Clipboard.addEventListener(
            'click',
            () => {
                CopyToClipboard( Clipboard );
            }
        )
    }
} catch (e) {
    //
}