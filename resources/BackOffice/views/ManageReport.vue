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
                                       value="همه" :disabled="!clientUser.checked"
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
                                       value="همه" :disabled="!legateUser.checked"
                                       @onChange="onChangeLegateStatusField"
                            />
                        </div>
                    </div>
                </div>
                <button class="m-report__button m-report__button--submit block text-white font-base font-bold border border-solid rounded m-0-auto m-t-40"
                        :class="{ 'spinner-loading': isPending, 'pointer-event-none': (!clientUser.checked && !legateUser.checked) }"
                        @click.prevent="onClickFilterUserBy"
                        :disabled="!clientUser.checked && !legateUser.checked"
                >
                    ثبت
                </button>
                <template v-if="!shouldBeHideTable">
                    <div class="m-report__table w-full"
                         v-if="hasLength"
                    >
                        <p class="text-gray-200 font-sm font-bold cursor-default m-b-10">
                            تعداد کل کاربران یافت شده :
                            {{ pagination.total }}
                        </p>
                        <table class="table w-full block border border-solid rounded text-blue-800">
                            <thead class="table__header w-full">
                                <tr>
                                    <th class="m-report__tTh font-sm font-bold cursor-default text-center">
                                        ردیف
                                    </th>
                                    <th class="m-report__tTh font-sm font-bold cursor-default text-center">
                                        نام و نام خانوادگی
                                    </th>
                                    <th class="m-report__tTh font-sm font-bold cursor-default text-center">
                                        شماره موبایل
                                    </th>
                                    <th class="m-report__tTh font-sm font-bold cursor-default text-center">
                                        ایمیل
                                    </th>
                                    <th class="m-report__tTh font-sm font-bold cursor-default text-center">
                                        تاریخ تولد
                                    </th>
                                    <th class="m-report__tTh font-sm font-bold cursor-default text-center">
                                        شماره ملی
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="w-full">
                                <tr class="table__row"
                                     v-for="(item, index) in items"
                                >
                                    <td class="table__td font-xs font-medium cursor-default text-center flex-shrink-0"
                                         v-text="+index + 1"
                                    > </td>
                                    <td class="table__td font-xs font-medium cursor-default text-center flex-shrink-0"
                                         v-text="item.full_name"
                                    > </td>
                                    <td class="table__td font-xs font-medium cursor-default text-center flex-shrink-0"
                                         v-text="item.mobile"
                                    > </td>
                                    <td class="table__td font-xs font-medium cursor-default text-center flex-shrink-0"
                                         v-text="item.email"
                                    > </td>
                                    <td class="table__td font-xs font-medium cursor-default text-center flex-shrink-0"
                                         v-text="item.birth_of_day"
                                    > </td>
                                    <td class="table__td font-xs font-medium cursor-default text-center flex-shrink-0"
                                         v-text="item.national_code"
                                    > </td>
                                </tr>
                            </tbody>
                        </table>
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
                        <excel-cm :fields="fields" :fetch="getAllUserReport"
                                  class="text-center" className="m-report__button m-report__button--blue inline-block text-center text-white font-base font-bold rounded m-0-auto m-t-40 cursor-pointer"
                                  :isPending="excel.isPending"
                        />
                    </div>
                    <div class="m-report__table text-gray-200 font-sm font-bold text-center cursor-default"
                         v-else-if="!hasLength && !isPending"
                    >
                        کاربری با این مشخصات پیدا نشد.
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import { HasLength } from "@vendor/plugin/helper";
    import { CLIENT_ROLE_STATUS, ROLE_STATUS } from '@services/service/Roles';
    import ManageReportService from '@services/service/ManageReport';
    import TableCm from '@vendor/components/table/Index.vue';
    import DatePickerCm from '@components/DatePicker.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';
    import ExcelCm from '@components/Excel.vue';
    import Table from "../../vendor/components/table/Index";

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
            shouldBeHideTable: true,
            fields: {
                'نام': 'name',
                'نام خانوادگی': 'last_name',
                'شماره ملی': 'national_code',
                'تاریخ تولد': 'date_of_birth',
                'شماره موبایل': 'mobile',
                'ایمیل': 'email',
            },
        }),
        components: {Table, TableCm, SelectCm, DatePickerCm, PaginationCm, ExcelCm },
        computed: {
            ...mapState({
                items: ({ ManageReportStore }) => ManageReportStore.items,
                pagination: ({ ManageReportStore }) => ManageReportStore.pagination
            }),
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
                    this.$set(this, 'isPending', true);
                    this.$set(this, 'shouldBeHideTable', false);
                    await Service.getUserListFilterBy();
                    this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                } finally {
                    this.$set(this, 'isPending', false);
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
            async getAllUserReport() {
                try {
                    this.$set(this.excel, 'isPending', true);
                    return await Service.getAllUsersReport();
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