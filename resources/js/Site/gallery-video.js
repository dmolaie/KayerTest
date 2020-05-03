import { SmoothScroll } from '@vendor/plugin/helper';

try {
    const PLAYER_WRAPPER_ID = 'video_player';
    const EPISODE_CLASSNAME = 'episode';
    const ACTIVE_CLASSNAME  = 'episode--active';
    const EPISODES_WRAPPER  = document.querySelector('.gao-page .episodes');

    const CREATE_EMBED_LINK = hash_id =>
          `https://www.aparat.com/embed/${hash_id}?data[rnddiv]=${PLAYER_WRAPPER_ID}&data[responsive]=yes`;

    const changeVideoURL = async hash_id => {
        try {
            await new Promise(resolve => {
                const APARAT_SCRIPT  = document.getElementById('aparat_script'),
                      PLAYER_WRAPPER = document.getElementById( PLAYER_WRAPPER_ID );
                if ( !!APARAT_SCRIPT && !!PLAYER_WRAPPER ) {
                    const SCRIPT = document.createElement("script");
                    SCRIPT.type = 'text/javascript';
                    SCRIPT.id = 'aparat_script';
                    SCRIPT.src = CREATE_EMBED_LINK(hash_id);
                    document.body.append( SCRIPT );
                    APARAT_SCRIPT.parentElement.removeChild( APARAT_SCRIPT );
                    SmoothScroll( PLAYER_WRAPPER.offsetTop )
                }
                resolve();
            })
        } catch ( exception ) {
            console.warn(exception);
        }
    };

    const onClickEpisodesItem = async episode => {
        const HASH_ID = episode.getAttribute('data-id');
        const CURRENT_ACTIVE = EPISODES_WRAPPER.querySelector(`.${ACTIVE_CLASSNAME}`);
        await changeVideoURL( HASH_ID );
        !!CURRENT_ACTIVE && CURRENT_ACTIVE.classList.remove( ACTIVE_CLASSNAME );
        episode.classList.add( ACTIVE_CLASSNAME );
    };

    EPISODES_WRAPPER.addEventListener(
        'click',
        async ({ target }) => {
            target.classList.contains( EPISODE_CLASSNAME ) && await onClickEpisodesItem( target );
        }
    );
} catch ( exception ) {}