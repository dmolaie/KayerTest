try {
    const OnBlurInputEvent = ( { target } ) => {
        if ( !target.value ) target.parentElement.classList.remove('sign-in__form_input-wrapper--focus');
        target.removeEventListener(
            'blur',
            OnBlurInputEvent
        );
    };

    document.querySelectorAll('.sign-in__form_input')
        .forEach( item => {
            item.addEventListener(
                'focus',
                ( { target } ) => {
                    target.parentElement.classList.add('sign-in__form_input-wrapper--focus');
                    target.addEventListener('blur', OnBlurInputEvent);
                }
            )
        });

} catch ( e ) {
    //
}