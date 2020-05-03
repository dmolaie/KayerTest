import Swiper from 'swiper';
import Plyr from 'plyr';
import { SmoothScroll } from '@vendor/plugin/helper';

try {
    const controls = `
        <div class="plyr__controls">
            <div class="plyr__time plyr__time--current text-white font-bold cursor-default" aria-label="Current time">00:00</div>
            <div class="plyr__time plyr__time--duration text-white font-bold cursor-default" aria-label="Duration">00:00</div>
            <div class="plyr__controls__item plyr__progress__container">
                <div class="plyr__progress">
                    <input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" aria-label="Seek">
                    <progress class="plyr__progress__buffer" min="0" max="100" value="0">% buffered</progress>
                    <span role="tooltip" class="plyr__tooltip">00:00</span>
                </div>
            </div>
            <button type="button" class="plyr__control audio__play" aria-label="Play, {title}" data-plyr="play">
                <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-pause"></use></svg>
                <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-play"></use></svg>
                <span class="label--pressed plyr__tooltip" role="tooltip">توقف</span>
                <span class="label--not-pressed plyr__tooltip" role="tooltip">پخش</span>
            </button>
            <button type="button" class="plyr__control" aria-label="Mute" data-plyr="mute">
                <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-muted"></use></svg>
                <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-volume"></use></svg>
                <span class="label--pressed plyr__tooltip" role="tooltip">بی‌صدا</span>
                <span class="label--not-pressed plyr__tooltip" role="tooltip">صدا</span>
            </button>
            <div class="plyr__volume">
                <input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" aria-label="Volume">
            </div>
        </div>
    `;

    const EPISODE_CLASSNAME = 'episode';
    const ACTIVE_CLASSNAME  = 'episode--active';
    const EPISODES_WRAPPER  = document.querySelector('.gao-page .episodes');
    const AUDIO_ELEMENT = document.getElementById('music_player');
    const PLAYER_WRAPPER = document.querySelector('.gao-page__inner-box');

    const onClickEpisodesItem = ( episode ) => {
        const AUDIO_URL = episode.getAttribute('data-url');
        const CURRENT_ACTIVE = EPISODES_WRAPPER.querySelector(`.${ACTIVE_CLASSNAME}`);
        AUDIO_ELEMENT.src = AUDIO_URL;
        !!CURRENT_ACTIVE && CURRENT_ACTIVE.classList.remove( ACTIVE_CLASSNAME );
        episode.classList.add( ACTIVE_CLASSNAME );
        SmoothScroll( PLAYER_WRAPPER.offsetTop );
    };

    const mountMusicPlayer = () => {
        const PLAYER = new Plyr('#music_player', { controls });
        if ( !!EPISODES_WRAPPER ) {
            EPISODES_WRAPPER.addEventListener(
                'click',
                ({ target }) => {
                    if ( target.classList.contains( EPISODE_CLASSNAME ) ) {
                        onClickEpisodesItem( target );
                        PLAYER.play();
                    }
                }
            );
        }
    };

    document.addEventListener(
        'DOMContentLoaded', () => {
            mountMusicPlayer();
        }
    );
} catch ( exception ) {}

try {
    const SpaceBetweenItem = 32;

    const mountRelativeGalleryCarousel = () => {
        try {
            let galleryCarousel = new Swiper('.relative-gallery .carousel__container', {
                slidesPerView: 'auto',
                spaceBetween: 16,
                watchOverflow: true,
                resistanceRatio: 0,
                pagination: {
                    clickable: false,
                    el: '.relative-gallery .carousel__pagination'
                },
                breakpoints: {
                    0: {
                        freeMode: true,
                        freeModeMomentumBounce: false,
                        freeModeMinimumVelocity: 0.06,
                        longSwipesMs: 1000,
                        slidesPerView: 'auto',
                        spaceBetween: 14,
                    },
                    520: {
                        slidesPerView: 2,
                        spaceBetween: SpaceBetweenItem,
                    },
                    900: {
                        slidesPerView: 3,
                        spaceBetween: SpaceBetweenItem,
                    },
                    1300: {
                        slidesPerView: 4,
                        spaceBetween: SpaceBetweenItem,
                    },
                    2000: {
                        slidesPerView: 5,
                        spaceBetween: SpaceBetweenItem,
                    }
                }
            });
        } catch ( exception ) { }
    };

    window.addEventListener(
        'load', () => {
            mountRelativeGalleryCarousel()
        }
    )
} catch ( exception ) {}