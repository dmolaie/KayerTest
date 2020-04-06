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
            <router-link class="aside__menu_item relative w-full flex items-center text-blue-800 cursor-pointer"
                 v-for="(item, index) in menu"
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
                    {{ item.title }}
                </span>
            </router-link>
        </div>
    </aside>
</template>

<script>
    import ImageCm from '@vendor/components/image/Index.vue'

    export default {
        name: "Aside",
        data: () => ({
            menu: [
                {
                    route: 'DASHBOARD',
                    title: 'پیشخوان',
                    icon: 'ic__dashboard--blue.svg',
                },
                {
                    route: 'MANAGE_MENU',
                    title: 'مدیریت منوها',
                    icon: 'ic__menu--blue.svg'
                },
                {
                    route: 'MANAGE_ARTICLE',
                    title: 'صفحات ایستا',
                    icon: 'ic_newspaper--blue.svg'
                },
                {
                    route: 'MANAGE_NEWS',
                    title: 'اخبار',
                    icon: 'ic_newspaper--blue.svg'
                },
                {
                    route: 'MANAGE_LEGATE',
                    title: 'کاربران',
                    icon: 'ic_newspaper--blue.svg'
                },
                {
                    route: 'LOGOUT',
                    title: 'خروج',
                    icon: 'ic__logout-blue.svg'
                }
            ]
        }),
        components: {
            ImageCm
        },
        methods: {
            onClickMenuItem( location ) {
                if ( !!location )
                    this.pushRouter( { name: location } );
            }
        }
    }
</script>