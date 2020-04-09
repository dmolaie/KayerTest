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
                               :class="{ 'e-user__has-error': validationErrors.name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('name')"
                                   @blur="persianCharValidate('name', 'نام', true)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.name.show"
                                  v-text="validationErrors.name.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                            نام خانوادگی
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.last_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.last_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('last_name')"
                                   @blur="persianCharValidate('last_name', 'نام خانوادگی', true)"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.last_name.show"
                                  v-text="validationErrors.last_name.text"
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
                                       value="0" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    آقا
                                </span>
                            </label>
                            <label class="w-1/3 input input--blue p-0 border border-r-0 border-l-0 border-solid cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       value="1" v-model="form.gender"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    خانم
                                </span>
                            </label>
                            <label class="w-1/3 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="gender" required="required" autocomplete="off"
                                       value="2" v-model="form.gender"
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
                               :class="{ 'e-user__has-error': validationErrors.father_name.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.father_name"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('father_name')"
                                   @blur="persianCharValidate('father_name', 'نام پدر')"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.father_name.show"
                                  v-text="validationErrors.father_name.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            شماره شناسنامه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.identity_number.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="فقط عدد"
                                   v-model="form.identity_number"
                                   @focus="hiddenValidationError('identity_number')"
                                   @blur="numberValidator('identity_number', 'شماره شناسنامه')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.identity_number.show"
                                  v-text="validationErrors.identity_number.text"
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
                                       label="name" :value="form.birth.day || ''"
                                       @onChange="updateDayOfBirthDateField"
                            />
                            <select-cm class="e-user__date--month w-1/3"
                                       :options="month"
                                       label="name" :value="form.birth.month || ''"
                                       @onChange="updateMonthOfBirthDateField"
                            />
                            <select-cm class="e-user__date--year w-1/3"
                                       :options="year"
                                       label="name" :value="form.birth.year || ''"
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
                                   :value="form.city_of_birth_name":disabled="!form.province_of_birth"
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
                                       value="0" v-model="form.marital_status"
                                />
                                <span class="e-user__radio--label w-full h-full block text-bayoux font-sm font-normal">
                                    مجرد
                                </span>
                            </label>
                            <label class="w-1/2 input input--blue p-0 border border-solid rounded rounded-tr-none rounded-br-none cursor-pointer">
                                <input type="radio"
                                       class="e-user__radio none"
                                       name="marital_status"
                                       value="1" v-model="form.marital_status"
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
                                   :value="form.event_name"
                                   label="name" :required="false"
                        />
                    </div>
                </div>
                <span class="e-user__divider w-full block"> </span>
                <p class="e-user__label font-sm font-bold text-blue cursor-default">
                    اطلاعات تماس
                </p>
                <div class="flex flex-wrap items-end">
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            ایمیل
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.email.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="حروف انگلیسی"
                                   v-model="form.email"
                                   @focus="hiddenValidationError('email')"
                                   @blur="emailValidator('email', 'ایمیل')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.email.show"
                                  v-text="validationErrors.email.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 text-required font-sm font-bold text-right cursor-default">
                            تلفن همراه
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن همراه ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.mobile"
                                   @focus="hiddenValidationError('mobile')"
                                   @blur="mobileValidator('mobile', 'تلفن همراه', true)"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.mobile.show"
                                  v-text="validationErrors.mobile.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن اضطراری
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.essential_mobile.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن اضطراری ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.essential_mobile"
                                   @focus="hiddenValidationError('essential_mobile')"
                                   @blur="mobileValidator('essential_mobile', 'تلفن اضطراری')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.essential_mobile.show"
                                  v-text="validationErrors.essential_mobile.text"
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
                               :class="{ 'e-user__has-error': validationErrors.current_address.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.current_address"
                                   placeholder="حروف فارسی"
                                   @focus="hiddenValidationError('current_address')"
                                   @blur="persianCharValidate('current_address', 'نشانی منزل')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.current_address.show"
                                  v-text="validationErrors.current_address.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.phone.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن محل سکونت ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.phone"
                                   @focus="hiddenValidationError('phone')"
                                   @blur="phoneNumberValidate('phone', 'تلفن محل سکونت')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.phone.show"
                                  v-text="validationErrors.phone.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            کد‌پستی محل سکونت
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.home_postal_code.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.home_postal_code"
                                   placeholder="کد پستی ۱۰ رقمی خود را بدون خط تیره وارد نمایید"
                                   @focus="hiddenValidationError('home_postal_code')"
                                   @blur="postalCodeValidate('home_postal_code', 'کد‌پستی محل سکونت')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.home_postal_code.show"
                                  v-text="validationErrors.home_postal_code.text"
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
                               :class="{ 'e-user__has-error': validationErrors.education_field.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.education_field"
                                   placeholder="حروف فارسی"
                                   @focus="hiddenValidationError('education_field')"
                                   @blur="persianCharValidate('education_field', 'رشته تحصیلی')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.education_field.show"
                                  v-text="validationErrors.education_field.text"
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
                               :class="{ 'e-user__has-error': validationErrors.job_title.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.job_title"
                                   placeholder="حروف فارسی"
                                   @focus="hiddenValidationError('job_title')"
                                   @blur="persianCharValidate('job_title', 'شغل')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.job_title.show"
                                  v-text="validationErrors.job_title.text"
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
                         :class="{ 'e-user__has-error': validationErrors.address_of_work.show }"
                    >
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            نشانی محل کار
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.address_of_work.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="حروف فارسی"
                                   v-model="form.address_of_work"
                                   @focus="hiddenValidationError('address_of_work')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.address_of_work.show"
                                  v-text="validationErrors.address_of_work.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            تلفن محل کار
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.work_phone.show }"
                        >
                            <input type="text" autocomplete="off"
                                   placeholder="تلفن محل کار ۱۱ رقمی خود را وارد نمایید"
                                   v-model="form.work_phone"
                                   @focus="hiddenValidationError('work_phone')"
                                   @blur="phoneNumberValidate('work_phone', 'تلفن محل کار')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.work_phone.show"
                                  v-text="validationErrors.work_phone.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            کد‌پستی محل کار
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.work_postal_code.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.work_postal_code"
                                   placeholder="کد پستی ۱۰ رقمی خود را بدون خط تیره وارد نمایید"
                                   @focus="hiddenValidationError('work_postal_code')"
                                   @blur="postalCodeValidate('work_postal_code', 'کد‌پستی محل کار')"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.work_postal_code.show"
                                  v-text="validationErrors.work_postal_code.text"
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
                               :class="{ 'e-user__has-error': validationErrors.motivation_for_cooperation.show }"
                        >
                            <input type="text" autocomplete="off"
                                   v-model="form.motivation_for_cooperation"
                                   placeholder="حروف فارسی"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                                   @focus="hiddenValidationError('motivation_for_cooperation')"
                                   @blur="persianCharValidate('motivation_for_cooperation', 'انگیزه‌ی همکاری')"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.motivation_for_cooperation.show"
                                  v-text="validationErrors.motivation_for_cooperation.text"
                            > </span>
                        </label>
                    </div>
                    <div class="e-user__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                        <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                            فرصت همکاری
                        </span>
                        <label class="relative w-full block"
                               :class="{ 'e-user__has-error': validationErrors.day_of_cooperation.show }"
                        >
                            <input type="text" autocomplete="off"
                                   class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                                   v-model="form.day_of_cooperation"
                                   placeholder="تعداد روز در ماه"
                                   @focus="hiddenValidationError('day_of_cooperation')"
                                   @blur="dayOfCooperationValidate"
                            >
                            <span class="e-user__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"
                                  v-show="validationErrors.day_of_cooperation.show"
                                  v-text="validationErrors.day_of_cooperation.text"
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
                               name="field_of_activities"
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
                               name="password_change"
                               v-model="form.password_change"
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
    import {
        HasLength, Length, toEnglishDigits, OnlyPersianAlphabet, CopyOf,
        PostalCodeValidator, OnlyNumber, PhoneNumberValidator, EmailValidator
    } from "@vendor/plugin/helper";
    import SelectCm from '@vendor/components/select/Index.vue';
    import EditUserService from '@services/service/EditUsers';
    import DateService from '@vendor/plugin/date';

    let Service = null;

    let MOUTH = [
        {
            id: 1,
            name: 'فروردین'
        },
        {
            id: 2,
            name: 'اردیبهشت'
        },
        {
            id: 3,
            name: 'خرداد'
        },
        {
            id: 4,
            name: 'تیر'
        },
        {
            id: 5,
            name: 'مرداد'
        },
        {
            id: 6,
            name: 'شهریور'
        },
        {
            id: 7,
            name: 'مهر'
        },
        {
            id: 8,
            name: 'آبان'
        },
        {
            id: 9,
            name: 'آذر'
        },
        {
            id: 10,
            name: 'دی'
        },
        {
            id: 11,
            name: 'بهمن'
        },
        {
            id: 12,
            name: 'اسفند'
        },
    ];

    export default {
        name: "EditUsers",
        data: () => ({
            cities: {
                birth: {},
                current: {},
                education: {},
                work: {},
            },
            form: {
                event_id: '',
                event_name: '',
                date_of_birth: String,
                birth: {day: '', month: '', year: ''},
                province_of_work: '',
                province_of_work_name: '',
                city_of_work: '',
                city_of_work_name: '',
                education_province_id: '',
                education_province_name: '',
                education_city_id: '',
                education_city_name: '',
                current_province_id: '',
                current_province_name: '',
                current_city_id: '',
                current_city_name: '',
                province_of_birth: '',
                province_of_birth_name: '',
                city_of_birth: '',
                city_of_birth_name: '',
                name: '',
                last_name: '',
                gender: '',
                marital_status: '',
                father_name: '',
                identity_number: '',
                national_code: '',
                email: '',
                mobile: '',
                essential_mobile: '',
                current_address: '',
                phone: '',
                home_postal_code: '',
                last_education_degree: '',
                education_field: '',
                job_title: '',
                address_of_work: '',
                work_phone: '',
                work_postal_code: '',
                know_community_by: '',
                motivation_for_cooperation: '',
                day_of_cooperation: '',
                field_of_activities: [],
                receive_email: false,
                password_change: false,
            },
            validationErrors: {
                name: { text: '', show: false },
                last_name: { text: '', show: false },
                father_name: { text: '', show: false },
                identity_number: { text: '', show: false },
                email: { text: '', show: false },
                mobile: { text: '', show: false },
                essential_mobile: { text: '', show: false },
                current_address: { text: '', show: false },
                phone: { text: '', show: false },
                home_postal_code: { text: '', show: false },
                education_field: { text: '', show: false },
                job_title: { text: '', show: false },
                address_of_work: { text: '', show: false },
                work_phone: { text: '', show: false },
                work_postal_code: { text: '', show: false },
                day_of_cooperation: { text: '', show: false },
                motivation_for_cooperation: { text: '', show: false },
            },
            isPending: true,
            isModuleRegistered: false,
            shouldBeShowSpinnerLoading: false,
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
            async 'form.province_of_work'( id ) {
                let response = await Service.getCityByProvincesId( id );
                if ( !!response ) this.$set(this.cities, 'work', response);
            },
        },
        components: {
            SelectCm
        },
        methods: {
            /**
             * TODO: re-factor validate functions
             */
            persianCharValidate(name, message, required = false) {
                let field = this.form[name];
                if ( required ) {
                    if ( HasLength(field) ) {
                        OnlyPersianAlphabet(field) ? (
                            this.hiddenValidationError( name )
                        ) : (
                            this.setValidationError(name, `${message} را با حروف فارسی وارد نمایید.`)
                        )
                    } else this.setValidationError(name, `فیلد ${message} ضروری است.`)
                } else {
                    if ( HasLength(field) ) {
                        ( OnlyPersianAlphabet(field) ) ? (
                            this.hiddenValidationError( name )
                        ) : (
                            this.setValidationError(name, `${message} را با حروف فارسی وارد نمایید.`)
                        )
                    } else this.hiddenValidationError( name );
                }
            },
            numberValidator(name, message) {
                let field = this.form[name];
                if ( HasLength( field ) ) {
                    OnlyNumber( field ) ? (
                        this.hiddenValidationError()
                    ) : (
                        this.setValidationError(name, `فرمت ${message} اشتباه است.`)
                    );
                } else this.hiddenValidationError();
            },
            phoneNumberValidate(name, message) {
                let field = this.form[name];
                if ( HasLength( field ) ) {
                    ( OnlyNumber( field ) && Length( field ) === 11 ) ? (
                        this.hiddenValidationError()
                    ) : (
                        this.setValidationError(name, `فرمت ${message} اشتباه است.`)
                    );
                } else this.hiddenValidationError();
            },
            mobileValidator(name, message, required = false) {
                let field = this.form[name];
                if ( required ) {
                    if ( HasLength(field) ) {
                        PhoneNumberValidator(field) ? (
                            this.hiddenValidationError( name )
                        ) : (
                            this.setValidationError(name, `${message} را با حروف فارسی وارد نمایید.`)
                        )
                    } else this.setValidationError(name, `فیلد ${message} ضروری است.`)
                } else {
                    if ( HasLength( field ) ) {
                        ( PhoneNumberValidator( field ) ) ? (
                            this.hiddenValidationError()
                        ) : (
                            this.setValidationError(name, `فرمت ${message} اشتباه است.`)
                        );
                    } else this.hiddenValidationError();
                }
            },
            postalCodeValidate(name, message) {
                let field = this.form[name];
                if ( HasLength( field ) ) {
                ( PostalCodeValidator( field ) ) ? (
                    this.hiddenValidationError()
                ) : (
                    this.setValidationError(name, `فرمت ${message} اشتباه است.`)
                );
                } else this.hiddenValidationError();
            },
            emailValidator(name, message) {
                let field = this.form[name];
                if ( HasLength( field ) ) {
                    ( EmailValidator( field ) ) ? (
                        this.hiddenValidationError()
                    ) : (
                        this.setValidationError(name, `فرمت ${message} اشتباه است.`)
                    );
                } else this.hiddenValidationError();
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
                let findItem = MOUTH.find(({name}) => name === month);
                let jm = !!findItem ? findItem.id : month;
                let date = DateService.jalaaliToTimestamp(parseInt(toEnglishDigits(year)), parseInt(toEnglishDigits(jm)), parseInt(toEnglishDigits(day)));
                this.$set(this.form, 'date_of_birth', date);
            },
            dayOfCooperationValidate() {
                let { day_of_cooperation } = this.form;
                ( HasLength( day_of_cooperation ) ) ? (
                    (
                        OnlyNumber( toEnglishDigits(day_of_cooperation) ) &&
                        /\b([1-9]|[12][0-9]|3[0])\b/.test( toEnglishDigits(day_of_cooperation) )
                    ) ? this.hiddenValidationError('day_of_cooperation') : (
                        this.setValidationError('day_of_cooperation', 'فرصت همکاری باید عددی بین ۱ تا ۳۰ باشد.')
                    )
                ) : (
                    this.hiddenValidationError('day_of_cooperation')
                )
            },
            setValidationError( name, text = '' ) {
                this.$set(this.validationErrors, `${name}`, {text, show: true});
            },
            hiddenValidationError( name ) {
                this.$set(this.validationErrors, `${name}`, {text: '', show: false});
            },
            checkFormValidation() {
                try {
                    let findInvalidField = (
                        Object.values( this.validationErrors )
                            .filter(({ show }) => show)
                    );
                    if ( HasLength( findInvalidField ) ) {
                        this.displayNotification(findInvalidField[0].text, {type: 'error'});
                        return false
                    }
                    return true;
                } catch (e) {}
            },
            async onClickSubmitButton() {
                try {
                    this.$set(this, 'shouldBeShowSpinnerLoading', true);
                    let formIsValid = this.checkFormValidation();
                    if ( formIsValid ) {
                        let response = await Service.SaveEditUserByAdmin();
                        this.displayNotification(response, {type: 'success'});
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, {type: 'error'});
                } finally {
                    this.$set(this, 'shouldBeShowSpinnerLoading', false);
                }
            },
            onClickDiscardButton() {
                this.pushRouter({ name: 'MANAGE_LEGATE' });
            }
        },
        created() {
            Service = new EditUserService( this );
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    this.$set(this, 'isPending', false);
                    this.$set(this, 'form', CopyOf( this.user ));
                })
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>