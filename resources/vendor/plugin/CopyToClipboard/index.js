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


// var copyTextareaBtn = document.querySelector('.js-textareacopybtn');
//
// copyTextareaBtn.addEventListener('click', function(event) {
//     var copyTextarea = document.querySelector('.js-copytextarea');
//     copyTextarea.focus();
//     copyTextarea.select();
//
//     try {
//         var successful = document.execCommand('copy');
//         var msg = successful ? 'successful' : 'unsuccessful';
//         console.log('Copying text command was ' + msg);
//     } catch (err) {
//         console.log('Oops, unable to copy');
//     }
// });

export default CopyToClipboard;