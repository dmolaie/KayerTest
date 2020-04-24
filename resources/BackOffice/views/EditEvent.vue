<template>
    <div class="c-event c-post w-full">
        <div class="w-full flex items-start">
            <div class="c-post__content l:m-l-25 xl:m-l-35">
                <div class="main inner-box inner-box--white w-full rounded-2 rounded-br-none rounded-bl-none">
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                               :class="{ 'direction-ltr': ( form.language === 'en' ) }"
                               placeholder="عنوان را اینجا وارد کنید"
                               v-model="form.title"
                        />
                    </label>
                    <div class="w-full border-blue-100-1 rounded m-t-15">
                        <text-editor-cm v-model="form.description"
                                        :lang="form.language"
                                        :key="'text-editor' + textEditorKey"
                        />
                    </div>
                    <div class="c-news__abstract w-full">
                        <p class="text-rum font-sm font-bold m-b-8 cursor-default">
                            چکیده
                        </p>
                        <label class="w-full block">
                            <textarea class="textarea textarea--white w-full block border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg"
                                      :class="{ 'direction-ltr': ( form.language === 'en' ) }"
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
                                                    displayFormat="dddd jDD jMMMM jYYYY HH:mm"
                                                    format="unix" :value="`${form.event_start_date * 1e3 || ''}`"
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
                                                    displayFormat="dddd jDD jMMMM jYYYY HH:mm"
                                                    format="unix" :value="`${form.event_end_date * 1e3 || ''}`"
                                                    :min="`${form.event_start_date}`"
                                                    @onChange="onChangeEndDateField" :disabled="!form.event_start_date"
                                                    :key="'endDate' + datePickerKey" placeholder="زمان پایان رویداد را انتخاب کنید"
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
                                                    displayFormat="dddd jDD jMMMM jYYYY HH:mm"
                                                    format="unix" :value="`${form.event_start_register_date * 1e3 || ''}`"
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
                                                    displayFormat="dddd jDD jMMMM jYYYY HH:mm"
                                                    format="unix" :value="`${form.event_end_register_date * 1e3 || ''}`"
                                                    :min="`${form.event_start_register_date}`"
                                                    @onChange="onChangeEndRegisterDateField" :disabled="!form.event_start_register_date"
                                                    :key="'endRegister' + datePickerKey" placeholder="زمان پایان ثبت‌نام را انتخاب کنید"
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
                <publish-cm :isPublished="form.is_published"
                            :isPending="form.is_pending"
                            :isReject="form.is_reject"
                            :isAccept="form.is_accept"
                            :isCancel="form.is_cancel"
                            :isReadyPublished="form.is_ready_to_publish"
                            :statusLabel="form.status || ''"
                            buttonLabel="بروزرسانی"
                >
                    <template #dropdown="{ hiddenDropdown }">
                        <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                @click.prevent="() => {onClickUpdateEventButton(); hiddenDropdown()}"
                        >
                            بروزرسانی
                        </button>
                        <template v-if="!form.is_published && !form.is_recycle">
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickChangeReleaseTimeButton(); hiddenDropdown();}"
                            >
                                تنظیم زمان انتشار
                            </button>
                        </template>
                        <template v-if="form.is_published">
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickCancelEventButton(); hiddenDropdown()}"
                            >
                                لغو انتشار
                            </button>
                        </template>
                        <template v-else>
                            <span class="dropdown__divider"> </span>
                            <button class="dropdown__item block w-full text-bayoux font-xs font-medium text-right"
                                    @click.prevent="() => {onClickRejectEventButton(); hiddenDropdown()}"
                            >
                                بازگشت به نویسنده (رد)
                            </button>
                        </template>
                    </template>
                </publish-cm>
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid"
                     v-if="shouldBeShowReleaseDatePicker"
                >
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        زمان انتشار
                    </p>
                    <date-picker-cm type="datetime"
                                    displayFormat="jDD jMMMM jYYYY HH:mm"
                                    format="unix" :value="`${form.publish_date * 1e3}`"
                                    @onChange="onChangePublishDateField" :min="minValuePublishDate"
                                    :key="'publishDate' + datePickerKey" placeholder="زمان انتشار را انتخاب کنید"
                    />
                </div>
                <location-cm :lang="form.language"
                             @onPersianLang="onClickPersianLang"
                             @onEnglishLang="onClickEnglishLang"
                             :defaultLabel="LocationPanelTitle"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        دسته‌بندی
                    </p>
                    <category-cm :list="categories"
                                 :value="selectedCategory" :lang="form.language"
                                 ref="categoryCm" @change="onChangeCategoryField"
                    />
                </div>
                <image-panel-cm @onChange="onChangeImageField"
                                ref="imagePanel" :value="form.image_paths || {}"
                />
                <div class="panel w-full block bg-white border-2 rounded-2 border-solid">
                    <p class="panel__title font-sm font-bold text-blue cursor-default">
                        نامک
                    </p>
                    <label class="block w-full">
                        <input type="text"
                               class="input input--white block w-full border-blue-100-1 rounded font-sm font-normal focus:bg-white transition-bg direction-rtl"
                               :class="{ 'direction-ltr': ( form.language === 'en' ) }"
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
                                   :value="form.province_name || ''"
                                   label="name" ref="provinces"
                        />
                    </div>
                    <p class="panel__title font-sm font-bold text-bayoux cursor-default m-0">
                        مالک مطلب: {{ form.publisher_name }}
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
        CopyOf, toEnglishDigits, Length, HasLength
    } from '@vendor/plugin/helper';
    import StatusService from '@services/service/Status';
    import EditEventService, {
        INITIAL_FORM
    } from '@services/service/EditEvent';
    import TextEditorCm from '@vendor/components/textEditor/Index.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import PublishCm from '@components/CreatePost/PublishPanel.vue';
    import LocationCm from '@components/LocationPanel.vue';
    import CategoryCm from '@components/Category.vue';
    import ImagePanelCm from '@components/ImagePanel.vue';
    import SelectCm from '@vendor/components/select/Index.vue';

    let Service = null;

    export default {
        name: "EditEvent",
        data: () => ({
            form: INITIAL_FORM(),
            removedImages: [],
            datePickerKey: 0,
            textEditorKey: 0,
            isPending: true,
            custom_publish_date: '',
            isModuleRegistered: false,
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
                detail: ({ EditEventStore }) => EditEventStore.detail,
                provinces: ({ EditEventStore }) => EditEventStore.provinces,
                categories: ({ EditEventStore }) => EditEventStore.categories,
            }),
            minValuePublishDate() {
                const NOW_TIMESTAMP = new Date().getTime();
                return NOW_TIMESTAMP.toString()
            },
            selectedCategory() {
                return ( !!this.form.category_ids && HasLength( this.form.category_ids ) ) ? (
                    this.form.category_ids
                ) : ([])
            },
            /**
             * @return {string}
             */
            LocationPanelTitle() {
                return this.form.has_relation ? 'ویرایش' : 'ایجاد'
            },
        },
        watch: {
            $route() {
                this.$set(this, 'isPending', true);
                Service.getRelationDetails()
                    .then(this.$nextTick)
                    .then(() => {
                        this.setInitialState();
                        this.setDataIntoForm();
                        this.$set(this, 'isPending', false);
                    })
                    .catch(exception => {
                        this.displayNotification(exception, { type: 'error' });
                        this.pushRouter({ name: 'MANAGE_EVENT' });
                    })
            }
        },
        methods: {
            setInitialState() {
                try {
                    Object.assign(this.form, INITIAL_FORM.apply( this ));
                    this.$refs['imagePanel']?.onClickRemoveImageButton();
                    this.$refs['categoryCm']?.reset();
                    this.$set(this, 'datePickerKey', this.datePickerKey + 1);
                    this.$set(this, 'removedImages', []);
                    this.$refs['provinces']?.resetValue();
                } catch (e) {}
            },
            setDataIntoForm() {
                try {
                    this.$set(this, 'form', CopyOf(this.detail));
                    this.$set(this, 'shouldBeShowReleaseDatePicker', !this.form.is_published);
                    this.$nextTick(() => {
                        this.$set(this, 'textEditorKey', this.textEditorKey + 1);
                    })
                } catch (e) {}
            },
            onChangeStartDateField( unix ) {
                this.$set(this.form, 'event_start_date', unix);
                this.$set(this.form, 'event_end_date', '');
            },
            onChangeEndDateField( unix ) {
                this.$set(this.form, 'event_end_date', unix)
            },
            onChangeStartRegisterDateField( unix ) {
                this.$set(this.form, 'event_start_register_date', unix);
                this.$set(this.form, 'event_end_register_date', '');
            },
            onChangeEndRegisterDateField( unix ) {
                this.$set(this.form, 'event_end_register_date', unix)
            },
            onClickChangeReleaseTimeButton() {
                this.$set(this, 'shouldBeShowReleaseDatePicker', !this.shouldBeShowReleaseDatePicker);
            },
            onChangePublishDateField( unix ) {
                this.$set(this, 'custom_publish_date', unix)
            },
            onClickPersianLang() {
                if ( this.form.has_relation ) {
                    this.pushRouter({
                        name: 'EDIT_EVENT',
                        params: {
                            lang: 'fa',
                            id: this.form.relation_id,
                        }
                    });
                }
                else {
                    this.pushRouter({
                        name: 'CREATE_EVENT',
                        params: {
                            lang: 'fa',
                            onlyFaLang: true,
                            parent_id: this.form.event_id,
                        }
                    });
                }
            },
            onClickEnglishLang() {
                if ( this.form.has_relation ) {
                    this.pushRouter({
                        name: 'EDIT_EVENT',
                        params: {
                            lang: 'en',
                            id: this.form.relation_id,
                        }
                    });
                }
                else {
                    this.pushRouter({
                        name: 'CREATE_EVENT',
                        params: {
                            lang: 'en',
                            onlyEnLang: true,
                            parent_id: this.form.event_id,
                        }
                    });
                }
            },
            onChangeCategoryField( payload ) {
                this.$set(this.form, 'category_ids', payload);
            },
            removeSelectedImage() {
                let {
                    image_paths
                } = this.form;
                if ( HasLength( image_paths ) ) {
                    this.removedImages.push( image_paths.id );
                    this.$set(this.form, 'image_paths', {});
                }
            },
            onChangeImageField( payload ) {
                this.removeSelectedImage();
                this.$set(this.form, 'images', payload)
            },
            onChangeDomainsField({ id }) {
                this.$set( this.form, 'province_id', id );
            },
            async onClickUpdateEventButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.editEventItem();
                    this.displayNotification(result, { type: 'success' });
                    this.pushRouter({ name: 'MANAGE_EVENT' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            async onClickRejectEventButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = Service.changeEventStatus(this.form.event_id, StatusService.REJECT_STATUS);
                    this.displayNotification(result, { type: 'success' });
                    this.pushRouter({ name: 'MANAGE_EVENT' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
            async onClickCancelEventButton() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.changeEventStatus(this.form.event_id, StatusService.CANCEL_STATUS);
                    this.displayNotification(result, { type: 'success' });
                    this.pushRouter({ name: 'MANAGE_EVENT' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this, 'isPending', false);
                }
            }
        },
        created() {
            Service = new EditEventService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.setDataIntoForm();
                    this.$set(this, 'isPending', false);
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>