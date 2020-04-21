const URL_PARAMS_REGEX = /{([a-zA-Z0-9]+)\}/g;

const SOCIAL_MEDIA = {
    email: {
        shareUrl: "mailto:{to}?subject={content}&body={url}",
    },

    facebook: {
        shareUrl: "https://facebook.com/sharer/sharer.php?u={url}&t={content}",
    },

    telegram: {
        // shareUrl: "tg://msg?text={url} {content}",
        // shareUrl: "tg://msg_url?url={url}&text={content}",
        shareUrl: "tg://share?url={url}&text={content}",
    },

    twitter: {
        shareUrl: "https://twitter.com/share?url={url}&text={content}&via={via}&hashtags={hashtags}",
    },

    pinterest: {
        shareUrl: "https://pinterest.com/pin/create/bookmarklet/?media={media}&url={url}&description={content}",
    },
};

const DEFAULT_OPTIONS = {
    url: '',
    content: '',
    hashtags: '',
    share: [...Object.values( SOCIAL_MEDIA )]
};

try {
    let descriptionTag = document.querySelector('meta[name=description]');
    Object.assign( DEFAULT_OPTIONS, {
        url: window.location.href,
        content: descriptionTag?.getAttribute('content').textContent || '',
        share: []
    })
} catch (e) {}



function Share ( options ) {
    const ELEMENT = this,
        OPTIONS = {
            ...DEFAULT_OPTIONS,
            ...options
        };

    const VDOM = [];

    const RefactorURLSharing = url =>(
        url.replace(URL_PARAMS_REGEX,
            (_, key) => OPTIONS[key] ? encodeURIComponent( OPTIONS[key] ) : ""
        )
    );

    OPTIONS['share']
        .forEach(item => {
            let field = SOCIAL_MEDIA[item['name']];
            if ( !!field )
                VDOM.push(`
                    <a href="${RefactorURLSharing( field.shareUrl )}"
                       target="_blank"
                       class="${item.class || ""}"></a>
                `);
        });

    ELEMENT.insertAdjacentHTML('beforeend', VDOM.join('') )
}

( !!HTMLElement ) ? (
    HTMLElement.prototype.Share = Share
) : (
    Object.prototype.Share = Share
);