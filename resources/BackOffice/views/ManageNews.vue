<template>
    <div class="l-post l-news">
        <div class="relative">
            <button class="bg-blue"
                    @click.prevent="onClickCreatedNewButton"
            >
                افزودن به اخبار
            </button>
            <dropdown-cm :visibility="shouldBeShowCreatedNewsDropdown"
            >
                <router-link :to="{ name: 'CREATE_NEWS', params: { lang: 'fa' } }"
                             class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                >
                    زبان فارسی
                </router-link>
                <router-link :to="{ name: 'CREATE_NEWS', params: { lang: 'en' } }"
                             class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                >
                    زبان انگلیسی
                </router-link>
            </dropdown-cm>
        </div>
    </div>
</template>

<script>
    import ManageNewsService from '@services/service/ManageNews';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';

    let Service = null;

    export default {
        name: "ManageNews",
        data: () => ({
            shouldBeShowCreatedNewsDropdown: false
        }),
        components: {
            DropdownCm
        },
        methods: {
            onClickCreatedNewButton() {
                this.$set(this, 'shouldBeShowCreatedNewsDropdown', !this.shouldBeShowCreatedNewsDropdown)
            },
        },
        async created() {
            Service = new ManageNewsService( this );
            await Service.processFetchAsyncData();
        }
    }
</script>