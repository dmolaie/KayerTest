<template>
    <header class="toolbar w-full flex items-center bg-white">
        <button class="toolbar__user flex items-center text-blue">
            <Image-cm
                :src="$asset( 'img_avatar--white.svg' )"
                alt=""
                class="toolbar__avatar"
                className="block w-full h-full"
            />
            <span class="font-sm font-bold">
                {{ user.username }}
            </span>
        </button>
        <button class="toolbar__btn toolbar__btn--menu cursor-pointer font-0 m-r-auto bg-no-repeat bg-center bg-size-contain"
        >-</button>
        <button class="toolbar__btn toolbar__btn--expand cursor-pointer font-0 bg-no-repeat bg-center bg-size-contain"
                @click.prevent="onClickToggleFullScreen"
        >-</button>
        <button class="toolbar__btn toolbar__btn--menu cursor-pointer font-0 bg-no-repeat bg-center bg-size-contain"
        >-</button>
        <button class="toolbar__btn toolbar__btn--menu cursor-pointer font-0 bg-no-repeat bg-center bg-size-contain"
        >-</button>
    </header>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    import ImageCm from '@vendor/components/image/Index.vue';

    export default {
        name: "TopBar",
        computed: mapState({
            user: state => state.UserStore,
        }),
        components: {
            ImageCm
        },
        methods: {
            async requestFullscreen() {
                try {
                    let documentElement = document.documentElement;
                    const RFS =
                        documentElement.requestFullscreen
                    || documentElement.webkitRequestFullScreen
                    || documentElement.mozRequestFullScreen
                    || documentElement.msRequestFullscreen;
                    await RFS.call( documentElement );
                } catch (e) {}
            },
            async exitFullscreen() {
                try {
                    const EFS =
                           document.exitFullscreen
                        || document.webkitExitFullscreen
                        || document.mozCancelFullScreen
                        || document.msExitFullscreen;
                    await EFS.call( document );
                } catch (e) {}
            },
            async onClickToggleFullScreen() {
                try {
                    let isFullScreen = (
                        document.fullScreenElement
                        || document.mozFullScreen
                        || document.webkitIsFullScreen
                    );
                    ( !isFullScreen ) ? (
                        await this.requestFullscreen()
                    ) : (
                        await this.exitFullscreen()
                    )
                } catch (e) {}
            }
        }
    }
</script>