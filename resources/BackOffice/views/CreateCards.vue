<template>
    <div class="c-card e-user c-post w-full">
        <div class="main w-full inner-box inner-box--white w-full rounded-2">
            <div class="c-card__step c-card__step--1"
                 v-if="step === 1"
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
                               @focus="hiddenValidationError('national_code')"
                               @blur="nationalCodeValidate('national_code')"
                               class="c-card__input input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                        />
                        <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                              v-show="validation.national_code.show"
                              v-text="validation.national_code.text"
                        > </span>
                    </label>
                </div>
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
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
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
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
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
                                   @focus="hiddenValidationError('current_address')"
                                   @blur="persianCharValidate('current_address', 'آدرس محل سکونت')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.current_address.show"
                                  v-text="validation.current_address.text"
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
                                   @focus="hiddenValidationError('phone')"
                                   @blur="phoneNumberValidate('phone', 'تلفن محل سکونت')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.phone.show"
                                  v-text="validation.phone.text"
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
                                   @focus="hiddenValidationError('home_postal_code')"
                                   @blur="postalCodeValidate('home_postal_code', 'کد‌پستی محل سکونت')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.home_postal_code.show"
                                  v-text="validation.home_postal_code.text"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="c-card__label font-sm font-bold text-blue cursor-default">
                    اطلاعات تحصیلی
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            میزان تحصیلات
                        </span>
                        <select-cm :options="education"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateEducationField"
                                   label="name" :required="false"
                        />
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            رشته تحصیلی
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.education_field.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.education_field"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('education_field')"
                                   @blur="persianCharValidate('education_field', 'رشته تحصیلی')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.education_field.show"
                                  v-text="validation.education_field.text"
                            > </span>
                        </label>
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            استان محل تحصیل
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateEducationProvinceField"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شهر محل تحصیل
                        </span>
                        <select-cm :options="cities.education"
                                   placeholder="انتخاب کنید..." ref="educationCity"
                                   @onChange="updateEducationCityField" :disabled="!form.education_province_id"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="c-card__label font-sm font-bold text-blue cursor-default">
                    اطلاعات شغل
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="c-card__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="c-card__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شغل
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'c-card__hasError': validation.job_title.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.job_title"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('job_title')"
                                   @blur="persianCharValidate('job_title', 'شغل')"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.job_title.show"
                                  v-text="validation.job_title.text"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <div class="c-card__field">
                    <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                        <input type="checkbox"
                               class="checkbox-square__input"
                               name="receive_email"
                               v-model="form.receive_email"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-sm font-medium rounded user-select-none">
                            عضویت در خبرنامه‌ی ایمیلی سامانه‌ی اهدای عضو
                        </span>
                    </label>
                </div>
                <div class="c-card__field">
                    <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold pointer-event-none">
                        <input type="checkbox"
                               class="checkbox-square__input"
                               name="receive_email"
                               :checked="form.password_change"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-sm font-medium rounded user-select-none">
                            شماره تلفن همراه به عنوان گذرواژه در نظر گرفته‌ و کاربر در اولین ورود ملزم به تغییر آن خواهد بود.
                        </span>
                    </label>
                </div>
                <div class="c-card__buttons w-full text-center">
                    <button class="c-card__button c-card__button--submit text-white font-sm font-bold rounded"
                            @click.prevent="onClickRegisterDonationCard"
                    >
                        ذخیره
                    </button>
                    <button class="c-card__button c-card__button--blue text-white font-sm font-bold rounded m-r-20"
                            @click.prevent="onClickSendToPrintProcessButton"
                    >
                        ذخیره و ارسال به صف چاپ فیزیکی کارت
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import {
        HasLength, Length, toEnglishDigits, OnlyPersianAlphabet,
        PostalCodeValidator, OnlyNumber, PhoneNumberValidator, EmailValidator, NationalCodeValidator
    } from '@vendor/plugin/helper';
    import CreateCardsService from '@services/service/CreateCards';
    import SelectCm from '@vendor/components/select/Index.vue';

    let MOUTH = [
        { id: 1,  name: 'فروردین' },
        { id: 2,  name: 'اردیبهشت' },
        { id: 3,  name: 'خرداد' },
        { id: 4,  name: 'تیر' },
        { id: 5,  name: 'مرداد' },
        { id: 6,  name: 'شهریور' },
        { id: 7,  name: 'مهر' },
        { id: 8,  name: 'آبان' },
        { id: 9,  name: 'آذر' },
        { id: 10, name: 'دی' },
        { id: 11, name: 'بهمن' },
        { id: 12, name: 'اسفند' },
    ];

    let Service = null;
    // 0520696042

    /**
     * TODO: Refactor methods
     */

    export default {
        name: "CreateCards",
        data: () => ({
            step: 1,
            isPending: false,
            form: {
                national_code: '',
                name: '',
                last_name: '',
                gender: '',
                father_name: '',
                identity_number: '',
                date_of_birth: '',
                province_of_birth: '',
                city_of_birth: '',
                event_id: '',
                email: '',
                mobile: '',
                current_province_id: '',
                current_city_id: '',
                current_address: '',
                phone: '',
                home_postal_code: '',
                last_education_degree: '',
                education_field: '',
                education_province_id: '',
                education_city_id: '',
                job_title: '',
                receive_email: false,
                password_change: true
            },
            date_of_birth_year: '',
            date_of_birth_month: '',
            date_of_birth_day: '',
            validation: {
                national_code: { text: '', show: false },
                name: { text: '', show: false },
                last_name: { text: '', show: false },
                father_name: { text: '', show: false },
                identity_number: { text: '', show: false },
                email: { text: '', show: false },
                mobile: { text: '', show: false },
                current_address: { text: '', show: false },
                phone: { text: '', show: false },
                home_postal_code: { text: '', show: false },
                education_field: { text: '', show: false },
                job_title: { text: '', show: false },
            },
            cities: { birth: {}, current: {}, education: {} },
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
            day: () => {
                let arr = [];
                for (let i = 1; i < 31; i ++) {
                    arr.push({
                        id: i,
                        name: i
                    })
                }
                return arr
            },
            month: () => {
                return MOUTH
            },
            year: () => {
                let arr = [];
                for (let i = 30; i < 82; i ++) {
                    arr.push({
                        id: parseFloat(('13' + i)),
                        name: parseFloat(('13' + i))
                    })
                }
                return arr
            },
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
            async 'form.education_province_id'( id ) {
                let response = await Service.getCityByProvincesId( id );
                if ( !!response ) this.$set(this.cities, 'education', response);
            },
        },
        methods: {
            setValidationError( name, text = '' ) {
                this.$set(this.validation, `${name}`, {text, show: true});
            },
            hiddenValidationError( name ) {
                this.$set(this.validation, `${name}`, {text: '', show: false});
            },
            nationalCodeValidate( name )  {
                let field = this.form[name];
                if (HasLength( field )) {
                    if (!NationalCodeValidator(toEnglishDigits( field )))
                        this.setValidationError(name, `فرمت کدملی اشتباه است.`);
                } else this.setValidationError(name, `فیلد کدملی ضروری است.`);
            },
            persianCharValidate(name, name_fa, required = false) {
                let field = this.form[name];
                if ( required ) {
                    if ( HasLength(field) ) {
                        if (!OnlyPersianAlphabet(field))
                           this.setValidationError(name, `${name_fa} را با حروف فارسی وارد نمایید.`);
                    } else this.setValidationError(name, `فیلد ${name_fa} ضروری است.`)
                } else {
                    if (HasLength(field) && !OnlyPersianAlphabet(field))
                        this.setValidationError(name, `${name_fa} را با حروف فارسی وارد نمایید.`);
                }
            },
            numberValidator(name, name_fa) {
                let field = this.form[name];
                if (HasLength( field ) && !OnlyNumber(toEnglishDigits(field)))
                    this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
            },
            emailValidator(name, name_fa) {
                let field = this.form[name];
                if (HasLength( field ) && !EmailValidator(toEnglishDigits(field)))
                    this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`)
            },
            mobileValidator(name, name_fa, required = false) {
                let field = this.form[name];
                if ( required ) {
                    if ( HasLength(field) ) {
                        if (!PhoneNumberValidator(toEnglishDigits(field)))
                           this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
                    } else this.setValidationError(name, `فیلد ${name_fa} ضروری است.`)
                } else {
                    if (HasLength( field ) && !PhoneNumberValidator(toEnglishDigits(field)))
                        this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
                }
            },
            phoneNumberValidate(name, name_fa) {
                let field = this.form[name];
                if ( HasLength( field ) ) {
                    if (!OnlyNumber(toEnglishDigits( field )) || Length( field ) !== 11)
                        this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
                }
            },
            postalCodeValidate(name, name_fa) {
                let field = this.form[name];
                if (HasLength( field ) && !PostalCodeValidator( field ))
                    this.setValidationError(name, `فرمت ${name_fa} اشتباه است.`);
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
            updateYearOfBirthDateField({ id }) {
                this.$set(this, 'date_of_birth_year', id);
                this.updateBirthDateField();
            },
            updateMonthOfBirthDateField({ id }) {
                this.$set(this, 'date_of_birth_month', id);
                this.updateBirthDateField();
            },
            updateDayOfBirthDateField({ id }) {
                this.$set(this, 'date_of_birth_day', id);
                this.updateBirthDateField();
            },
            updateBirthDateField() {
                let {
                    date_of_birth_year,
                    date_of_birth_month,
                    date_of_birth_day
                } = this;
                if ( !!date_of_birth_year && !!date_of_birth_month && !!date_of_birth_day )
                    this.$set(this.form, 'date_of_birth', Service.jalaaliToTimestamp(date_of_birth_year, date_of_birth_month, date_of_birth_day));
            },
            updateCurrentProvinceField({ id }) {
                this.$set(this.form, 'current_province_id', id);
                this.$set(this.form, 'current_city_id', '');
                this.$refs['currentCity']?.resetValue();
            },
            updateCurrentCityField({ id }) {
                this.$set(this.form, 'current_city_id', id);
            },
            updateEducationField({ id }) {
                this.$set(this.form, 'last_education_degree', id)
            },
            updateEducationProvinceField({ id }) {
                this.$set(this.form, 'education_province_id', id);
                this.$set(this.form, 'education_city_id', '');
                this.$refs['educationCity']?.resetValue();
            },
            updateEducationCityField({ id }) {
                this.$set(this.form, 'education_city_id', id);
            },
            async onClickCheckNationalCodeButton() {
                try {
                    this.$set(this.spinnerLoading, 'submit', true);
                    let result = await Service.validateUserNationalCode( this.form.national_code );
                    this.displayNotification(result, { type: 'success' });
                    this.$set(this, 'step', this.step + 1);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'submit', false);
                }
            },
            checkFormValidation() {
                try {
                    let findInvalidField = (
                        Object.values( this.validation )
                            .filter(({ show }) => show)
                    );
                    if ( HasLength( findInvalidField ) ) {
                        this.displayNotification(findInvalidField[0].text, {type: 'error'});
                        return false
                    }
                    return true;
                } catch (e) {}
            },
            async onClickRegisterDonationCard() {
                try {
                    this.$set(this.spinnerLoading, 'submit', true);
                    let formIsValid = this.checkFormValidation();
                    if ( formIsValid ) {
                        let result = await Service.registerDonationCard();
                        this.displayNotification(result, { type: 'success' });
                    }
                    this.pushRouter({ name: 'MANAGE_CARDS' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'submit', false);
                }
            },
            onClickSendToPrintProcessButton() {
                this.displayNotification('این قابلیت در حال حاضر فعال نمی‌باشد.', { type: 'warn' })
            }
        },
        created() {
            Service = new CreateCardsService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    //0520696042
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>