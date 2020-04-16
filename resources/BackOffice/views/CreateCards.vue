<template>
    <div class="c-card e-user c-post w-full">
        <div class="main w-full inner-box inner-box--white w-full rounded-2">
            <div class="c-card__step c-card__step--1"
                 v-if="false"
            >
                <p class="font-sm font-bold text-blue cursor-default">
                    استعلام کد ملی
                </p>
                <label class="c-card__field w-full flex items-center">
                    <span class="p-account__c-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                        کدملی
                    </span>
                    <input type="text" placeholder="۱۰ رقم بدون خط تیره" autocomplete="off"
                           v-model="form.national_code"
                           class="c-card__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr">
                </label>
                <button class="c-card__button c-card__button--submit block text-white font-sm font-bold rounded m-0-auto"
                        :class="{ 'spinner-loading': spinnerLoading.submit }"
                        @click.prevent="onClickCheckNationalCodeButton"
                >
                    استعلام کد ملی
                </button>
            </div>
            <div class="c-card__step c-card__step--2"
                 v-else
            >
                <p class="c-card__label font-sm font-bold text-blue cursor-default">
                    اطلاعات فردی
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            نام
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('name')"
                                   @blur="persianCharValidate('name', 'نام', true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.name.show"
                                  v-text="validation.name.text"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            نام خانوادگی
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.last_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.last_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('last_name')"
                                   @blur="persianCharValidate('last_name', 'نام خانوادگی', true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.last_name.show"
                                  v-text="validation.last_name.text"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            جنسیت
                        </span>
                        <div class="w-full flex items-stretch text-center user-select-none">
                            <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       :value="0" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    آقا
                                </span>
                            </label>
                            <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       :value="1" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    خانم
                                </span>
                            </label>
                            <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       :value="2" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    سایر
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            نام پدر
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.father_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.father_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('father_name')"
                                   @blur="persianCharValidate('father_name', 'نام پدر', true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.father_name.show"
                                  v-text="validation.father_name.text"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شماره شناسنامه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.identity_number.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.identity_number" placeholder="فقط عدد"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('identity_number')"
                                   @blur="numberValidator('identity_number', 'شماره شناسنامه')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.identity_number.show"
                                  v-text="validation.identity_number.text"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            تاریخ تولد
                        </span>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            استان محل تولد
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateProvinceOfBirthField"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شهر محل تولد
                        </span>
                        <select-cm :options="cities.birth" ref="cityOfBirth"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateCityOfBirthField" :disabled="!form.province_of_birth"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            رویداد
                        </span>
                        <select-cm :options="events"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateEventField" :filterBy="handelEventFieldSearch"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="c-card__label font-sm font-bold text-blue cursor-default">
                    اطلاعات تماس
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            ایمیل
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.email.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.email"
                                   placeholder="حروف انگلیسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('email')"
                                   @blur="emailValidator('email', 'ایمیل')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.email.show"
                                  v-text="validation.email.text"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن همراه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.mobile"
                                   placeholder="تلفن همراه"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('mobile')"
                                   @blur="mobileValidator('mobile', 'تلفن همراه', true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.mobile.show"
                                  v-text="validation.mobile.text"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="c-card__label font-sm font-bold text-blue cursor-default">
                    اطلاعات محل سکونت
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            استان محل سکونت
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateCurrentProvinceField"
                                   label="name" :searchable="true"
                        />
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            شهر محل سکونت
                        </span>
                        <select-cm :options="cities.current" ref="currentCity"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateCurrentCityField" :disabled="!form.current_province_id"
                                   label="name" :searchable="true"
                        />
                    </div>
                </div>
            </div>
            div.c-card__field.w-1/3.xl:w-1/4.md:w-1/2.sm:w-full.flex-shrink-0
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import {
        HasLength, Length, toEnglishDigits, OnlyPersianAlphabet, CopyOf,
        PostalCodeValidator, OnlyNumber, PhoneNumberValidator, EmailValidator
    } from '@vendor/plugin/helper'
    import CreateCardsService from '@services/service/CreateCards';
    import SelectCm from '@vendor/components/select/Index.vue';

    let Service = null;
    //0520696042 ذخیره و ارسال به صف چاپ فیزیکی کارت
    //
    export default {
        name: "CreateCards",
        data: () => ({
            isPending: false,
            form: {
                national_code: '',
                name: '',
                last_name: '',
                gender: '',
                father_name: '',
                identity_number: '',
                province_of_birth: '',
                city_of_birth: '',
                event_id: '',
                email: '',
                mobile: '',
                current_province_id: '',
                current_city_id: '',
            },
            validation: {
                name: { text: '', show: false },
                last_name: { text: '', show: false },
                father_name: { text: '', show: false },
                identity_number: { text: '', show: false },
                email: { text: '', show: false },
                mobile: { text: '', show: false },
            },
            cities: { birth: {}, current: {} },
            spinnerLoading: {
                submit: false
            },
            isModuleRegistered: false
        }),
        components: { SelectCm },
        computed: {
            ...mapState({
                provinces: ({ CreateCardsStore }) => CreateCardsStore.provinces,
                education: ({ CreateCardsStore }) => CreateCardsStore.education,
                events: ({ CreateCardsStore }) => CreateCardsStore.events,
            }),

        },
        watch: {
            async 'form.province_of_birth'( id ) {
                let response = await Service.getCityByProvincesId( id );
                if ( !!response ) this.$set(this.cities, 'birth', response);
            },
            async 'form.current_province_id'( id ) {
                let response = await Service.getCityByProvincesId( id );
                this.$set(this.cities, 'current', response);
            },
            // async 'form.education_province_id'( id ) {
            //     let response = await Service.getCityByProvincesId( id );
            //     if ( !!response ) this.$set(this.cities, 'education', response);
            // },
            // async 'form.province_of_work'( id ) {
            //     let response = await Service.getCityByProvincesId( id );
            //     if ( !!response ) this.$set(this.cities, 'work', response);
            // },
        },
        methods: {
            setValidationError( name, text = '' ) {
                this.$set(this.validation, `${name}`, {text, show: true});
            },
            hiddenValidationError( name ) {
                this.$set(this.validation, `${name}`, {text: '', show: false});
            },
            persianCharValidate(name, name_fa, required = false) {
                let field = this.form[name];
                if ( required ) {
                    if ( HasLength(field) ) {
                        if (!OnlyPersianAlphabet(field))
                           this.setValidationError(name, `${name_fa} را با حروف فارسی وارد نمایید.`);
                    } else this.setValidationError(name, `فیلد ${name_fa} ضروری است.`)
                } else {
                    if (HasLength(field) && !OnlyPersianAlphabet(field) )
                        this.setValidationError(name, `${name_fa} را با حروف فارسی وارد نمایید.`);
                }
            },
            numberValidator(name, name_fa) {
                let field = this.form[name];
                if (HasLength( field ) && !OnlyNumber( field ))
                    this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
            },
            emailValidator(name, name_fa) {
                let field = this.form[name];
                if (HasLength( field ) && !EmailValidator( field ))
                    this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`)
            },
            mobileValidator(name, name_fa, required = false) {
                let field = this.form[name];
                if ( required ) {
                    if ( HasLength(field) ) {
                        if (!PhoneNumberValidator(field))
                           this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
                    } else this.setValidationError(name, `فیلد ${name_fa} ضروری است.`)
                } else {
                    if (HasLength( field ) && !PhoneNumberValidator( field ))
                        this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
                }
            },
            updateProvinceOfBirthField({ id }) {
                this.$set(this.form, 'province_of_birth', id);
                this.$set(this.form, 'city_of_birth', '');
                this.$refs['cityOfBirth']?.resetValue();
            },
            updateCityOfBirthField({ id }) {
                this.$set(this.form, 'city_of_birth', id);
            },
            updateEventField({ id }) {
                this.$set(this.form, 'event_id', id);
            },
            async handelEventFieldSearch( search ) {
                try {
                    return await Service.handelEventFieldSearch( search );
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            updateCurrentProvinceField({ id }) {
                this.$set(this.form, 'current_province_id', id);
                this.$set(this.form, 'current_city_id', '');
                this.$refs['currentCity']?.resetValue();
            },
            updateCurrentCityField({ id }) {
                this.$set(this.form, 'current_city_id', id);
            },





            async onClickCheckNationalCodeButton() {
                try {
                    this.$set(this.spinnerLoading, 'submit', true);
                    let result = await Service.checkNationalCodeValidation( this.form.national_code );
                    this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'submit', false);
                }
            }
        },
        created() {
            Service = new CreateCardsService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {

                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>