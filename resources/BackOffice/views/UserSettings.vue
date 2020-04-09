<template>
    <div class="p-account m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': isEditProfileTab }"
                            @click.prevent="onClickProfileTab"
                    >
                        مشخصات فردی
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': isPasswordTab }"
                            @click.prevent="onClickPasswordTab"
                    >
                        تغییر گذرواژه
                    </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': isCardTab }"
                            @click.prevent="onClickDonationCardTab"
                    >
                        کارت اهدای عضو
                    </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="w-full"
                     role="tabpanel" :aria-hidden="!isEditProfileTab"
                     v-show="isEditProfileTab"
                >
                    d
                </div>
                <div class="w-full"
                     role="tabpanel" :aria-hidden="!isPasswordTab"
                     v-show="isPasswordTab"
                >
                    <p class="p-account__label font-sm font-bold text-blue cursor-default">
                        تغییر گذرواژه
                    </p>
                    <form action="#"
                          class="p-account__c-form w-full block"
                    >
                        <label class="p-account__field w-full flex items-center">
                            <span class="p-account__p-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                                گذرواژه فعلی
                            </span>
                            <input type="password"
                                   placeholder="گذرواژه فعلی" autocomplete="off"
                                   v-model="password.current_password"
                                   class="p-account__input input input--blue w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr">
                        </label>
                        <label class="p-account__field w-full flex items-center">
                            <span class="p-account__p-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                                گذرواژه‌ی جدید
                            </span>
                            <input type="password"
                                   placeholder="حداقل هشت کاراکتر حساس به کوچکی و بزرگی حروف." autocomplete="off"
                                   v-model="password.password"
                                   class="p-account__input input input--blue w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr">
                        </label>
                        <label class="p-account__field w-full flex items-center">
                            <span class="p-account__p-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                                تکرار گذرواژه
                            </span>
                            <input type="password"
                                   placeholder="حداقل هشت کاراکتر حساس به کوچکی و بزرگی حروف" autocomplete="off"
                                   v-model="password.password_confirmation"
                                   class="p-account__input input input--blue w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr">
                        </label>
                        <button class="p-account__p-btn p-account__button p-account__button--submit block border border-solid rounded font-base font-bold text-center l:transition-bg"
                                :class="{ 'spinner-loading': password.isPending }"
                                @click.prevent="onClickChangeUserPasswordButton"
                        >
                            ذخیره
                        </button>
                    </form>
                </div>
                <div class="w-full"
                     role="tabpanel" :aria-hidden="!isCardTab"
                     v-show="isCardTab"
                >
                    <template v-if="true">
                        <div class="w-full block">
                            <p class="p-account__warn w-full font-sm font-medium border border-solid rounded text-center cursor-default">
                                شما در حال حاظر کارت اهدا عضو ندارید.
                            </p>
                            <p class="p-account__label font-sm font-bold text-blue cursor-default">
                                ثبت‌ نام کارت اهدا عضو
                            </p>
                            <div class="p-account__c-form w-full block">
                                <label class="p-account__field w-full flex items-center">
                                    <span class="p-account__c-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                                        نام
                                    </span>
                                    <input type="text"
                                           placeholder="نام کاربر" readonly="readonly" disabled="disabled"
                                           class="p-account__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1 direction-ltr">
                                </label>
                                <label class="p-account__field w-full flex items-center">
                                    <span class="p-account__c-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                                        کدملی
                                    </span>
                                    <input type="text"
                                           placeholder="کدملی کاربر" readonly="readonly" disabled="disabled"
                                           class="p-account__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1 direction-ltr">
                                </label>
                            </div>
                            <label class="checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold">
                                <input type="checkbox"
                                       class="checkbox-square__input"
                                       name="required_checkbox"
                                       v-model="cart.checkbox"
                                />
                                <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                                <span class="checkbox-square__label font-sm font-medium rounded user-select-none">
                                    مایلم اعضا و بافت‌های بدنم را در زمان مرگم اهدا کنم. باشد که ادامه‌ی زندگی اجزای وجودم، نجات بخش زندگی دیگری باشد.
                                </span>
                            </label>
                            <button class="p-account__c-btn p-account__button p-account__button--submit block border border-solid rounded font-base font-bold text-center l:transition-bg"
                                    :disabled="!cart.checkbox"
                                    @click.prevent="onClickRegisterDonationCardButton"
                            >
                                دریافت کارت اهدا
                            </button>
                        </div>
                    </template>
                    <template v-else>
                        <image-cm src="/images/test/test-image.png"
                                  alt="alt"
                                  className="block w-full rounded-inherit object-contain"
                                  class="block w-1/2 border border-solid border-sail rounded-1/2 m-0-auto"
                        />
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        HasLength
    } from "@vendor/plugin/helper";
    import UserSettingsService from '@services/service/UserSettings';
    import ImageCm from '@vendor/components/image/Index.vue';

    const PASSWORD_TAB = 'password';
    const DONATION_CARD_TAB = 'donation-card';

    let Service = null;

    export default {
        name: "UserSettings",
        data: () => ({
            password: {
                isPending: false,
                current_password: '',
                password: '',
                password_confirmation: '',
            },
            cart: {
                checkbox: true,
                isPending: false
            },
        }),
        components: {
            ImageCm
        },
        computed: {
            isEditProfileTab() {
                let { query } = this.$route;
                return !HasLength( query )
            },
            isPasswordTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.tab === PASSWORD_TAB
            },
            isCardTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.tab === DONATION_CARD_TAB
            }
        },
        methods: {
            /**
             * @param query { Object }
             */
            switchBetweenTabs( query  = {} ) {
                this.$router.push(
                    {
                        name: "USER_SETTING",
                        query
                    }).catch(err => {});
            },
            onClickProfileTab() {
                this.switchBetweenTabs({})
            },
            onClickPasswordTab() {
                this.switchBetweenTabs({
                    tab: PASSWORD_TAB
                })
            },
            onClickDonationCardTab() {
                this.switchBetweenTabs({
                    tab: DONATION_CARD_TAB
                })
            },
            async onClickChangeUserPasswordButton() {
                try {
                    let response = await Service.changeUserPassword( this.password );
                    this.displayNotification(response, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async onClickRegisterDonationCardButton() {
                try {
                    ( this.cart.checkbox ) ? (
                        await Service.registerDonationCardForUser()
                    ) : (
                        this.displayNotification('اول اون تیک رو بزن', { type: 'error' })
                    )
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            }
        },
        created() {
            Service = new UserSettingsService( this );
        }
    }
</script>