<template>
    <div class="m-report m-post w-full">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap m-post__tab--active"
                            v-text="'کاربران'"
                    > </button>
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-report__row w-full">
                    <label class="m-report__checkbox checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold"
                           @click.prevent="toggleItem( clientUser )"
                    >
                        <input type="checkbox"
                               class="checkbox-square__input"
                               name="receive_email"
                               :checked="clientUser.checked"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-base font-bold rounded user-select-none"
                              v-text="'کاربر دارای کارت'"
                        > </span>
                    </label>
                    <div class="flex items-end">
                        <div class="m-report__column w-1/3">
                            <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                                بازه ثبت نام کاربران از...
                            </span>
                            <date-picker-cm type="date"
                                            displayFormat="dddd jDD jMMMM jYYYY"
                                            format="unix" placeholder="انتخاب کنید..."
                                            @onChange="onChangeClientStartDateField"
                                            :initialValue="todayTimestamp" :disabled="!clientUser.checked"
                                            :value="`${clientUser.start_date * 1e3 || ''}`"
                            />
                        </div>
                        <div class="m-report__column w-1/3">
                            <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                                تا...
                            </span>
                            <date-picker-cm type="date"
                                            displayFormat="dddd jDD jMMMM jYYYY"
                                            format="unix" placeholder="انتخاب کنید..."
                                            :min="`${clientUser.start_date * 1e3 || ''}`"
                                            :initialValue="todayTimestamp" @onChange="onChangeClientEndDateField"
                                            :disabled="!clientUser.start_date || !clientUser.checked" :value="`${clientUser.end_date * 1e3 || ''}`"
                            />
                        </div>
                        <div class="m-report__column w-1/3">
                            <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                                وضعیت کاربران...
                            </span>
                            <select-cm :options="clientUserStatus" label="name"
                                       placeholder="انتخاب کنید..." :disabled="!clientUser.checked"
                                       @onChange="onChangeClientStatusField"
                            />
                        </div>
                    </div>
                </div>
                <div class="m-report__row w-full">
                    <label class="m-report__checkbox checkbox-square relative flex items-center w-full cursor-pointer font-xs-bold"
                           @click.prevent="toggleItem( legateUser )"
                    >
                        <input type="checkbox"
                               class="checkbox-square__input"
                               name="receive_email"
                               :checked="legateUser.checked"
                        />
                        <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                        <span class="checkbox-square__label font-base font-bold rounded user-select-none"
                              v-text="'کاربر سفیر'"
                        > </span>
                    </label>
                    <div class="flex items-end">
                        <div class="m-report__column w-1/3">
                            <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                                بازه ثبت نام کاربر سفیر از...
                            </span>
                            <date-picker-cm type="date"
                                            displayFormat="dddd jDD jMMMM jYYYY"
                                            format="unix" placeholder="انتخاب کنید..."
                                            @onChange="onChangeLegateStartDateField"
                                            :initialValue="todayTimestamp" :disabled="!legateUser.checked"
                                            :value="`${legateUser.start_date * 1e3 || ''}`"
                            />
                        </div>
                        <div class="m-report__column w-1/3">
                            <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                                تا...
                            </span>
                            <date-picker-cm type="date"
                                            displayFormat="dddd jDD jMMMM jYYYY"
                                            format="unix" placeholder="انتخاب کنید..."
                                            :min="`${legateUser.start_date * 1e3 || ''}`"
                                            :initialValue="todayTimestamp" @onChange="onChangeLegateEndDateField"
                                            :disabled="!legateUser.start_date || !legateUser.checked" :value="`${legateUser.end_date * 1e3 || ''}`"
                            />
                        </div>
                        <div class="m-report__column w-1/3">
                            <span class="e-user__text block text-blue-800 font-sm font-bold text-right cursor-default">
                                وضعیت سفیران...
                            </span>
                            <select-cm :options="legateUserStatus" label="name"
                                       placeholder="انتخاب کنید..." :disabled="!legateUser.checked"
                                       @onChange="onChangeLegateStatusField"
                            />
                        </div>
                    </div>
                </div>
                <button class="m-report__button m-report__button--submit block text-white font-base font-bold rounded m-0-auto m-t-40"
                        :class="{ 'spinner-loading': isPending }"
                        @click.prevent="onClickFilterUserBy"
                >
                    ثبت
                </button>
                <div class="m-report__table w-full"
                     v-if="hasLength"
                >
                    <p class="text-gray-200 font-sm font-bold cursor-default m-b-10">
                        تعداد کل کاربران یافت شده :
                        5454
                    </p>
                    <table ref="table"
                           v-show="false"
                    >
                        <thead>
                            <tr>
                                <th>
                                    ردیف
                                </th>
                                <th>
                                    نام و نام خانوادگی
                                </th>
                                <th>
                                    شماره موبایل
                                </th>
                                <th>
                                    ایمیل
                                </th>
                                <th>
                                    تاریخ تولد
                                </th>
                                <th>
                                    شماره ملی
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in items">
                                <td v-text="+index + 1"
                                    class="text-center"
                                > </td>
                                <td v-text="item.full_name"
                                > </td>
                                <td v-text="item.mobile"
                                > </td>
                                <td v-text="item.email"
                                > </td>
                                <td v-text="item.birth_of_day"
                                > </td>
                                <td v-text="item.national_code"
                                > </td>
                            </tr>
                        </tbody>
                    </table>
                    <table-cm :data="items"
                              :isPending="isPending"
                    >
                        <template #head>
                            <div class="table__th font-sm font-bold cursor-default text-center">
                                ردیف
                            </div>
                            <div class="table__th table__th:l font-sm font-bold cursor-default text-center">
                                نام و نام خانوادگی
                            </div>
                            <div class="table__th flex-1 font-sm font-bold cursor-default text-center">
                                شماره موبایل
                            </div>
                            <div class="table__th table__th:l font-sm font-bold cursor-default text-center">
                                ایمیل
                            </div>
                            <div class="table__th flex-1 font-sm font-bold cursor-default text-center">
                                تاریخ تولد
                            </div>
                            <div class="table__th flex-1 font-sm font-bold cursor-default text-center">
                                شماره ملی
                            </div>
                        </template>
                        <template #body="{ data }">
                            <div class="table__row flex"
                                 v-for="(item, index) in data"
                            >
                                <div class="table__td font-xs font-medium cursor-default text-center"
                                     v-text="+index + 1"
                                ></div>
                                <div class="table__td table__td:l font-xs font-medium cursor-default text-center"
                                     v-text="item.full_name"
                                ></div>
                                <div class="table__td flex-1 font-xs font-medium cursor-default text-center"
                                     v-text="item.mobile"
                                ></div>
                                <div class="table__td table__td:l font-xs font-medium cursor-default text-center"
                                     v-text="item.email"
                                ></div>
                                <div class="table__td flex-1 font-xs font-medium cursor-default text-center"
                                     v-text="item.birth_of_day"
                                ></div>
                                <div class="table__td flex-1 font-xs font-medium cursor-default text-center"
                                     v-text="item.national_code"
                                ></div>
                            </div>
                        </template>
                    </table-cm>
                    <div class="w-full m-post__pagination"
                         v-if="!!Object.values(items)"
                    >
                        <pagination-cm :isPending="isPending"
                                       @input="onChangePagination"
                                       :currentPage="pagination.current_page"
                                       :total="pagination.total || 0"
                                       :key="'paginate-' + paginateKeyCounter"
                        />
                    </div>
                    <button class="m-report__button m-report__button--blue block text-white font-base font-bold rounded m-0-auto m-t-40"
                            :class="{ 'spinner-loading': (excel.isPending) }"
                            @click.prevent="exportAsExcel"
                    >
                        خروجی اکسل
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { HasLength } from "@vendor/plugin/helper";
    import { CLIENT_ROLE_STATUS, ROLE_STATUS } from '@services/service/Roles';
    import ManageReportService from '@services/service/ManageReport';
    import TableCm from '@vendor/components/table/Index.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';
    import exportExcel from '@vendor/plugin/excel';

    let Service = null;

    export default {
        name: "ManageReport",
        data: () => ({
            clientUser: {
                checked: true, start_date: '', end_date: '', status: ''
            },
            legateUser: {
                checked: true, start_date: '', end_date: '', status: ''
            },
            excel: { isPending: false },
            isPending: false,
            isModuleRegistered: false,
            paginateKeyCounter: 0,
            data: [
                {
                    full_name: 'محمد سلیمانیان',
                    mobile: '09013040633',
                    email: 'm_soleimanian@yahoo.com',
                    birth_of_day: '78/01/25',
                    national_code: '0521141966'
                },
                {
                    full_name: 'محمدرضا فرزام یار',
                    mobile: '۸۹۷۷ ۵۱۲ ۰۹۳۶',
                    email: 'Mohammad.farzam2014@jmail.com',
                    birth_of_day: '۶۵/۰۵/۱۳',
                    national_code: '۰۰۷۷۹۶۱۲۵۰'
                },
                {
                    full_name: 'امیرحامد پاینده',
                    mobile: '۹۳۸۷ ۲۳۶ ۰۹۱۱',
                    email: 'hamedpayandeh@gmail.com',
                    birth_of_day: '۵۹/۰۷/۰۱',
                    national_code: '۲۶۹۰۳۱۸۴۹۰'
                },
                {
                    full_name: 'محمدرضا فرزام یار',
                    mobile: '۸۹۷۷ ۵۱۲ ۰۹۳۶',
                    email: 'Mohammad.farzam2014@jmail.com',
                    birth_of_day: '۶۵/۰۵/۱۳',
                    national_code: '۰۰۷۷۹۶۱۲۵۰'
                },
                {
                    full_name: 'عاطفه قاسمیان',
                    mobile: '۲۳۸۳ ۰۱۹ ۰۹۱۳',
                    email: 'atefeh.ghasemian2383@gmail.com',
                    birth_of_day: '۷۴/۰۹/۱۹',
                    national_code: '۱۲۷۲۰۷۱۱۷۰'
                },
                {
                    full_name: 'بهاره خوش مهر',
                    mobile: '۵۰۱۴ ۹۶۱ ۰۹۱۲',
                    email: 'Baharkhoshmehe@gmail.com',
                    birth_of_day: '۶۶/۰۲/۰۱',
                    national_code: '۳۸۷۵۵۰۰۲۶۱'
                },
                {
                    full_name: 'سعید درجاتیانی',
                    mobile: '۵۷۴۳ ۹۰۱ ۰۹۱۵',
                    email: 'Darajatiansaeed@yahoo.com',
                    birth_of_day: '۵۶/۰۲/۰۹',
                    national_code: '۰۹۴۳۳۳۲۴۳۵'
                },
                {
                    full_name: 'عباس موذن',
                    mobile: '۵۶۷۴ ۲۱۵ ۰۹۱۱',
                    email: 'Abbasmoazen91@gmail.com',
                    birth_of_day: '۶۰/۰۶/۲۷',
                    national_code: '۲۱۶۲۳۷۰۵۱۴'
                },
                {
                    full_name: 'سویل قبادی',
                    mobile: '۶۲۲۷ ۹۲۳ ۰۹۰۳',
                    email: 'Sevilhobadi@gmail.com',
                    birth_of_day: '۸۰/۰۸/۲۰',
                    national_code: '۵۰۴۰۴۷۹۲۳۹'
                },
                {
                    full_name: 'برزین علیجانی',
                    mobile: '۶۵۳۰ ۰۶۶ ۰۹۳۶',
                    email: 'Barzin_alijani@gmail.com',
                    birth_of_day: '۶۷/۱۲/۲۴',
                    national_code: '۲۱۹۰۰۰۳۹۱۱'
                }
            ],
            items: {},
        }),
        components: { TableCm, SelectCm, DatePickerCm, PaginationCm },
        computed: {
            clientUserStatus() {
                return {
                    ['all']: { id: '', name: 'همه' },
                    ...CLIENT_ROLE_STATUS
                }
            },
            legateUserStatus() {
                return {
                    ['all']: { id: '',  name: 'همه' },
                    ...ROLE_STATUS
                }
            },
            todayTimestamp() {
                const DATE = Date.now();
                return ''.concat( DATE );
            },
            hasLength() {
                return HasLength( this.items )
            },
        },
        methods: {
            toggleItem( item ) {
                this.$set(item, 'checked', !item['checked']);
            },
            onChangeClientStartDateField( unix ) {
                this.$set(this.clientUser, 'start_date', unix);
                this.$set(this.clientUser, 'end_date', '');
            },
            onChangeClientEndDateField( unix ) {
                this.$set(this.clientUser, 'end_date', unix);
            },
            onChangeClientStatusField({ id }) {
                this.$set(this.clientUser, 'status', id);
            },
            onChangeLegateStartDateField( unix ) {
                this.$set(this.legateUser, 'start_date', unix);
                this.$set(this.legateUser, 'end_date', '');
            },
            onChangeLegateEndDateField( unix ) {
                this.$set(this.legateUser, 'end_date', unix);
            },
            onChangeLegateStatusField({ id }) {
                this.$set(this.legateUser, 'status', id);
            },
            async onClickFilterUserBy() {
                try {
                    this.items = { ...this.data };
                    await Service.getUserListFilterBy();
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            onChangePagination( page ){
                try {
                    this.backToTop();
                    this.$set(this, 'isPending', true);
                    Service.handelPagination( page )
                        .then(this.$nextTick)
                        .then(() => {
                            setTimeout(() => {
                                this.$set(this, 'isPending', false)
                            }, 70);
                        });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            async exportAsExcel() {
                try {
                    this.$set(this.excel, 'isPending', true);
                    await exportExcel( this.$refs['table'] )
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.excel, 'isPending', false);
                }
            }
        },
        created() {
            Service = new ManageReportService( this );
        }
    }
</script>