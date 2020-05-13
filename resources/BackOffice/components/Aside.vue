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
                <template v-for="(item, index) in items"

                >
                    <template v-if="!hasLength( item.children )">
                        <router-link class="aside__menu_item relative w-full flex items-center text-blue-800 cursor-pointer"
                                     :key="index" :to="item.route"
                        >
                            <image-cm class="aside__menu_item_icon"
                                      :src="$asset( item.icon )"
                                      alt="انجمن اهدای عضو ایرانیان"
                                      objectFit="contain" className="block"
                            />
                            <span class="aside__menu_item_title font-sm font-medium">
                                {{ item.name_fa }}
                            </span>
                        </router-link>
                    </template>
                    <template v-else>
                        <button class="aside__menu_item relative w-full flex items-center text-blue-800 cursor-pointer"
                                :key="index" @click.prevent="onClickParentItem( item )"
                                :class="[ !!item.is_opened ? 'aside__menu_item--open' : 'aside__menu_item--close' ]"
                        >
                            <image-cm class="aside__menu_item_icon"
                                      :src="$asset( item.icon )"
                                      alt="انجمن اهدای عضو ایرانیان"
                                      objectFit="contain" className="block"
                            />
                            <span class="aside__menu_item_title font-sm font-medium">
                                {{ item.name_fa }}
                            </span>
                        </button>
                        <transition
                                enter-active-class="enter-active"
                                leave-active-class="leave-active"
                                @before-enter="beforeEnter"
                                @enter="enter"
                                @after-enter="afterEnter"
                                @before-leave="beforeLeave"
                                @leave="leave"
                                @after-leave="afterLeave"
                        >
                            <div class="w-full aside__menu_item--nested"
                                 v-if="!!item.is_opened"
                            >
                                <template v-for="(nested, i) in item.children">
                                    <router-link class="aside__menu_item relative w-full flex items-center text-blue-800 cursor-pointer"
                                                 :key="'nested-'+i" :to="nested.route"
                                    >
                                        <image-cm class="aside__menu_item_icon"
                                                  :src="$asset( nested.icon )"
                                                  alt="انجمن اهدای عضو ایرانیان"
                                                  objectFit="contain" className="block"
                                        />
                                        <span class="aside__menu_item_title font-sm font-medium">
                                        {{ nested.name_fa }}
                                    </span>
                                    </router-link>
                                </template>
                            </div>
                        </transition>
                    </template>
                </template>
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
    import { HasLength, RequestAnimation } from "@vendor/plugin/helper";
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
            hasLength( payload ) {
                return HasLength( payload )
            },
            onClickMenuItem( location ) {
                if ( !!location )
                    this.pushRouter( { name: location } );
            },
            onClickParentItem( item ) {
                try {
                    this.$set(item, 'is_opened', !item['is_opened']);
                } catch (e) {}
            },
            /**
             * @param element {HTMLElement}
             */
            beforeEnter( element ) {
                try {
                    requestAnimationFrame(() => {
                        if (!element.style.height) {
                            element.style.height = '0px';
                        }
                        element.style.display = null;
                    });
                } catch (e) {}
            },
            /**
             * @param element {HTMLElement}
             */
            enter( element ) {
                try {
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            element.style.height = `${element.scrollHeight}px`;
                        });
                    });
                } catch (e) {}
            },
            /**
             * @param element {HTMLElement}
             */
            afterEnter( element ) {
                try {
                    element.style.height = null;
                } catch (e) {}
            },
            /**
             * @param element {HTMLElement}
             */
            beforeLeave( element ) {
                try {
                    requestAnimationFrame(() => {
                        if (!element.style.height) {
                            element.style.height = `${element.offsetHeight}px`;
                        }
                    });
                } catch (e) {}
            },
            /**
             * @param element {HTMLElement}
             */
            leave( element ) {
                try {
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            element.style.height = '0px';
                        });
                    });
                } catch (e) {}
            },
            /**
             * @param element {HTMLElement}
             */
            afterLeave( element ) {
                try {
                    element.style.height = null
                } catch (e) {}
            },
        }
    }
</script>