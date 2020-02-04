const CopyToClipboard = el => {
    try {
        const selection = window.getSelection();
        const range = document.createRange();
        range.selectNodeContents( el );
        selection.removeAllRanges();
        selection.addRange( range );
        document.execCommand('copy');
        selection.removeAllRanges();
    } catch ( exception ) {
        console.log(exception);
        //
    }
};

export default CopyToClipboard;
