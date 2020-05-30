<template>
    <div class="e-user c-post w-full">
        <div class="main w-full inner-box inner-box--white w-full rounded-2">
            <div class="e-user__container">
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات فردی
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            نام
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hideErrorMessage('name')"
                                   @blur="validatePersianCharacter('name', form.name, true)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.name.show"
                                  v-text="validation.name.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            نام خانوادگی
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.last_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.last_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hideErrorMessage('last_name')"
                                   @blur="validatePersianCharacter('last_name', form.last_name, true)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.last_name.show"
                                  v-text="validation.last_name.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
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
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            نام پدر
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.father_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.father_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hideErrorMessage('father_name')"
                                   @blur="validatePersianCharacter('father_name', form.father_name)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.father_name.show"
                                  v-text="validation.father_name.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شماره شناسنامه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.identity_number.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="فقط عدد"
                                   v-model="form.identity_number"
                                   @focus="hideErrorMessage('identity_number')"
                                   @blur="validateOnlyNumber('identity_number', form.identity_number)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.identity_number.show"
                                  v-text="validation.identity_number.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            کدملی
                        </span>
                        <label class="w-full block">
                            <input type="text" disabled="disabled" readonly="readonly"
                                   :value="form.national_code"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            تاریخ تولد
                        </span>
                        <div class="e-user__date w-full flex items-stretch text-center user-select-none">
                            <select-cm class="e-user__date--day w-1/3"
                                       :options="day"
                                       label="name" :value="form.birth && form.birth.day || ''"
                                       @onChange="updateDayOfBirthDateField"
                            />
                            <select-cm class="e-user__date--month w-1/3"
                                       :options="month"
                                       label="name" :value="form.birth && form.birth.month || ''"
                                       @onChange="updateMonthOfBirthDateField"
                            />
                            <select-cm class="e-user__date--year w-1/3"
                                       :options="year"
                                       label="name" :value="form.birth && form.birth.year || ''"
                                       @onChange="updateYearOfBirthDateField"
                            />
                        </div>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            استان محل تولد
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateProvinceOfBirthField"
                                   :value="form.province_of_birth_name"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شهر محل تولد
                        </span>
                        <select-cm :options="cities.birth"
                                   placeholder="انتخاب کنید..." ref="cityOfBirth"
                                   @onChange="updateCityOfBirthField"
                                   :value="form.city_of_birth_name" :disabled="!form.province_of_birth"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            وضعیت تاهل
                        </span>
                        <div class="w-full flex items-stretch text-center user-select-none">
                            <label class="w-1/2 input input--blue p-0 border border-solid rounded rounded-tl-none rounded-bl-none cursor-pointer border-l-0">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="marital_status"
                                       :value="marital_status['single']" v-model="form.marital_status"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    مجرد
                                </span>
                            </label>
                            <label class="w-1/2 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="marital_status"
                                       :value="marital_status['married']" v-model="form.marital_status"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    متاهل
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            رویداد
                        </span>
                        <select-cm :options="event"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateEventField"
                                   :value="form.event_name" :required="false"
                                   label="name" :searchable="true" :filterBy="handelEventFieldSearch"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <button class="e-user__download w-full text-bayoux border border-solid rounded font-sm font-medium"
                                :class="{ 'spinner-loading': shouldBeShowSpinnerVideo }"
                                :disabled="!form.has_video"
                                @click.prevent="onClickUserVideo( form.file_id )"
                        >
                            ویدیو ارسالی کاربر
                        </button>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات تماس
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            تلفن همراه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن همراه ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.mobile"
                                   @focus="hideErrorMessage('mobile')"
                                   @blur="validateMobileNumber('mobile', form.mobile, true)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.mobile.show"
                                  v-text="validation.mobile.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن اضطراری
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.essential_mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن اضطراری ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.essential_mobile"
                                   @focus="hideErrorMessage('essential_mobile')"
                                   @blur="validateMobileNumber('essential_mobile', form.essential_mobile)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.essential_mobile.show"
                                  v-text="validation.essential_mobile.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            ایمیل
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.email.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="حروف انگلیسی"
                                   v-model="form.email"
                                   @focus="hideErrorMessage('email')"
                                   @blur="validateEmail('email', form.email)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.email.show"
                                  v-text="validation.email.value"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات محل سکونت
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            استان محل سکونت
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateCurrentProvinceField"
                                   :value="form.current_province_name"
                                   label="name" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            شهر محل سکونت
                        </span>
                        <select-cm :options="cities.current"
                                   placeholder="انتخاب کنید..." ref="currentCity"
                                   @onChange="updateCurrentCityField"
                                   :value="form.current_city_name" :disabled="!form.current_province_id"
                                   label="name" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            نشانی منزل
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.current_address.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.current_address"
                                   placeholder="حروف فارسی"
                                   @focus="hideErrorMessage('current_address')"
                                   @blur="validatePersianCharacter('current_address', form.current_address, false)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.current_address.show"
                                  v-text="validation.current_address.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.phone.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن محل سکونت ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.phone"
                                   @focus="hideErrorMessage('phone')"
                                   @blur="validatePhoneNumber('phone', form.phone)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.phone.show"
                                  v-text="validation.phone.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            کد‌پستی محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.home_postal_code.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.home_postal_code"
                                   placeholder="کد پستی ۱۰ رقمی خود را بدون خط تیره وارد نمایید"
                                   @focus="hideErrorMessage('home_postal_code')"
                                   @blur="validatePostalCode('home_postal_code', form.home_postal_code)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.home_postal_code.show"
                                  v-text="validation.home_postal_code.value"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات تحصیلی
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            میزان تحصیلات
                        </span>
                        <select-cm :options="education"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateEducationField"
                                   :value="lastEducationValue"
                                   label="name" :required="false"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            رشته تحصیلی
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.education_field.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.education_field"
                                   placeholder="حروف فارسی"
                                   @focus="hideErrorMessage('education_field')"
                                   @blur="validatePersianCharacter('education_field', form.education_field)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.education_field.show"
                                  v-text="validation.education_field.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            استان محل تحصیل
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateEducationProvinceField"
                                   :value="form.education_province_name"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شهر محل تحصیل
                        </span>
                        <select-cm :options="cities.education"
                                   placeholder="انتخاب کنید..." ref="educationCity"
                                   @onChange="updateEducationCityField"
                                   :value="form.education_city_name" :disabled="!form.education_province_id"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات شغل
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شغل
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.job_title.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.job_title"
                                   placeholder="حروف فارسی"
                                   @focus="hideErrorMessage('job_title')"
                                   @blur="validatePersianCharacter('job_title', form.job_title)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.job_title.show"
                                  v-text="validation.job_title.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            استان محل کار
                        </span>
                        <select-cm :options="provinces"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateWorkProvinceField"
                                   :value="form.province_of_work_name"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شهر محل کار
                        </span>
                        <select-cm :options="cities.work"
                                   placeholder="انتخاب کنید..." ref="workCity"
                                   @onChange="updateWorkCityField"
                                   :value="form.city_of_work_name" :disabled="!form.province_of_work"
                                   label="name" :required="false" :searchable="true"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0"
                         :class="{ 'e-user__has-error': validation.address_of_work.show }"
                    >
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            نشانی محل کار
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.address_of_work.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="حروف فارسی"
                                   v-model="form.address_of_work"
                                   @focus="hideErrorMessage('address_of_work')"
                                   @blur="validatePersianCharacter('address_of_work', form.address_of_work, false)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.address_of_work.show"
                                  v-text="validation.address_of_work.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن محل کار
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.work_phone.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن محل کار ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.work_phone"
                                   @focus="hideErrorMessage('work_phone')"
                                   @blur="validatePhoneNumber('work_phone', form.work_phone)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.work_phone.show"
                                  v-text="validation.work_phone.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            کد‌پستی محل کار
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.work_postal_code.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.work_postal_code"
                                   placeholder="کد پستی ۱۰ رقمی خود را بدون خط تیره وارد نمایید"
                                   @focus="hideErrorMessage('work_postal_code')"
                                   @blur="validatePostalCode('work_postal_code', form.work_postal_code)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.work_postal_code.show"
                                  v-text="validation.work_postal_code.text"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات تکمیلی
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            نحوه آشنایی
                        </span>
                        <select-cm :options="knowCommunity"
                                   placeholder="انتخاب کنید..."
                                   @onChange="updateKnowCommunityField"
                                   :value="knowCommunityValue"
                                   label="name":required="false"
                        />
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            انگیزه‌ی همکاری
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.motivation_for_cooperation.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.motivation_for_cooperation"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hideErrorMessage('motivation_for_cooperation')"
                                   @blur="validatePersianCharacter('motivation_for_cooperation', form.motivation_for_cooperation)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.motivation_for_cooperation.show"
                                  v-text="validation.motivation_for_cooperation.value"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            فرصت همکاری
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validation.day_of_cooperation.show }"
                        >
                            <input type="text" autocomplete="off"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   v-model="form.day_of_cooperation"
                                   placeholder="تعداد روز در ماه"
                                   @focus="hideErrorMessage('day_of_cooperation')"
                                   @blur="validateDayOfCooperation('day_of_cooperation', form.day_of_cooperation)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validation.day_of_cooperation.show"
                                  v-text="validation.day_of_cooperation.value"
                            > </span>
                        </label>
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    درچه زمینه ای می توانید فعالیت کنید؟
                </p>
                <div class="flex flex-wrap items-end">
                    <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold"
                           v-for="(activity, index) in activities"
                           :key="'activity-' + index"
                    >
                        <input type="checkbox"
                               class="checkbox-square__input"
                               name="field_of_activities[]"
                               :value="activity.id"
                               v-model="form.field_of_activities"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-sm font-medium rounded user-select-none"
                              v-text="activity.name"
                        > </span>
                    </label>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <div class="w-full e-user__field p-r-0 p-l-0">
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
                <div class="w-full e-user__field p-r-0 p-l-0">
                    <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                        <input type="checkbox"
                               class="checkbox-square__input"
                               name="password_change" v-model="form.password_change"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-sm font-medium rounded user-select-none">
                            شماره‌ی تلفن همراه به عنوان گذرواژه در نظر گرفته شود.
                        </span>
                    </label>
                </div>
                <div class="e-user__buttons w-full text-center">
                    <button class="e-user__button e-user__button--submit border border-solid rounded font-base font-bold text-center l:transition-bg"
                            :class="{ 'spinner-loading': shouldBeShowSpinnerLoading }"
                            @click.prevent="onClickSubmitButton"
                            v-text="'ذخیره'"
                    > </button>
                    <button class="e-user__button e-user__button--discard border border-solid rounded font-base font-bold text-center l:transition-bg"
                            @click.prevent="onClickDiscardButton"
                    >
                        انصراف
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
    import {
        mapState
    } from 'vuex';
    import { toEnglishDigits,CopyOf } from "@vendor/plugin/helper";
    import SelectCm from '@vendor/components/select/Index.vue';
    import EditUserService from '@services/service/EditUsers';
    import RegisterFormService from '@services/service/RegisterForm';

    let Service = null, FormValidator = null;

    export default {
        name: "EditUsers",
        data: () => ({
            cities: { birth: {}, current: {}, education: {}, work: {} },
            form: RegisterFormService.form,
            validation: {
                name: {}, last_name: {}, father_name: {}, identity_number: {}, national_code: {}, date_of_birth: {},
                mobile: {}, essential_mobile: {}, email: {},
                current_address: {}, phone: {}, home_postal_code: {},
                education_field: {},
                job_title: {}, address_of_work: {}, work_phone: {}, work_postal_code: {},
                motivation_for_cooperation: {}, day_of_cooperation: {}
            },
            gender: RegisterFormService.gender,
            day: RegisterFormService.day,
            year: RegisterFormService.year,
            month: RegisterFormService.month,
            marital_status: RegisterFormService.marital_status,
            isPending: true,
            isModuleRegistered: false,
            shouldBeShowSpinnerLoading: false,
            shouldBeShowSpinnerVideo: false,
        }),
        computed: {
            ...mapState({
                user: ({ EditUserStore }) => EditUserStore.user,
                event: ({ EditUserStore }) => EditUserStore.event,
                education: ({ EditUserStore }) => EditUserStore.education,
                provinces: ({ EditUserStore }) => EditUserStore.provinces,
                activities: ({ EditUserStore }) => EditUserStore.activities,
                knowCommunity: ({ EditUserStore }) => EditUserStore.knowCommunity,
            }),
            lastEducationValue() {
                let { last_education_degree } = this.form;
                if ( typeof last_education_degree === 'number' ) return Object.values( this.education ).find(({ id }) => id === last_education_degree).name ?? '';
                return ''
            },
            knowCommunityValue() {
                let { know_community_by } = this.form;
                if ( typeof know_community_by === 'number' ) return Object.values( this.knowCommunity ).find(({ id }) => id === know_community_by).name ?? '';
                return ''
            },
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
            async 'form.province_of_work'( id ) {
                let result = await RegisterFormService.getCityByProvincesId( id );
                this.$set(this.cities, 'work', result);
            },
        },
        components: { SelectCm },
        methods: {
            setErrorMassage(field, value) {
                FormValidator.setErrorMassage = { field, value };
            },
            hideErrorMessage( field ) {
                FormValidator.hideErrorMassage( field );
            },
            validatePersianCharacter(field, value,  is_required = false) {
                FormValidator.validatePersianCharacter(field, value, is_required);
            },
            validateOnlyNumber(field, value, is_required = false) {
                FormValidator.validateOnlyNumber(field, value, is_required);
            },
            validatePhoneNumber(field, value, is_required = false) {
                FormValidator.validatePhoneNumber(field, value, is_required);
            },
            validateMobileNumber(field, value, is_required = false) {
                FormValidator.validateMobileNumber(field, value, is_required);
            },
            validatePostalCode(field, value, is_required = false) {
                FormValidator.validatePostalCode(field, value, is_required);
            },
            validateEmail(field, value, is_required = false) {
                FormValidator.validateEmail(field, value, is_required);
            },
            validateDayOfCooperation(field, value) {
                FormValidator.validateDayOfCooperation(field, value);
            },
            updateEventField({ id }) {
                this.$set(this.form, 'event_id', id)
            },
            updateProvinceOfBirthField({ id }) {
                this.$set(this.form, 'province_of_birth', id);
                this.$set(this.form, 'city_of_birth', '');
                this.$set(this.form, 'city_of_birth_name', '');
                this.$refs['cityOfBirth']?.resetValue();
            },
            updateCityOfBirthField({ id }) {
                this.$set(this.form, 'city_of_birth', id);
            },
            updateCurrentProvinceField({ id }) {
                this.$set(this.form, 'current_province_id', id);
                this.$set(this.form, 'current_city_id', '');
                this.$set(this.form, 'current_city_name', '');
                this.$refs['currentCity']?.resetValue();
            },
            updateCurrentCityField({ id }) {
                this.$set(this.form, 'current_city_id', id);
            },
            updateEducationProvinceField({ id }) {
                this.$set(this.form, 'education_province_id', id);
                this.$set(this.form, 'education_city_id', '');
                this.$set(this.form, 'education_city_name', '');
                this.$refs['educationCity']?.resetValue();
            },
            updateEducationCityField({ id }) {
                this.$set(this.form, 'education_city_id', id);
            },
            updateEducationField({ id }) {
                this.$set(this.form, 'last_education_degree', id)
            },
            updateWorkProvinceField({ id }) {
                this.$set(this.form, 'province_of_work', id);
                this.$set(this.form, 'city_of_work', '');
                this.$set(this.form, 'city_of_work_name', '');
                this.$refs['workCity']?.resetValue();
            },
            updateWorkCityField({ id }) {
                this.$set(this.form, 'city_of_work', id);
            },
            updateKnowCommunityField({ id }) {
                this.$set(this.form, 'know_community_by', id);
            },
            updateYearOfBirthDateField({ id }) {
                this.$set(this.form.birth, 'year', id);
                this.updateBirthDateField();
            },
            updateMonthOfBirthDateField({ id }) {
                this.$set(this.form.birth, 'month', id);
                this.updateBirthDateField();
            },
            updateDayOfBirthDateField({ id }) {
                this.$set(this.form.birth, 'day', id);
                this.updateBirthDateField();
            },
            updateBirthDateField() {
                let {day, month, year} = this.form.birth;
                let findItem = RegisterFormService.month.find(({name}) => name === month);
                let jm = !!findItem ? findItem.id : month;
                const DATE = FormValidator.convertSolarHijriToTimestamp([
                    parseInt(toEnglishDigits(year)),
                    parseInt(toEnglishDigits(jm)),
                    parseInt(toEnglishDigits(day))
                ]);
                this.$set(this.form, 'date_of_birth', DATE);
            },
            async onClickSubmitButton() {
                try {
                    this.$set(this, 'shouldBeShowSpinnerLoading', true);
                    const DUPLICATE_FORM = CopyOf( this.form );
                    FormValidator.checkRequiredField([
                        'name', 'last_name', 'gender', 'national_code', 'date_of_birth', 'mobile',
                        'current_province_id', 'current_city_id'
                    ], DUPLICATE_FORM);
                    FormValidator.checkFromValidation( this.validation );
                    const REQUEST_PAYLOAD = RegisterFormService.createRequestPayload( DUPLICATE_FORM );
                    let response = await Service.SaveEditUserByAdmin( REQUEST_PAYLOAD );
                    this.displayNotification(response, {type: 'success'});
                    this.goBack();
                } catch ( exception ) {
                    this.displayNotification(exception, {type: 'error'});
                } finally {
                    this.$set(this, 'shouldBeShowSpinnerLoading', false);
                }
            },
            onClickDiscardButton() {
                this.goBack();
                // this.pushRouter({ name: 'MANAGE_LEGATE' });
            },
            async handelEventFieldSearch( search ) {
                try {
                    return await RegisterFormService.handelEventFieldSearch( search );
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            async onClickUserVideo( file_id ) {
                try {
                    if ( !file_id ) return false;
                    this.$set(this, 'shouldBeShowSpinnerVideo', true);
                    await Service.openUserVideo( file_id );
                } catch ( exception ) {
                    this.displayNotification(exception, {type: 'error'});
                } finally {
                    this.$set(this, 'shouldBeShowSpinnerVideo', false);
                }
            }
        },
        created() {
            FormValidator = new RegisterFormService( this.validation );
            Service = new EditUserService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.$set(this, 'isPending', false);
                    this.$set(this, 'form', CopyOf( this.user ));
                });
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>