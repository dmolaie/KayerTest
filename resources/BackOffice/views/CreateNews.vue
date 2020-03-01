<template>
    <div class="c-news c-post w-full">
        <div class="w-full flex items-start">
            <div class="flex-1 l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               placeholder="عنوان را اینجا وارد کنید"
                        />
                    </label>
                    <button class="c-post__second-title block font-sm text-blue-100 text-decoration-underline cursor-pointer l:transition-color l:hover:text-blue--200"
                            @click.prevent="onClickToggleSecondTitleButton"
                            v-text="shouldBeShowSecondTitle ? 'مخفی کردن عنوان دوم' : 'افزودن عنوان دوم' "
                    > </button>
                    <transition name="toggle">
                        <label class="block w-full"
                               v-show="shouldBeShowSecondTitle"
                        >
                            <input type="text"
                                   class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                   placeholder="عنوان دوم را اینجا وارد کنید"
                                   v-model="form.second_title"
                            />
                        </label>
                    </transition>
                    <div class="w-full border-blue-100-1 rounded m-t-15">
                        editor
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            چکیده
                        </p>
                        <label class="w-full block">
                            <textarea class="textarea textarea--white w-full block border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                      v-model="form.abstract"
                            > </textarea>
                        </label>
                    </div>
                    <div class="c-news__tags w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            افزودن تگ
                        </p>
                    </div>
                </div>
                <div class="main inner-box inner-box--blue w-full rounded-2 rounded-tr-none rounded-tl-none">
                    <div class="w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            عکس دوم
                        </p>
                        <div class="flex items-start">
                            <button class="c-news__second-image w-1/4 xl:w-1/5 flex-shrink-0 bg-zircon text-blue border-blue-100-1 rounded font-sm font-medium text-center m-l-20 l:hover:bg-white l:transition-bg user-select-none">
                                انتخاب عکس
                            </button>
                            <div class="flex-1 min-height-42 bg-zircon text-blue border-blue-100-1 rounded">

                            </div>
                        </div>
                    </div>
                    <div class="c-news__source w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            منبع
                        </p>
                        <label class="block w-full">
                            <input type="text"
                                   class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-ltr"
                                   placeholder="منبع عکس را اینجا وارد کنید"
                            />
                        </label>
                    </div>
                </div>
            </div>
            <div class="c-post__panel w-1/3 xl:w-1/4">
                <domains-cm
                />
                <publish-cm :published="false"
                >
                    <template #published="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right">
                            لغو انتشار
                        </button>
                    </template>
                    <template #notPublished="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickReleaseTimeButton(); hiddenDropdown();}"
                        >
                            تنظیم زمان انتشار
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickChiefEditorButton(); hiddenDropdown()}"
                        >
                            ارسال به سردبیر
                        </button>
                        <span class="dropdown__divider"> </span>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickRemoveButton(); hiddenDropdown()}"
                        >
                            انتقال به زباله‌دان
                        </button>
                    </template>
                </publish-cm>
                <location-cm lang="fa"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                />
                <image-panel-cm
                />
            </div>
        </div>
    </div>
</template>

<script>
    import CreateNewsService from '@services/service/CreateNews';

    import ImagePanelCm from '@components/ImagePanel.vue';
    import DomainsCm from '@components/DomainsPanel.vue';
    import PublishCm from '@components/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';

    let Service = null;

    export default {
        name: 'CreateNews',
        data: () => ({
            form: {
                second_title: '',
                abstract: ''
            },
            shouldBeShowSecondTitle: false,
        }),
        components: {
            DomainsCm,
            PublishCm,
            LocationCm,
            ImagePanelCm
        },
        methods: {
            onClickToggleSecondTitleButton() {
                this.$set( this.form, 'second_title', '' );
                this.$set( this, 'shouldBeShowSecondTitle', !this.shouldBeShowSecondTitle );
            },
            onClickPersianLang() {
                alert('onClickPersianLang');
            },
            onClickEnglishLang() {
                alert('onClickEnglishLang');
            },
            onClickReleaseTimeButton() {

                console.log('onClickReleaseTimeButton', this);
            },
            onClickChiefEditorButton() {
                console.log('onClickChiefEditorButton');
            },
            onClickRemoveButton() {
                console.log('onClickRemoveButton');
            },
        },
        mounted() {
            Service = new CreateNewsService( this );
            Service.processViewPort();
        }
    }
</script>