try {

    let fields = document.querySelectorAll('.p-login .c-form__input');

    fields.forEach(item => {
        console.log(item);
        item.addEventListener(
            'blur',
            ( { target } ) => {
                ( !!target.value ) ? (
                    target.parentElement.classList.add('c-form__wrapper--active')
                ) : (
                    target.parentElement.classList.remove('c-form__wrapper--active')
                )
            }
        );
    });

} catch ( e ) {
    //
}