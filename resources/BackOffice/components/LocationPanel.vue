<template>
    <div class="language panel w-full block bg-white border-2 rounded-2 border-solid">
        <p class="panel__title font-sm font-bold text-blue cursor-default">
            زبان‌ها
        </p>
        <div class="language__item w-full flex items-center justify-between bg-white border border-solid rounded text-bayoux font-sm font-bold cursor-default user-select-none"
             :class="{ 'language__item--selected pointer-event-none': ( lang === 'fa' ) }"
        >
            فارسی
            <button class="language__btn font-sm font-light rounded text-center"
                    :class="[
                        ( lang === 'fa' ) ? 'language__btn--selected' : 'language__btn--not-selected text-bayoux',
                        {
                            'pointer-event-none': disabledFa
                        }
                    ]"
                    v-text="lang === 'fa' ? 'همین صفحه' : ( disabledFa ? disabledLabel : defaultLabel)"
                    @click.prevent="onClickPersianLangButton"
            > </button>
        </div>
        <div class="language__item w-full flex items-center justify-between bg-white border border-solid rounded text-bayoux font-sm font-bold cursor-default user-select-none"
             :class="{ 'language__item--selected pointer-event-none': ( lang === 'en' ) }"
        >
            انگلیسی
            <button class="language__btn font-sm font-light rounded text-center"
                    :class="[
                        ( lang === 'en' ) ? 'language__btn--selected' : 'language__btn--not-selected text-bayoux',
                        {
                            'pointer-event-none': disabledEn
                        }
                    ]"
                    v-text="lang === 'en' ? 'همین صفحه' : ( disabledEn ? disabledLabel : defaultLabel)"
                    @click.prevent="onClickEnglishLangButton"
            > </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LocationPanel",
        props: {
            lang: {
                type: String,
                required: true,
            },
            disabledEn: {
                type: Boolean,
                default: false
            },
            disabledFa: {
                type: Boolean,
                default: false
            },
            defaultLabel: {
                type: String,
                default: 'ایجاد'
            },
            disabledLabel: {
                type: String,
                default: 'فعلاً وجود ندارد'
            }
        },
        methods: {
            onClickPersianLangButton() {
                this.$emit('onPersianLang');
            },
            onClickEnglishLangButton() {
                this.$emit('onEnglishLang');
            },
        }
    }
</script>