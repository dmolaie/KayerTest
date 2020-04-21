<template>
    <aside class="aside w-1/4 xl:w-1/5 flex-shrink-0 h-full overflow-y-hidden">
        <div class="aside__header w-full flex items-center justify-between">
            <a href="/"
            >
                <image-cm
                    class="aside__header_logo"
                    :src="$asset( 'ic_ehda-center.png' )"
                    alt="انجمن اهدای عضو ایرانیان"
                    objectFit="contain"
                />
            </a>
            <button class="aside__header_button relative flex-shrink-0">
            <span v-for="( _, index ) in 3"
                  :key="index"
                  :class="'absolute rounded font-0 bg-white aside__header_button--line aside__header_button--line--' + ( index + 1 )"
            >-</span>
            </button>
        </div>
        <div class="aside__menu">
            <div class="w-full">
                <router-link class="aside__menu_item relative w-full flex items-center text-blue-800 cursor-pointer"
                     v-for="(item, index) in items"
                     :key="index"
                     :to="{name: item.route}"
                >
                    <image-cm
                        class="aside__menu_item_icon"
                        :src="$asset( item.icon )"
                        alt="انجمن اهدای عضو ایرانیان"
                        objectFit="contain"
                        className="block"
                    />
                    <span class="aside__menu_item_title font-sm font-medium">
                        {{ item.name_fa }}
                    </span>
                </router-link>
                <router-link class="aside__menu_item relative w-full flex items-center text-blue-800 cursor-pointer"
                             :to="{ name: 'LOGOUT' }"
                >
                    <image-cm
                            class="aside__menu_item_icon"
                            :src="$asset('ic__logout-blue.svg')"
                            alt="انجمن اهدای عضو ایرانیان"
                            objectFit="contain"
                            className="block"
                    />
                    <span class="aside__menu_item_title font-sm font-medium"
                          v-text="'خروج'"
                    > </span>
                </router-link>
            </div>
        </div>
    </aside>
</template>

<script>
    import { mapState } from 'vuex';
    import ImageCm from '@vendor/components/image/Index.vue'

    export default {
        name: "Aside",
        components: { ImageCm },
        computed: {
            ...mapState({
                items: ({ MenusStore }) => MenusStore.items
            })
        },
        methods: {
            onClickMenuItem( location ) {
                if ( !!location )
                    this.pushRouter( { name: location } );
            }
        }
    }
</script>