<template>
    <div class="m-slider m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab m-post__tab--active relative font-sm font-bold transition-bg text-nowrap p-0">
                        منتشرشده‌ها
                    </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex">
                    <div class="m-post__button--added relative">
                        <router-link class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                                     :to="{ name: 'CREATE_SLIDER' }"
                        >
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            ایجاد اسلاید
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ManageSliderService from '@services/service/ManageSlider';

    let Service = null;

    export default {
        name: "ManageSlider",
        data: () => ({
            isModuleRegistered: false,
        }),
        computed: {
            isPublishedTab() {
                return ''
            }
        },
        methods: {
        },
        created() {
            Service = new ManageSliderService( this );
        }
    }
</script>