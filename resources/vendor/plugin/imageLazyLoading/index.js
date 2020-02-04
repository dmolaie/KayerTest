const ImageLazyLoading = elements => {
    const RemoveLazyLoading = (el, src) => {
        try {
            let imageElement = el.querySelector('img');
            el.classList.remove('has-skeleton');
            imageElement.src = imageElement.getAttribute('data-src');
            imageElement.removeAttribute('data-src');
        } catch (e) {
            //
        }
    };

    const CallBack = el => {
        try {
            let image = new Image();
            image.addEventListener(
                'load', () => {
                    setTimeout(() => {
                        RemoveLazyLoading( el );
                    }, 500)
                }
            );
            image.src = el.querySelector('img').getAttribute('data-src');
        } catch (e) {
            //
        }
    };

    const FallBack = () => {
        elements.forEach( el => RemoveLazyLoading( el ) )
    };

    if ( "IntersectionObserver" in window ) {

        const Observer = new IntersectionObserver( entries => {
            entries.forEach( entry => {
                if ( entry.isIntersecting ) {
                    CallBack( entry.target );
                    Observer.unobserve( entry.target );
                }
            })
        }, {
            root: null,
            threshold: .25,
            rootMargin: "0px 0px -150px"
        });

        elements.forEach( el => Observer.observe( el ) );

    } else FallBack();

};

export default ImageLazyLoading;