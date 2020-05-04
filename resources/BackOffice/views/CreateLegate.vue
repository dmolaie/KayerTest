<template>
    <div class="c-card e-user c-post w-full">
        <div class="main w-full inner-box inner-box--white w-full rounded-2">
            <div class="c-card__step c-card__step--1"
                 v-if="shouldBeShowInquiryStep && showInquiryStep"
            >
                <p class="font-sm font-bold text-blue cursor-default">
                    استعلام کد ملی
                </p>
                <div class="c-card__field w-full flex items-center">
                    <span class="p-account__c-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                        کدملی
                    </span>
                    <label class="relative w-full block"
                           :class="{ 'c-card__hasError': validation.national_code.show }"
                    >
                        <input type="text" placeholder="۱۰ رقم بدون خط تیره" autocomplete="off"
                               v-model="form.national_code"
                               @focus="hideErrorMessage('national_code')"
                               @blur="validateNationalCode('national_code', form.national_code)"
                               class="c-card__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                        />
                        <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                              v-show="validation.national_code.show"
                              v-text="validation.national_code.value"
                        > </span>
                    </label>
                </div>
                <button class="c-card__button c-card__button--submit block text-white font-sm font-bold rounded m-0-auto"
                        :class="{ 'spinner-loading': spinnerLoading.submit }"
                        @click.prevent="nationalCodeInquiry( form.national_code )"
                >
                    استعلام کد ملی
                </button>
            </div>
            <div class="c-card__step c-card__step--2" v-else
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
                                   @focus="hideErrorMessage('name')"
                                   @blur="validatePersianCharacter('name', form.name, true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.name.show"
                                  v-text="validation.name.value"
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
                                   @focus="hideErrorMessage('last_name')"
                                   @blur="validatePersianCharacter('last_name', form.last_name, true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.last_name.show"
                                  v-text="validation.last_name.value"
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
                                       :value="gender['male']" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    آقا
                                </span>
                            </label>
                            <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       :value="gender['female']" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    خانم
                                </span>
                            </label>
                            <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       :value="gender['other']" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    سایر
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            نام پدر
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.father_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.father_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hideErrorMessage('father_name')"
                                   @blur="validatePersianCharacter('father_name', form.father_name, false)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.father_name.show"
                                  v-text="validation.father_name.value"
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
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   @focus="hideErrorMessage('identity_number')"
                                   @blur="validateOnlyNumber('identity_number', form.identity_number)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.identity_number.show"
                                  v-text="validation.identity_number.value"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0"
                         v-if="!showInquiryStep"
                    >
                        <span class="c-card__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            کدملی
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.national_code.show }"
                        >
                            <input type="text" placeholder="۱۰ رقم بدون خط تیره" autocomplete="off"
                                   v-model="form.national_code"
                                   @focus="hideErrorMessage('national_code')"
                                   @blur="validateNationalCode('national_code', form.national_code)"
                                   class="c-card__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            />
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.national_code.show"
                                  v-text="validation.national_code.value"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            تاریخ تولد
                        </span>
                        <div class="e-user__date w-full flex items-stretch text-center user-select-none">
                            <select-cm class="e-user__date--day w-1/3"
                                       :options="day" label="name" placeholder="روز"
                                       @onChange="updateDayOfBirthDateField"
                            />
                            <select-cm class="e-user__date--month w-1/3"
                                       :options="month" label="name" placeholder="ماه"
                                       @onChange="updateMonthOfBirthDateField"
                            />
                            <select-cm class="e-user__date--year w-1/3"
                                       :options="year" label="name" placeholder="سال"
                                       @onChange="updateYearOfBirthDateField"
                            />
                        </div>
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
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن همراه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.mobile"
                                   placeholder="تلفن همراه"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   @focus="hideErrorMessage('mobile')"
                                   @blur="validateMobileNumber('mobile', form.mobile, true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.mobile.show"
                                  v-text="validation.mobile.value"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن اضطراری
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.essential_mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.essential_mobile"
                                   placeholder="تلفن اضطراری"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   @focus="hideErrorMessage('essential_mobile')"
                                   @blur="validateMobileNumber('essential_mobile', form.essential_mobile, true)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.essential_mobile.show"
                                  v-text="validation.essential_mobile.value"
                            > </span>
                        </label>
                    </div>
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
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   @focus="hideErrorMessage('email')"
                                   @blur="validateEmail('email', form.email)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.email.show"
                                  v-text="validation.email.value"
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
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            آدرس محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.current_address.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.current_address"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hideErrorMessage('current_address')"
                                   @blur="validatePersianCharacter('current_address', form.current_address, false)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.current_address.show"
                                  v-text="validation.current_address.value"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.phone.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.phone"
                                   placeholder="تلفن محل سکونت ۱۱ رقمی خود را وارد نمایید"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   @focus="hideErrorMessage('phone')"
                                   @blur="validatePhoneNumber('phone', form.phone)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.phone.show"
                                  v-text="validation.phone.value"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            کد‌پستی محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.home_postal_code.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.home_postal_code"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   @focus="hideErrorMessage('home_postal_code')"
                                   @blur="validatePostalCode('home_postal_code', form.home_postal_code)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.home_postal_code.show"
                                  v-text="validation.home_postal_code.value"
                            > </span>
                        </label>
                    </div>
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
    import { mapState } from 'vuex';
    import CreateLegateService from '@services/service/CreateLegate';
    import RegisterFormService from '@services/service/RegisterForm';
    import { HasLength, NationalCodeValidator } from "@vendor/plugin/helper";
    import SelectCm from '@vendor/components/select/Index.vue';


    let Service = null,
        FormValidator = null;

    export default {
        name: "CreateLegate",
        data: () => ({
            form: {
                national_code: '',
                name: '',
                last_name: '',
                gender: '',
                father_name: '',
                identity_number: '',
                date_of_birth_year: '',
                date_of_birth_month: '',
                date_of_birth_day: '',
                province_of_birth: '',
                city_of_birth: '',
                event_id: '',
                mobile: '',
                essential_mobile: '',
                email: '',
                current_province_id: '',
                current_city_id: '',
                current_address: '',
                phone: '',
                home_postal_code: '',

            },
            validation: {
                national_code: {},
                name: {}, last_name: {}, father_name: {}, identity_number: {},
                mobile: {}, essential_mobile: {}, email: {},
                current_address: {}, phone: {}, home_postal_code: {}
            },
            cities: { birth: {}, current: {}, education: {} },
            gender: RegisterFormService.gender,
            day: RegisterFormService.day,
            year: RegisterFormService.year,
            month: RegisterFormService.month,
            isPending: true,
            isModuleRegistered: false,
            shouldBeShowInquiryStep: true,
            spinnerLoading: { submit: false },
        }),
        components: {
            SelectCm
        },
        watch: {
            async 'form.province_of_birth'( id ) {
                let result = await RegisterFormService.getCityByProvincesId( id );
                this.$set(this.cities, 'birth', result);
            },
            async 'form.current_province_id'( id ) {
                let result = await RegisterFormService.getCityByProvincesId( id );
                this.$set(this.cities, 'current', result);
            },
        },
        computed: {
            ...mapState({
                events: ({ CreateLegate }) => CreateLegate.events,
                provinces: ({ CreateLegate }) => CreateLegate.provinces,
                education: ({ CreateLegate }) => CreateLegate.education,
                showInquiryStep: ({ CreateLegate }) => CreateLegate.authentication && CreateLegate.authentication.register_by_admin,
            })
        },
        methods: {
            hideErrorMessage( field ) {
                FormValidator.hideErrorMassage( field );
            },
            validateNationalCode(field, value) {
                FormValidator.nationalCodeValidator(field, value);
            },
            validatePersianCharacter(field, value,  is_required = false) {
                FormValidator.validatePersianCharacter(field, value, is_required);
            },
            validateOnlyNumber(field, value, is_required = false) {
                FormValidator.validateOnlyNumber(field, value, is_required);
            },
            validateMobileNumber(field, value, is_required = false) {
                FormValidator.validateMobileNumber(field, value, is_required);
            },
            validateEmail(field, value, is_required = false) {
                FormValidator.validateEmail(field, value, is_required);
            },
            validatePhoneNumber(field, value, is_required = false) {
                FormValidator.validatePhoneNumber(field, value, is_required);
            },
            validatePostalCode(field, value, is_required = false) {
                FormValidator.validatePostalCode(field, value, is_required);
            },

            updateYearOfBirthDateField({ id }) {
                this.$set(this.form, 'date_of_birth_year', id);
            },
            updateMonthOfBirthDateField({ id }) {
                this.$set(this.form, 'date_of_birth_month', id);
            },
            updateDayOfBirthDateField({ id }) {
                this.$set(this.form, 'date_of_birth_day', id);
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
                    return await RegisterFormService.handelEventFieldSearch( search );
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


            async nationalCodeInquiry( national_code ) {
                try {
                    this.validateNationalCode('national_code', national_code);
                    if (HasLength( national_code ) && NationalCodeValidator( national_code )) {
                        this.$set(this, 'spinnerLoading', true);
                        let result = await Service.nationalCodeInquiry( national_code );
                        this.$set(this, 'spinnerLoading', false);
                        this.$set(this, 'shouldBeShowInquiryStep', false);
                        this.displayNotification(result, { type: 'success' });
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            }
        },
        created() {
            FormValidator = new RegisterFormService( this.validation );
            Service = new CreateLegateService( this );
            Service.processFetchAsyncData()
                .then( this.$nextTick )
                .then(() => {
                    this.$set(this, 'isPending', false);
                });
        }
    }
</script>