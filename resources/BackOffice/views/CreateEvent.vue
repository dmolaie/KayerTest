<template>
    <div class="c-event c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
                               placeholder="عنوان را اینجا وارد کنید"
                               v-model="form.title"
                        />
                    </label>
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
                                      :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
                                      v-model="form.abstract"
                            > </textarea>
                        </label>
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            تنظیمات رویداد
                        </p>
                        <div class="flex flex items-center">
                            <div class="w-1/2">
                                <div class="w-full p-l-8">
                                    <span class="c-event__s-title block text-black-50 font-xs font-bold cursor-default">
                                        زمان آغاز...
                                    </span>
                                    <date-picker-cm type="datetime" class="c-event__p-date-picker"
                                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                                    format="jYYYY/jMM/jDD HH:mm"
                                                    @onChange="onChangeStartDateField"
                                                    :key="'startDate' + datePickerKey" placeholder="زمان آغاز رویداد را انتخاب کنید"
                                    />
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="w-full p-r-8">
                                    <span class="c-event__s-title block text-black-50 font-xs font-bold cursor-default">
                                        زمان پایان...
                                    </span>
                                    <date-picker-cm type="datetime" class="c-event__p-date-picker"
                                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                                    format="jYYYY/jMM/jDD HH:mm"
                                                    @onChange="onChangeEndDateField"
                                                    :key="'endDate' + datePickerKey" placeholder="زمان پایان رویداد را انتخاب کنید"
                                                    :disabled="!form.event_start_date" :min="minValueEndDate"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            تنظیمات ثبت‌نام
                        </p>
                        <div class="flex flex items-center">
                            <div class="w-1/2">
                                <div class="w-full p-l-8">
                                    <span class="c-event__s-title block text-black-50 font-xs font-bold cursor-default">
                                        زمان آغاز...
                                    </span>
                                    <date-picker-cm type="datetime" class="c-event__p-date-picker"
                                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                                    format="jYYYY/jMM/jDD HH:mm"
                                                    @onChange="onChangeStartRegisterDateField"
                                                    :key="'startRegisterDate' + datePickerKey" placeholder="زمان آغاز ثبت‌نام را انتخاب کنید"
                                    />
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="w-full p-r-8">
                                    <span class="c-event__s-title block text-black-50 font-xs font-bold cursor-default">
                                        زمان پایان...
                                    </span>
                                    <date-picker-cm type="datetime" class="c-event__p-date-picker"
                                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                                    format="jYYYY/jMM/jDD HH:mm"
                                                    @onChange="onChangeEndRegisterDateField" :min="minValueEndRegisterDate"
                                                    :key="'endRegister' + datePickerKey" placeholder="زمان پایان ثبت‌نام را انتخاب کنید"
                                                    :disabled="!form.event_start_register_date"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main inner-box inner-box--blue w-full rounded-2 rounded-tr-none rounded-tl-none">
                    <label class="w-full block m-b-16">
                        <span class="block text-rum font-sm font-bold m-b-8 cursor-default m-b-8">
                            لوکیشن
                        </span>
                        <input type="text" placeholder="لوکیشن"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-rtl"
                               v-model="form.location"
                        />
                    </label>
                    <label class="w-full block m-b-16">
                        <span class="block text-rum font-sm font-bold m-b-8 cursor-default m-b-8">
                            لینک گزارش تصویری
                        </span>
                        <input type="text" placeholder="لینک گزارش تصویری"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-ltr"
                               v-model="form.source_link_image"
                        />
                    </label>
                    <label class="w-full block m-b-16">
                        <span class="block text-rum font-sm font-bold m-b-8 cursor-default m-b-8">
                             لینک گزارش ویدیویی
                        </span>
                        <input type="text" placeholder="لینک گزارش ویدیویی"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-ltr"
                               v-model="form.source_link_video"
                        />
                    </label>
                    <label class="w-full block">
                        <span class="block text-rum font-sm font-bold m-b-8 cursor-default m-b-8">
                             لینک گزارش متنی
                        </span>
                        <input type="text" placeholder="لینک گزارش متنی"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-ltr"
                               v-model="form.source_link_text"
                        />
                    </label>
                </div>
            </div>
            <div class="c-post__panel w-1/3 xl:w-1/4">
                <publish-cm statusLabel="ذخیره‌نشده"
                            :isNotPublished="true"
                            :showDraftButton="true"
                            @onClickDraftButton="onClickDraftButton"
                >
                    <template #dropdown="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickChangeReleaseTimeButton(); hiddenDropdown();}"
                        >
                            تنظیم زمان انتشار
                        </button>
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickReleaseButton(); hiddenDropdown()}"
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
                     v-if="shouldBeShowReleaseDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm type="datetime"
                                    displayFormat="jYYYY/jMM/jDD HH:mm"
                                    format="jYYYY/jMM/jDD HH:mm"
                                    @onChange="onChangePublishDateField" :min="minValuePublishDate"
                                    :key="'publishDate' + datePickerKey" placeholder="زمان انتشار را انتخاب کنید"
                    />
                </div>
                <location-cm :lang="currentLang"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                             disabledLabel="قبلا ایجاد شده"
                             :disabledEn="disabledEnLang"
                             :disabledFa="disabledFaLang"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        دسته‌بندی
                    </p>
                    <category-cm :list="categories"
                                 :lang="currentLang"
                                 ref="categoryCm"
                                 @change="onChangeCategoryField"
                    />
                </div>
                <image-panel-cm @onChange="onChangeImageField"
                                ref="imagePanel"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        نامک
                    </p>
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-rtl"
                               :class="{ 'direction-ltr': ( currentLang === 'en' ) }"
                               placeholder="نامک را اینجا وارد کنید"
                               v-model="form.slug"
                        />
                    </label>
                </div>
                <div class="domains panel relative w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        متفرقه
                    </p>
                    <p class="panel__title font-sm font-bold text-bayoux cursor-default">
                        دامنه
                    </p>
                    <div class="panel__title">
                        <select-cm :options="provinces"
                                   placeholder="دامنه مورد نظر خود را انتخاب کنید"
                                   @onChange="onChangeDomainsField"
                                   :value="defaultProvinces.name || ''"
                                   label="name"
                        />
                    </div>
                    <p class="panel__title font-sm font-bold text-bayoux cursor-default m-0">
                        مالک مطلب: {{ username }}
                    </p>
                </div>
            </div>
        </div>
        <transition name="fade">
            <div class="loading fixed w-full h-full z-10"
                 v-if="isPending"
            ></div>
        </transition>
    </div>
</template>

<script>
    import {
        mapGetters, mapState
    } from 'vuex';
    import {
        HasLength, toEnglishDigits, Length
    } from '@vendor/plugin/helper';
    import CreateEventService from '@services/service/CreateEvent';
    import TextEditorCm from '@components/TextEditor.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import CategoryCm from '@components/Category.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import SelectCm from '@vendor/components/select/Index.vue';

    const INITIAL_FORM = () => ({
        title: '',
        description: '',
        abstract: '',
        event_start_date: '',
        event_end_date: '',
        event_start_register_date: '',
        event_end_register_date: '',
        source_link_text: '',
        source_link_image: '',
        source_link_video: '',
        location: '',
        parent_id: '',
        publish_date: '',
        language: '',
        category_ids: [],
        images: null,
        slug: '',
        province_id: '',
    });

    let Service = null;

    export default {
        name: "CreateEvent",
        data: () => ({
            form: INITIAL_FORM(),
            datePickerKey: 0,
            isPending: true,
            isModuleRegistered: false,
            disabledFaLang: false,
            disabledEnLang: false,
            shouldBeShowReleaseDatePicker: false,
        }),
        components: {
            TextEditorCm,

            PublishCm, DatePickerCm, LocationCm,
            CategoryCm, ImagePanelCm, SelectCm
        },
        computed: {
            ...mapGetters({
                isAdmin: 'IS_ADMIN',
            }),
            ...mapState({
                username: ({ UserStore }) => UserStore.username,
                provinces: ({ CreateEventStore }) => CreateEventStore.provinces,
                categories: ({ CreateEventStore }) => CreateEventStore.categories,
            }),
            minValuePublishDate() {
                return this.calculateDateMinValue();
            },
            minValueEndDate() {
                return this.calculateDateMinValue( this.form.event_start_date );
            },
            minValueEndRegisterDate() {
                return this.calculateDateMinValue( this.form.event_start_register_date );
            },
            currentLang() {
                return this.$route?.params?.lang
            },
            defaultProvinces() {
                return ( HasLength( this.provinces ) ) ? (
                    (Object.values( this.provinces ))[0]
                ) : ({})
            }
        },
        methods: {
            calculateDateMinValue( date ) {
                try {
                    const DATE = !!date ? new Date(date * 1e3) : new Date(),
                          LOCALE_DATE = DATE.toLocaleString('fa');
                    return toEnglishDigits(
                        LOCALE_DATE.replace('،', ' ').slice(0, Length( LOCALE_DATE ) - 3)
                    )
                } catch (e) { return '' }
            },
            setDataFromParamsRouter() {
                let { onlyEnLang, onlyFaLang, parent_id } = this.$route.params;
                this.$set(this.form, 'parent_id', parent_id || "");
                this.$set(this.form, 'language', this.currentLang);
                this.$set(this, 'disabledEnLang', !!onlyFaLang);
                this.$set(this, 'disabledFaLang', !!onlyEnLang);
            },
            onUpdateTextEditor( HTML ) {
                this.$set(this.form, 'description', HTML);
            },
            onChangeStartDateField( unix ) {
                this.$set(this.form, 'event_start_date', unix)
            },
            onChangeEndDateField( unix ) {
                this.$set(this.form, 'event_end_date', unix)
            },
            onChangeStartRegisterDateField( unix ) {
                this.$set(this.form, 'event_start_register_date', unix)
            },
            onChangeEndRegisterDateField( unix ) {
                this.$set(this.form, 'event_end_register_date', unix)
            },
            onClickChangeReleaseTimeButton() {
                this.$set(this, 'shouldBeShowReleaseDatePicker', !this.shouldBeShowReleaseDatePicker);
            },
            async onClickReleaseButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.onClickReleaseEventButton();
                    this.displayNotification(result, { type: 'success' });
                    this.pushRouter({ name: 'MANAGE_EVENT' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            onClickRemoveButton() {
                this.displayNotification('این قابلیت در حال حاضر فعال نیست.', { type: 'warn' });
            },
            onClickDraftButton() {
                this.displayNotification('این قابلیت در حال حاضر فعال نیست.', { type: 'warn' });
            },
            onChangePublishDateField( unix ) {
                this.$set(this.form, 'publish_date', unix)
            },
            onClickPersianLang() {

            },
            onClickEnglishLang() {

            },
            onChangeCategoryField( payload ) {
                this.$set(this.form, 'category_ids', payload);
            },
            onChangeImageField( payload ) {
                this.$set(this.form, 'images', payload)
            },
            onChangeDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
        },
        created() {
            Service = new CreateEventService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.$set(this, 'isPending', false);
                    this.setDataFromParamsRouter();
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>