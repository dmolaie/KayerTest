<template>
    <div class="c-category c-post w-full">
        <div class="main w-full inner-box inner-box--white w-full rounded-2">
            <div class="flex flex-wrap items-end">
                <div class="c-category__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                    <span class="c-category__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                        نام فارسی
                    </span>
                    <label class="relative w-full block"
                    >
                        <input type="text" autocomplete="off"
                               placeholder="حروف فارسی" v-model="form.name_fa"
                               class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg"
                        >
                        <span class="c-category__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"

                        > </span>
                    </label>
                </div>
                <div class="c-category__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                    <span class="c-category__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                        نام انگلیسی
                    </span>
                    <label class="relative w-full block"
                    >
                        <input type="text" autocomplete="off"
                               placeholder="حروف انگلیسی" v-model="form.name_en"
                               class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                        >
                        <span class="c-category__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"

                        > </span>
                    </label>
                </div>
                <div class="c-category__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                    <span class="c-category__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                        نامک
                    </span>
                    <label class="relative w-full block"
                    >
                        <input type="text" autocomplete="off"
                               placeholder="حروف انگلیسی" v-model="form.slug"
                               class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr"
                        >
                        <span class="c-category__error error-message absolute w-full text-red font-xs font-bold pointer-event-none"

                        > </span>
                    </label>
                </div>
                <div class="c-category__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                    <span class="c-category__text block text-blue-800 font-sm font-bold text-right cursor-default">
                        وضعیت
                    </span>
                    <select-cm :options="status" label="name"
                               placeholder="انتخاب کنید..."
                               @onChange="changeStatusType"
                               value="فعال"
                    />
                </div>
                <div class="c-category__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                    <span class="c-category__text block text-required text-blue-800 font-sm font-bold text-right cursor-default">
                        دسته‌بندی
                    </span>
                    <select-cm :options="categories" label="name"
                               placeholder="انتخاب کنید..."
                               @onChange="changeCategoryType"
                    />
                </div>
                <div class="c-category__field w-1/3 xl:w-1/4 md:w-1/2 sm:w-full flex-shrink-0">
                    <span class="c-category__text block text-blue-800 font-sm font-bold text-right cursor-default">
                        دسته‌بندی مرتبط
                    </span>
                    <select-cm :options="categoryItems" label="name_fa" :required="false"
                               placeholder="انتخاب کنید..." :disabled="!form.type"
                               @onChange="changeParentId" ref="parentIdComboBox"
                    />
                </div>
            </div>
            <div class="c-category__buttons w-full text-center">
                <button class="c-category__button c-category__button--submit border border-solid rounded font-base font-bold text-center"
                        :class="{ 'spinner-loading': isPending }"
                        v-text="'ایجاد'" @click.prevent="onClickCreateCategory"
                > </button>
                <button class="c-category__button c-category__button--discard border border-solid rounded font-base font-bold text-center"
                        v-text="'انصراف'"
                        @click.prevent="onClickDiscardButton"
                > </button>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import CreateCategoryService from '@services/service/CreateCategory';
    import { CATEGORIES_TYPE } from '@services/service/ManageCategory';
    import SelectCm from '@vendor/components/select/Index.vue';

    let Service = null;

    export default {
        name: "CreateCategory",
        data: () => ({
            isPending: false,
            form: {
                slug: '',
                type: '',
                name_fa: '',
                name_en: '',
                parent_id: '',
                is_active: true,
            },
            status: {
                ['active']: { id: true, name: 'فعال' },
                ['inactive']: { id: false, name: 'غیرفعال' },
            },
            categories: {
                'news': {
                    name: 'اخبار',
                    id: CATEGORIES_TYPE['news']
                },
                'event': {
                    name: 'رویداد',
                    id: CATEGORIES_TYPE['event']
                },
                'article': {
                    name: 'صفحات ایستا',
                    id: CATEGORIES_TYPE['article']
                },
                'text': {
                    name: 'گالری متنی',
                    id: CATEGORIES_TYPE['text']
                },
                'image': {
                    name: 'گالری عکسی',
                    id: CATEGORIES_TYPE['image']
                },
                'video': {
                    name: 'گالری ویدیویی',
                    id: CATEGORIES_TYPE['video']
                },
                'voice': {
                    name: 'گالری صوتی',
                    id: CATEGORIES_TYPE['voice']
                },
            },
            isModuleRegistered: false
        }),
        components: { SelectCm },
        watch: {
            async 'form.type'( newVal ) {
                try {
                    if ( !!newVal ) await Service.getCategoriesFilterByType( newVal );
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            }
        },
        computed: mapState({
            categoryItems: ({ CreateCategory }) => CreateCategory.items
        }),
        methods: {
            changeStatusType({ id }) {
                this.$set(this.form, 'is_active', id);
            },
            changeCategoryType({ id }) {
                this.$set(this.form, 'type', id);
                this.resetParentIdComboBox();
            },
            resetParentIdComboBox() {
                this.changeParentId({ id: '' });
                this.$refs['parentIdComboBox']?.resetValue()
            },
            changeParentId({ id }) {
                this.$set(this.form, 'parent_id', id);
            },
            onClickDiscardButton() {
                this.pushRouter({ name: 'MANAGE_CATEGORY' });
            },
            async onClickCreateCategory() {
                try {
                    this.$set(this, 'isPending', true);
                    let result = await Service.createCategory();
                    this.displayNotification(result, { type: 'success' });
                    this.onClickDiscardButton();
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
                }
            },
        },
        created() {
            Service = new CreateCategoryService( this )
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>