<template>
    <div class="c-news c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               placeholder="عنوان را اینجا وارد کنید"
                               v-model="form.first_title"
                        />
                    </label>
                    <button class="c-post__second-title block font-sm text-blue-100 text-decoration-underline cursor-pointer l:transition-color l:hover:text-blue--200"
                            @click.prevent="onClickToggleSecondTitleButton"
                            v-text="shouldBeShowSecondTitle ? 'مخفی کردن عنوان دوم' : 'افزودن عنوان دوم' "
                    > </button>
                    <transition>
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
                        <text-editor-cm @onUpdate="onUpdateTextEditor"
                                        ref="textEditor"
                        />
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
                        <div class="c-post__tags">
                            <tags-cm :list="tags"
                                     placeholder="افزودن تگ"
                                     itemClassName="text-right"
                                     inputClassName="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                            />
                        </div>
                    </div>
                </div>
                <div class="main inner-box inner-box--blue w-full rounded-2 rounded-tr-none rounded-tl-none">
                    <div class="w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            عکس دوم
                        </p>
                        <div class="flex items-start">
                            <upload-cm @onChange="onChangeSecondImageField"
                                       ref="secondImageFiled"
                            />
                            <button class="c-news__second-image w-1/4 xl:w-1/5 flex-shrink-0 bg-zircon text-blue border-blue-100-1 rounded font-sm font-medium text-center m-l-20 l:hover:bg-white l:transition-bg user-select-none"
                                    @click.prevent="onClickSecondImageButton"
                            >
                                انتخاب عکس
                            </button>
                            <div class="c-post__fake_input flex-1 min-height-42 bg-zircon text-blue border-blue-100-1 rounded direction-ltr user-select-none pointer-event-none">
                                <template v-if="!!images.second.data">
                                    <span v-for="item in images.second.preview"
                                          :key="item.fileName"
                                          v-text="item.fileName"
                                          class="font-sm font-medium text-bayoux"
                                    > </span>
                                </template>
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
                                   v-model="form.source_link"
                            />
                        </label>
                    </div>
                </div>
            </div>
            <div class="c-post__panel w-1/3 xl:w-1/4">
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
                            {{ isAdmin ? 'انتشار' : 'ارسال به سردبیر' }}
                        </button>
                        <span class="dropdown__divider"> </span>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickRemoveButton(); hiddenDropdown()}"
                        >
                            انتقال به زباله‌دان
                        </button>
                    </template>
                </publish-cm>
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid"
                     v-if="shouldBeShowDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm type="datetime"
                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                    format="jYYYY/jMM/jDD HH:mm"
                                    :min="DatePickerMinValue"
                                    @onChange="onChangePublishDateField"
                                    placeholder="زمان انتشار را انتخاب کنید"
                    />
                </div>
                <location-cm :lang="currentLang"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        اخبار ایران
                    </p>
                </div>
                <image-panel-cm @onChange="onChangeMainImageField"
                                ref="imagePanel"
                />
                <domains-cm @onChange="onChangeDomainsField"
                            :isPending="!domainsPanel.isPending"
                            :options="domainsPanel.options"
                />
            </div>
        </div>
    </div>
</template>

<script>
    import {
        mapGetters, mapState
    } from 'vuex';
    import IconCm from '@components/Icon.vue';
    import CreateNewsService from '@services/service/CreateNews';
    import TextEditorCm from '@components/TextEditor.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import DomainsCm from '@components/DomainsPanel.vue';
    import PublishCm from '@components/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import UploadService from '@vendor/components/upload';
    import UploadCm from '@vendor/components/upload/Index.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import TagsCm from '@components/Tags.vue';

    import {
        Length, toEnglishDigits
    } from "@vendor/plugin/helper";
    import {
        IS_ADMIN
    } from '@services/store/Login'

    let Service = null;

    const GET_INITIAL_FORM = () => ({
        first_title: '',
        second_title: '',
        abstract: '',
        description: '',
        province_id: '',
        publish_date: '',
        source_link: '',
        parent_id: '',
        language: ''
    });

    const GET_INITIAL_IMAGE = () => ({
        data: null,
        preview: []
    });

    export default {
        name: 'CreateNews',
        data: () => ({
            form: GET_INITIAL_FORM(),
            images: {
                main: GET_INITIAL_IMAGE(),
                second: GET_INITIAL_IMAGE(),
            },
            domainsPanel: {
                isPending: true,
                options: [
                    {
                        text: 'بابل',
                        value: 1
                    },
                    {
                        text: 'آذربایجان شرقی',
                        value: 2
                    },
                    {
                        text: 'آذربایجان غربی',
                        value: 3
                    },
                    {
                        text: 'ایلام',
                        value: 5
                    },
                    {
                        text: 'اصفهان',
                        value: 6
                    },
                    {
                        text: 'تهران',
                        value: 9
                    },
                    {
                        text: 'چهار محال و بختیاری',
                        value: 10
                    },
                    {
                        text: 'خراسان رضوی',
                        value: 12
                    },
                    {
                        text: 'خوزستان',
                        value: 14
                    },
                    {
                        text: 'زنجان',
                        value: 15
                    },
                ],
            },
            tags: [
                {
                    name: 'یادداشت روز'
                },
                {
                    name: 'کوردیناتور'
                },
                {
                    name: 'مرگ مغزی'
                },
                {
                    name: 'بیمارستان قلب رجایی'
                },
                {
                    name: 'مرکز مدیریت پیوند'
                },
                {
                    name: 'هزینه ملی اجتماعی'
                },
                {
                    name: 'آگاهی اجتماعی'
                },
                {
                    name: 'بیمار لیست انتظار'
                },
                {
                    name: 'آیروس'
                },
                {
                    name: 'کردستان'
                },
                {
                    name: 'دانشگاه علوم پزشکی کردستان'
                },
                {
                    name: 'بیماران لیست انتظار'
                },
                {
                    name: 'پیوند'
                },
                {
                    name: 'آمار اهدای عضو'
                },
                {
                    name: 'فرهنگسازی'
                },
                {
                    name: 'سمنان'
                },
                {
                    name: 'کارت اهدای عضو'
                },
                {
                    name: 'اهدای عضو'
                },
                {
                    name: 'سینما'
                },
                {
                    name: 'اینفوگرافی'
                },
                {
                    name: 'ایران'
                },
                {
                    name: 'ولادت امام رضا'
                },
                {
                    name: 'ایثار'
                },
                {
                    name: 'توکل'
                },
                {
                    name: 'پیوند عضو'
                },
                {
                    name: 'خانواده اهداکننده'
                },
                {
                    name: 'مسئولیت اجتماعی'
                },
                {
                    name: 'نهادهای فرهنگی'
                },
                {
                    name: 'کارگاه آموزشی'
                },
                {
                    name: 'مددکاری اجتماعی'
                },
                {
                    name: 'گیرنده عضو'
                },
                {
                    name: 'سفیر اهدای عضو'
                },
                {
                    name: 'کوهنوردی'
                }
            ],
            shouldBeShowSecondTitle: false,
            shouldBeShowDatePicker: false,
        }),
        components: {
            IconCm,
            UploadCm,
            DomainsCm,
            PublishCm,
            LocationCm,
            ImagePanelCm,
            TextEditorCm,
            DatePickerCm,
            TagsCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                categories: ({ CreateMenu }) => CreateMenu.categories
            }),
            /**
             * @return {number | string}
             */
            DatePickerMinValue() {
                try {
                    const DATE = new Date(),
                        LOCALE_DATE = DATE.toLocaleString('fa');
                    return (
                        toEnglishDigits(
                            LOCALE_DATE
                                .replace('،', ' ')
                                .slice(0, Length( LOCALE_DATE ) - 3)
                        )
                    )
                } catch (e) {
                    return ''
                }
            },
            currentLang() {
                return this.$route.params.lang
            }
        },
        methods: {
            setInitialState() {
                Object.assign(this.form, GET_INITIAL_FORM.apply( this ));
                Object.assign(this.images.main, GET_INITIAL_IMAGE.apply( this ));
                Object.assign(this.images.second, GET_INITIAL_IMAGE.apply( this ));
                this.$refs['textEditor']?.clearContent();
                this.$refs['imagePanel']?.onClickRemoveImageButton();
            },
            onClickToggleSecondTitleButton() {
                this.$set( this.form, 'second_title', '' );
                this.$set( this, 'shouldBeShowSecondTitle', !this.shouldBeShowSecondTitle );
            },
            onUpdateTextEditor( HTML ) {
                this.$set(this.form, 'description', HTML);
            },
            onClickSecondImageButton() {
                this.$refs['secondImageFiled']?.openFileDialog();
            },
            async onChangeSecondImageField( formData ) {
                try {
                    this.$set(this.images.second, 'data', formData);
                    let getImage = await UploadService.imagePreview( formData );
                    this.$set(this.images.second, 'preview', getImage);
                } catch (e) {}
            },
            onChangePublishDateField( unix ) {
                this.$set(this.form, 'publish_date', unix)
            },
            onClickPersianLang() {
                this.pushRouter({
                    name: 'CREATE_NEWS',
                    params: {
                        lang: 'fa',
                    }
                });
                this.setInitialState();
            },
            onClickEnglishLang() {
                this.pushRouter({
                    name: 'CREATE_NEWS',
                    params: {
                        lang: 'en',
                    }
                });
                this.setInitialState();
            },
            onClickReleaseTimeButton() {
                this.$set(this, 'shouldBeShowDatePicker', !this.shouldBeShowDatePicker);
            },
            onClickChiefEditorButton() {
                console.log('onClickChiefEditorButton');
            },
            onClickRemoveButton() {
                console.log('onClickRemoveButton');
            },
            combineImagesFormData() {
                // var formData = new FormData(form[0]);
                // formData.append("someName", "someValue");

                // data = new FormData($('#form1')[0]),
                //     form_2 	= $('#form2').serializeArray();
                //
                // form_2.forEach(function(fields){
                //     data.append(fields.name, fields.value);
                // });
            },
            onChangeMainImageField( payload ) {
                this.$set( this.images.main, 'data', payload )
            },
            onChangeDomainsField( id ) {
                this.$set( this.form, 'province_id', id )
            },
            setLanguageFromParamsRouter() {
                this.$set(this.form, 'language', this.currentLang);
            },
            setParentIDFromParamsRouter() {
                this.$set(this.form, 'parent_id', (
                    this.$route.params.parent_id || ""
                ));
            },
        },
        async created() {
            Service = new CreateNewsService( this );
            await Service.processFetchAsyncData();
        },
        mounted() {
            console.log(this.categories, 'categories');
            this.setLanguageFromParamsRouter();
            this.setParentIDFromParamsRouter();
        },
        updated() {
            this.setLanguageFromParamsRouter();
            this.setParentIDFromParamsRouter();
        }
    }
</script>

<!--'first_title'  => 'required|string', *** OK *** -->
<!--'second_title' => 'string',, *** OK *** -->
<!--'abstract'     => 'string', *** OK ***  -->
<!--'description'  => 'string', *** OK *** -->
<!--'category_id'  => 'array|exists:categories,id',-->
<!--'main_category_id'  => 'integer|exists:categories,id',-->
<!--'publish_date' => 'required|numeric', *** OK *** -->
<!--'source_link'  => 'url', *** OK *** -->
<!--'province_id'  => 'required|integer|exists:provinces,id', *** OK *** -->
<!--'parent_id'    => 'integer|exists:news,id|unique:news', *** OK *** Backend-->
<!--'language'     => ['required', Rule::in(config('news.news_language'))], *** OK ***-->
<!--'images.*'     => 'image'  *** OK *** -->


<!--parent_id va province_id chie?-->
<!--va source_link-->
<!--manbae khabar = source link-->
<!--province_id bareye che domaini dide beshe-->
<!--age ye khabar vasash fa misazi ya en id khabar bedi:D-->
<!--age aval farsi besaze bad bezane en to id fa tu save en behem midi-->

<!--
http://localhost/category/v1/admin/get_category_by_type?category_type=news

-->