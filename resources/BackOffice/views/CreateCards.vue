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
                        @click.prevent="onClickCheckNationalCodeButton( form.national_code )"
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
                                   @focus="hideErrorMessage('father_name')"
                                   @blur="validatePersianCharacter('father_name', form.father_name, true)"
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
                                   @blur="validatePostalCode('work_postal_code', form.work_postal_code)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.home_postal_code.show"
                                  v-text="validation.home_postal_code.value"
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
                                   @focus="hideErrorMessage('education_field')"
                                   @blur="validatePersianCharacter('education_field', form.education_field)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.education_field.show"
                                  v-text="validation.education_field.value"
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
                                   @focus="hideErrorMessage('job_title')"
                                   @blur="validatePersianCharacter('job_title', form.job_title)"
                            >
                            <span class="c-card__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.job_title.show"
                                  v-text="validation.job_title.value"
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
                               :checked="true"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-sm font-medium rounded user-select-none">
                            شماره تلفن همراه به عنوان گذرواژه در نظر گرفته‌ و کاربر در اولین ورود ملزم به تغییر آن خواهد بود.
                        </span>
                    </label>
                </div>
                <div class="c-card__buttons w-full text-center">
                    <button class="c-card__button c-card__button--submit text-white font-sm font-bold rounded"
                            :class="{ 'spinner-loading': spinnerLoading.submit }"
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
        <transition name="fade">
            <div class="loading fixed w-full h-full z-10"
                 v-if="isPending"
            ></div>
        </transition>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import { HasLength, CopyOf } from '@vendor/plugin/helper';
    import RegisterFormService from '@services/service/RegisterForm';
    import CreateCardsService from '@services/service/CreateCards';
    import SelectCm from '@vendor/components/select/Index.vue';

    let Service = null, FormValidator = null;

    export default {
        name: "CreateCards",
        data: () => ({
            isPending: true,
            shouldBeShowInquiryStep: true,
            gender: RegisterFormService.gender,
            day: RegisterFormService.day,
            year: RegisterFormService.year,
            month: RegisterFormService.month,
            form: RegisterFormService.form,
            date_of_birth_year: '',
            date_of_birth_month: '',
            date_of_birth_day: '',
            validation: {
                name: {}, last_name: {}, father_name: {}, identity_number: {}, national_code: {}, date_of_birth: {},
                mobile: {}, email: {},
                current_address: {}, phone: {}, home_postal_code: {},
                education_field: {},
                job_title: {},
            },
            cities: { birth: {}, current: {}, education: {} },
            spinnerLoading: { submit: false },
            isModuleRegistered: false
        }),
        components: { SelectCm },
        computed: {
            ...mapState({
                provinces: ({ CreateCardsStore }) => CreateCardsStore.provinces,
                education: ({ CreateCardsStore }) => CreateCardsStore.education,
                events: ({ CreateCardsStore }) => CreateCardsStore.events,
                showInquiryStep: ({ CreateCardsStore }) => CreateCardsStore.authentication?.register_by_admin,
            }),
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
            async 'form.education_province_id'( id ) {
                let result = await RegisterFormService.getCityByProvincesId( id );
                this.$set(this.cities, 'education', result);
            },
        },
        methods: {
            setErrorMassage(field, value) {
                FormValidator.setErrorMassage = { field, value };
            },
            hideErrorMessage( field ) {
                FormValidator.hideErrorMassage( field );
            },
            validateNationalCode(field, value) {
                FormValidator.validateNationalCode(field, value);
            },
            validatePersianCharacter(field, value,  is_required = false) {
                FormValidator.validatePersianCharacter(field, value, is_required);
            },
            validateOnlyNumber(field, value, is_required = false) {
                FormValidator.validateOnlyNumber(field, value, is_required);
            },
            validateEmail(field, value, is_required = false) {
                FormValidator.validateEmail(field, value, is_required);
            },
            validateMobileNumber(field, value, is_required = false) {
                FormValidator.validateMobileNumber(field, value, is_required);
            },
            validatePhoneNumber(field, value, is_required = false) {
                FormValidator.validatePhoneNumber(field, value, is_required);
            },
            validatePostalCode(field, value, is_required = false) {
                FormValidator.validatePostalCode(field, value, is_required);
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
                let { date_of_birth_year, date_of_birth_month, date_of_birth_day } = this;
                const DATE = FormValidator.convertSolarHijriToTimestamp([
                    date_of_birth_year,
                    date_of_birth_month,
                    date_of_birth_day
                ]);
                this.$set(this.form, 'date_of_birth', DATE);
                console.log(this.form.date_of_birth);
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
            async onClickCheckNationalCodeButton( national_code ) {
                try {
                    this.validateNationalCode('national_code', national_code);
                    this.$set(this.spinnerLoading, 'submit', true);
                    let result = await Service.validateUserNationalCode( national_code );
                    this.displayNotification(result, { type: 'success' });
                    this.$set(this, 'shouldBeShowInquiryStep', false);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.spinnerLoading, 'submit', false);
                }
            },
            async onClickRegisterDonationCard() {
                try {
                    this.$set(this.spinnerLoading, 'submit', true);
                    const DUPLICATE_FORM = CopyOf( this.form );
                    FormValidator.checkRequiredField([
                        'name', 'last_name', 'gender', 'father_name', 'national_code', 'date_of_birth',
                        'mobile', 'current_province_id', 'current_city_id', 'last_education_degree',
                    ], DUPLICATE_FORM);
                    FormValidator.checkFromValidation( this.validation );
                    const REQUEST_PAYLOAD = RegisterFormService.createRequestPayload( DUPLICATE_FORM );
                    let result = await Service.registerDonationCard( REQUEST_PAYLOAD );
                    this.displayNotification(result, { type: 'success' });
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
            FormValidator = new RegisterFormService( this.validation );
            Service = new CreateCardsService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.$set(this, 'isPending', false);
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>