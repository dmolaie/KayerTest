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
        }
    }
</script>