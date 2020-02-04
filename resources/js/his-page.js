import CopyToClipboard from '../vendor/plugin/CopyToClipboard/index';
import ImageLazyLoading from "../vendor/plugin/imageLazyLoading";

try {
    const Clipboard = document.querySelector('.history-page .clipboard');
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