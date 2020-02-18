<template>
    <div class="dashboard-p w-full h-full flex overflow-y-hidden">
        <aside class="aside flex-shrink-0 h-full overflow-y-hidden">
            <div class="aside__header w-full flex items-center justify-between">
                <image-cm
                        class="aside__header_logo"
                        :src="$asset( 'ic_ehda-center.png' )"
                        alt="انجمن اهدای عضو ایرانیان"
                        objectFit="contain"
                />
                <button class="aside__header_button relative flex-shrink-0">
                    <span v-for="( item, index ) in 3"
                          :key="index"
                          :class="'absolute rounded bg-white aside__header_button--line aside__header_button--line--' + ( index + 1 )"
                    ></span>
                </button>
            </div>
            <div class="aside__menu">
                <div class="aside__menu_item relative flex items-center text-blue-800 cursor-pointer"
                     v-for="(item, index) in menu"
                     :key="index"
                >
                    <image-cm
                        class="aside__menu_item_icon"
                        :src="$asset( item.icon )"
                        alt="انجمن اهدای عضو ایرانیان"
                        objectFit="contain"
                        className="block"
                    />
                    <span class="aside__menu_item_title font-sm font-medium">
                        {{ item.title }}
                    </span>
                </div>
            </div>
        </aside>
        <div class="flex-1">
            <nav class="dashboard-p__nav bg-white w-full flex items-center">
                <router-link
                    :to="{ name: 'LOGOUT' }"
                    class="dashboard-p__nav_user flex items-center text-blue">
                    <image-cm
                        :src="$asset( 'img_avatar--white.svg' )"
                        alt=""
                        class="dashboard-p__nav_user_image"
                        className="block w-full h-full"
                    />
                    <span class="font-sm-bold">
                        {{ user.username }}
                    </span>
                </router-link>
            </nav>
            <div class="dashboard-p__content w-full text-center font-24 font-bold">
                به پنل مدیریتی انجمن اهدا خوش آمدید
            </div>
        </div>
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex'
    import ImageCm from '@vendor/components/image/Index.vue';

    export default {
        name: 'Dashboard',
        data: () => ({
            menu: [
                {
                    title: 'رویدادها',
                    icon: 'ic_event--blue.svg'
                },
                {
                    title: 'اخبار',
                    icon: 'ic_newspaper--blue.svg'
                }
            ]
        }),
        computed: mapState({
            user: state => state.UserStore,
        }),
        components: {
            ImageCm
        },
    }
</script>