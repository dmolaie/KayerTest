<template>
    <div class="m-legate m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch">
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': isAllUserTab }"
                            @click.prevent="onClickAllUserTab"
                            v-text="'همه'"
                    > </button>
                    <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': isLegateTab }"
                            @click.prevent="onClickLegateUserTab"
                            v-text="'سفیران اهدای عضو'"
                    > </button>
                    <!-- <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                            :class="{ 'm-post__tab--active': isRecycleTab }"
                            @click.prevent="onClickRecycleUserTab"
                            v-text="'زباله‌دان'"
                    > </button> -->
                </div>
            </div>
            <div class="m-post__wrapper">
                <div class="m-post__header flex justify-end">
                    <div class="m-post__button--added relative"
                         v-show="isLegateTab"
                    >
                        <router-link :to="{ name: 'CREATE_LEGATE' }"
                                     class="m-post__button inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                        >
                            <svg viewBox="0 0 24 24" id="icon--remove">
                                <path d="M20.485 3.511A12.01 12.01 0 1024 12a12.009 12.009 0 00-3.515-8.489zm-1.767 15.21A9.51 9.51 0 1121.5 12a9.508 9.508 0 01-2.782 6.721z" />
                                <path d="M16.987 7.01a1.275 1.275 0 00-1.8 0l-3.177 3.177L8.829 7.01a1.277 1.277 0 00-1.805 1.806l3.176 3.177-3.176 3.178a1.277 1.277 0 001.805 1.806l3.176-3.177 3.177 3.178a1.277 1.277 0 001.8-1.806l-3.176-3.178 3.176-3.177a1.278 1.278 0 00.005-1.807z" />
                            </svg>
                            افزودن به سفیران
                        </router-link>
                    </div>
                    <button class="m-post__button m-post__button--search inline-flex items-center justify-center font-sm font-bold bg-white border border-solid rounded-10 l:transition-bg"
                            @click.prevent="onClickToggleSearchButton"
                    >
                        جست‌وجو
                    </button>
                </div>
                <div class="w-full"
                     v-if="shouldBeShowSearchField"
                >
                    <label class="w-3/4 flex items-stretch m-post__search border border-solid rounded">
                        <span class="m-post__search_label flex-shrink-0 rounded rounded-tl-none rounded-bl-none"
                        > </span>
                        <input type="text"
                               placeholder="جست‌وجو براساس کدملی و نام‌کاربر..."
                               class="m-post__search_input bg-transparent flex-1 font-base font-bold"
                               v-model="filter.search"
                               @input="oninputSearchField"
                        />
                    </label>
                </div>
                <div class="m-post__table">
                    <table-cm :data="items"
                              :isPending="isPending"
                    >
                        <template #head>
                            <div class="table__th"></div>
                            <div class="table__th font-1xs font-bold cursor-default text-center">
                                نمایه
                            </div>
                            <div class="table__th table__td:l font-1xs font-bold cursor-default text-center">
                                نام
                            </div>
                            <div class="table__th table__td:l font-1xs font-bold cursor-default text-center">
                                شغل و تحصیلات
                            </div>
                            <div class="table__th table__th:l font-1xs font-bold cursor-default text-center">
                                نقش کاربری
                            </div>
                            <div class="table__th flex-1 font-1xs font-bold cursor-default text-center">
                                عملیات
                            </div>
                        </template>
                        <template #body="{ data }">
                            <div class="table__row flex"
                                 v-for="(item, index) in data"
                                 :key="'table-' + index"
                            >
                                <div class="table__td inline-flex items-center justify-center">
                                    <label class="cursor-pointer">
                                        <input type="checkbox"
                                               :value="item.id"
                                               class="none"
                                        />
                                        <span class="table__checkbox block relative border border-solid rounded-1/2 bg-white"
                                        > </span>
                                    </label>
                                </div>
                                <div class="table__td">
                                    <image-cm :src="item.avatar"
                                              :alt="item.name"
                                              :lazyLoading="true"
                                              objectFit="cover"
                                              className="table__image w-full h-full rounded-50"
                                              class="table__cover border border-solid rounded-50"
                                    />
                                </div>
                                <div class="table__td table__td:l flex flex-col cursor-default">
                                    <button class="text-blue-800 font-xs font-bold text-right l:transition-color l:hover:text-blue--200"
                                            v-text="item.full_name"
                                            @click.stop="onClickShowUserInfoModal( item.id )"
                                    > </button>
                                    <div class="w-full flex flex-wrap items-end">
                                        <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs m-b-0"
                                              :class="[ item.has_cart ? 'm-post__status--published' : 'm-post__status--recycle m-legate__status--recycle' ]"
                                        >
                                            {{ item.has_cart ? 'دارای' : 'بدون' }}
                                             کارت اهدا
                                        </span>
                                        <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white text-blue-100 font-1xs m-b-0"
                                              v-if="item.has_cart"
                                              v-text="'شناسه کارت: ' + item.card_id"
                                        > </span>
                                        <span class="m-legate__status m-legate__status--video m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs m-b-0"
                                              v-text="'ویدیو'"
                                              v-if="item.has_video"
                                        > </span>
                                    </div>
                                </div>
                                <div class="table__td table__td:l inline-flex flex-wrap flex-col items-center justify-center">
                                    <span class="block font-xs cursor-default text-right m-b-10"
                                          v-if="!!item.job_title"
                                          v-text="item.job_title"
                                    > </span>
                                    <span class="m-legate__location block font-xs cursor-default text-right"
                                          v-text="item.location"
                                    > </span>
                                </div>
                                <div class="table__td table__td:l inline-flex flex-wrap items-center justify-center">
                                    <div class="flex flex-wrap items-start cursor-default"
                                    >
                                        <button class="m-legate__role m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white font-1xs"
                                                v-for="(role, i) in item.roles"
                                                :key="'status-' + i"
                                                :class="{
                                                    'm-post__status--accept': role.is_active,
                                                    'm-post__status--reject': role.is_inactive,
                                                    'm-post__status--delete': role.is_deleted,
                                                    'm-post__status--pending': (role.is_pending || role.is_wait_exam || role.is_wait_document),
                                                    'cursor-default pointer-event-none': !role.is_legate
                                                }"
                                                @click.stop="onClickShowUserAccessLevelModal(role, item.id, item.full_name)"
                                        >
                                            {{ role.label }}: {{ role.status_fa }}
                                        </button>
                                    </div>
                                </div>
                                <div class="table__td flex-1 inline-flex items-center justify-center">
                                    <div class="relative w-full flex items-center justify-center">
                                        <button class="table__button block text-blue-800 font-1xs font-bold bg-white border border-solid rounded text-center"
                                                @click.stop="onClickActionButton( item )"
                                                v-text="'عملیات'"
                                                :disabled="!isAdmin"
                                        > </button>
                                        <dropdown-cm :visibility="item.is_opened"
                                                     :clickOutside="true"
                                                     @onClickOutside="onClickActionButton( item )"
                                                     class="table__dropdown"
                                        >
                                            <template v-if="isAdmin">
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        @click.stop="onClickEditUserButton( item.id )"
                                                        v-text="'ویرایش اطلاعات'"
                                                > </button>
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        @click.stop="onClickManageUserRoleButton( item )"
                                                        v-text="'نقش کاربری'"
                                                > </button>
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        @click.stop="onClickChangeUserPassword( item )"
                                                        v-text="'تغییر گذرواژه'"
                                                > </button>
                                                <span class="dropdown__divider"> </span>
                                                <button class="dropdown__item block w-full text-bayoux font-1xs font-medium text-right text-nowrap"
                                                        @click="onClickBlockUserButton( item )"
                                                        v-text="'مسدود سازی'"
                                                > </button>
                                            </template>
                                        </dropdown-cm>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </table-cm>
                </div>
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
            </div>
        </div>
        <modal-cm ref="accessLevel"
                  @close="onClickCloseUserAccessLevelModal"
        >
            <div class="confirm p-confirm r-confirm modal__body w-full bg-white rounded">
                <div class="modal__header confirm__header flex items-center justify-between rounded-inherit rounded-bl-none rounded-br-none">
                    <span class="text-blue-800 font-base font-bold cursor-default">
                         سطح دسترسی
                    </span>
                    <button class="confirm__button relative"
                            @click.prevent="onClickCloseUserAccessLevelModal"
                    > </button>
                </div>
                <div class="modal__content confirm__content">
                    <template v-if="accessLevel.isPending">
                        <p class="confirm__pending text-gray-200 font-base font-bold text-center cursor-default">
                            <span class="confirm__spinner spinner-loading"> </span>
                            در حال دریافت اطلاعات...
                        </p>
                    </template>
                    <div v-else
                         class="p-confirm__container cursor-default"
                    >
                        <div class="p-confirm__tabs inline-flex items-stretch min-w-full">
                            <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                                    :class="{ 'm-post__tab--active': (accessLevel.tab === 1) }"
                                    v-text="'کاربر'"
                                    @click.prevent="onClickPermissionTabs( 1 )"
                            > </button>
                            <button class="m-post__tab relative font-sm font-bold transition-bg text-nowrap"
                                    :class="{ 'm-post__tab--active': (accessLevel.tab === 2) }"
                                    v-text="'مدیریت محتوا'"
                                    @click.prevent="onClickPermissionTabs( 2 )"
                            > </button>
                        </div>
                        <div class="p-confirm__body w-full block">
                            <template v-if="accessLevel.tab === 1">
                                <p class="confirm__label w-full text-bayoux font-base font-bold"
                                   v-text="selectedItem.full_name"
                                > </p>
                                <p class="confirm__label w-full flex items-center">
                                    <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                        نقش کاربری:
                                    </span>
                                    <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                          v-text="selectedItem.label"
                                    > </span>
                                </p>
                                <div class="confirm__label w-full flex items-center m-20-0">
                                    <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                        وضعیت
                                    </span>
                                    <div class="flex-1 p-0-15">
                                        <select-cm :options="rolesStatus"
                                                   label="name" class="w-1/3"
                                                   :value="selectedItem.status_fa"
                                                   @onChange="changeUserRoleStatus($event, selectedItem.user_id, selectedItem.id)"
                                        />
                                    </div>
                                </div>
                            </template>
                            <template v-if="accessLevel.tab === 2">
                                <permissions-cm :data="permissions"
                                                ref="permissions"
                                />
                            </template>
                        </div>
                    </div>
                </div>
                <div class="modal__footer confirm__footer w-full text-left"
                     v-if="accessLevel.tab === 2"
                >
                    <button class="confirm__f-button confirm__f-button--submit font-base font-medium rounded text-center l:transition-bg"
                            :class="{ 'spinner-loading': ( accessLevel.shouldBeShowSpinner ) }"
                            @click.prevent="onClickAssignUserPermission(selectedItem.user_id, selectedItem.id)"
                            v-text="'تایید'"
                    > </button>
                    <button class="confirm__f-button confirm__f-button--discard font-base font-medium rounded text-center l:transition-bg"
                            @click.prevent="onClickCloseUserAccessLevelModal"
                            v-text="'انصراف'"
                    > </button>
                </div>
            </div>
        </modal-cm>
        <modal-cm ref="userInfo"
                  @close="onClickCloseUserInformationModal"
        >
            <div class="confirm r-confirm modal__body w-full bg-white rounded">
                <div class="modal__header confirm__header flex items-center justify-between rounded-inherit rounded-bl-none rounded-br-none">
                    <span class="text-blue-800 font-base font-bold cursor-default">
                         اطلاعات کاربر
                    </span>
                    <button class="confirm__button relative"
                            @click.prevent="onClickCloseUserInformationModal"
                    > </button>
                </div>
                <div class="modal__content confirm__content">
                    <template v-if="userInfo.isPending">
                        <p class="confirm__pending text-gray-200 font-base font-bold text-center cursor-default">
                            <span class="confirm__spinner spinner-loading"> </span>
                            در حال دریافت اطلاعات...
                        </p>
                    </template>
                    <div v-else
                         class="confirm__container cursor-default"
                    >
                        <p class="confirm__label w-full text-bayoux font-base font-bold"
                           v-text="userInfo.data.full_name"
                        > </p>
                        <p class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                تلفن همراه:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.mobile"
                            > </span>
                        </p>
                        <p class="confirm__label w-full flex items-center"
                           v-if="!!userInfo.data.email"
                        >
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                ایمیل:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.email"
                            > </span>
                        </p>
                        <span class="confirm__divider w-full block"> </span>
                        <p class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                کد ملی:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.national_code"
                            > </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-if="!!userInfo.data.identity_number"
                                  v-text="`(شماره شناسنامه: ${userInfo.data.identity_number})`"
                            > </span>
                        </p>
                        <p class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                تولد:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.date_of_birth.fa"
                            > </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.province_of_birth.name"
                            > </span>
                        </p>
                        <p class="confirm__label w-full flex items-center"
                           v-if="typeof userInfo.data.last_education_degree === 'number'"
                        >
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                تحصیلات:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="lastEducationValue"
                            > </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.education_field"
                            > </span>
                        </p>
                        <p class="confirm__label w-full flex items-center"
                           v-if="!!userInfo.data.phone || !!userInfo.data.current_address"
                        >
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                محل سکونت:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-if="!!userInfo.data.phone"
                                  v-text="userInfo.data.phone"
                            > </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-if="!!userInfo.data.current_address"
                                  v-text="userInfo.data.current_address"
                            > </span>
                        </p>
                        <template v-if="!!userInfo.data.field_of_activities.length || !!userInfo.data.day_of_cooperation">
                            <span class="confirm__divider w-full block"> </span>
                            <div class="confirm__label w-full flex items-start">
                                <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                    حوزه‌های فعالیت:
                                </span>
                                <div class="text-blue-700 font-xs font-bold flex-1">
                                    <span class="w-full block p-0-15"
                                          v-if="!!userInfo.data.field_of_activities.length"
                                    >
                                        {{ selectedActivity.join('، ') }}
                                    </span>
                                    <span class="w-full block p-0-15"
                                          v-if="!!userInfo.data.day_of_cooperation"
                                          :class="{'m-b-6': !userInfo.data.field_of_activities.length}"
                                          v-text="`فرصت همکاری: ${userInfo.data.day_of_cooperation}`"
                                    > </span>
                                </div>
                            </div>
                        </template>
                        <span class="confirm__divider w-full block"> </span>
                        <div class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                 نقش کاربری:
                            </span>
                            <div class="inline-flex flex-wrap items-start flex-1">
                                <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white text-blue-100 font-xs"
                                      v-for="(role, index) in userInfo.data.roles"
                                      :key="'r-' + index"
                                      v-text="role.label"
                                > </span>
                                <span class="m-legate__status m-post__status inline-flex items-center border border-solid rounded bg-white text-blue-100 font-xs"
                                      v-if="userInfo.data.has_card"
                                >
                                    کارت اهدای عضو
                                </span>
                            </div>
                        </div>
                        <span class="confirm__divider w-full block"> </span>
                        <div class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                عضویت:
                            </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15"
                                  v-text="userInfo.data.created_at.fa"
                            > </span>
                            <span class="text-blue-700 font-xs font-bold flex-1 p-0-15">
                                به‌روز‌رسانی {{ userInfo.data.updated_at.fa }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </modal-cm>
        <modal-cm ref="userRole"
                  @close="onClickCloseManageUserRoleModal"
        >
            <div class="confirm r-confirm modal__body w-full bg-white rounded">
                <div class="modal__header confirm__header flex items-center justify-between rounded-inherit rounded-bl-none rounded-br-none">
                    <span class="text-blue-800 font-base font-bold cursor-default">
                         نقش کاربری
                    </span>
                    <button class="confirm__button relative"
                            @click.prevent="onClickCloseManageUserRoleModal"
                    > </button>
                </div>
                <div class="modal__content confirm__content">
                    <template v-if="userRole.isPending">
                        <p class="confirm__pending text-gray-200 font-base font-bold text-center cursor-default">
                            <span class="confirm__spinner spinner-loading"> </span>
                            در حال دریافت اطلاعات...
                        </p>
                    </template>
                    <div v-else
                          class="confirm__container"
                    >
                        <div class="confirm__label w-full flex items-center">
                            <span class="w-1/4 xl:w-1/5 text-blue-800 font-sm font-bold flex-shrink-0 p-l-14 cursor-default">
                                نام
                            </span>
                            <span class="text-blue-800 font-sm font-medium flex-1 cursor-default"
                                  v-text="selectedItem.full_name"
                            > </span>
                        </div>
                        <div class="confirm__label w-full"
                             v-for="role in roles"
                             :key="'role-' + role.id"
                        >
                            <div class="flex items-center">
                                <span class="w-1/4 xl:w-1/5 text-blue-800 font-sm font-bold flex-shrink-0 text-right p-l-14 cursor-default"
                                      v-text="role.name"
                                > </span>
                                <button class="font-xs font-bold"
                                        v-text=" userRoles[role.id] ? 'اکنون این نقش را دارد.' :  'اکنون چنین نقشی ندارد'"
                                        :class="[userRoles[role.id] ? 'r-confirm__active' : 'r-confirm__disabled' ]"
                                        @click.stop="toggleRolesComboBox( role )"
                                > </button>
                            </div>
                            <template v-if="!!role.isOpen">
                                <div class="r-confirm__form flex items-center">
                                    <span class="w-1/4 xl:w-1/5"> </span>
                                    <template v-if="!role.is_client">
                                        <select-cm :options="userRoles[role.id] ? rolesStatus : addedRoleStatus"
                                                   label="name" class="w-1/3" :value="userRoles[role.id] && userRoles[role.id].status_fa || ''"
                                                   @onChange="changeUserRoleStatus($event, selectedItem.id, role.id)"
                                        > </select-cm>
                                    </template>
                                    <template v-else>
                                        <select-cm :options="userRoles[role.id] ? clientRoleStatus : addedClientRoleStatus"
                                                   label="name" class="w-1/3" :value="userRoles[role.id] && userRoles[role.id].status_fa || ''"
                                                   @onChange="changeUserRoleStatus($event, selectedItem.id, role.id)"
                                        > </select-cm>
                                    </template>
                                    <button class="r-confirm__button--discard e-user__button e-user__button--discard border border-solid rounded font-base font-bold text-center l:transition-bg"
                                            @click.stop="toggleRolesComboBox( role )"
                                            v-text="'انصراف'"
                                    > </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </modal-cm>
        <modal-cm ref="changePassword"
                  @close="onClickCloseChangePasswordModal"
        >
            <div class="confirm modal__body w-full bg-white rounded">
                <div class="modal__header confirm__header flex items-center justify-between rounded-inherit rounded-bl-none rounded-br-none">
                    <span class="text-blue-800 font-base font-bold cursor-default">
                        تغییر گذرواژه
                    </span>
                    <button class="confirm__button relative"
                            @click.prevent="onClickCloseChangePasswordModal"
                    > </button>
                </div>
                <div class="modal__content confirm__content">
                    <form @submit="onClickSubmitChangePasswordModal"
                          class="confirm__container">
                        <label class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                نام
                            </span>
                            <input type="text"
                                   class="modal__input confirm__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1"
                                   placeholder="نام کاربر" readonly="readonly" disabled="disabled"
                                   :value="selectedItem.full_name"
                            >
                        </label>
                        <label class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-blue-800 font-sm font-bold flex-shrink-0">
                                تلفن همراه
                            </span>
                            <input type="text"
                                   class="modal__input confirm__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1 direction-ltr"
                                   placeholder="تلفن همراه کاربر" readonly="readonly" disabled="disabled"
                                   :value="selectedItem.mobile"
                            >
                        </label>
                        <label class="confirm__label w-full flex items-center">
                            <span class="confirm__text text-required text-blue-800 font-sm font-bold flex-shrink-0">
                                گذرواژه
                            </span>
                            <input type="password"
                                   class="modal__input confirm__input input input--white text-blue-800 border border-solid rounded font-xs font-light flex-1 direction-ltr"
                                   placeholder="گذرواژه کاربر" autocomplete="off"
                                   v-model="changePassword.value"
                            >
                        </label>
                    </form>
                </div>
                <div class="modal__footer confirm__footer w-full text-left">
                    <button class="confirm__f-button confirm__f-button--submit font-base font-medium rounded text-center l:transition-bg"
                            :class="{ 'spinner-loading': ( changePassword.isPending ) }"
                            @click.prevent="onClickSubmitChangePasswordModal"
                            v-text="'تایید'"
                    > </button>
                    <button class="confirm__f-button confirm__f-button--discard font-base font-medium rounded text-center l:transition-bg"
                            @click.prevent="onClickCloseChangePasswordModal"
                            v-text="'لغو'"
                    > </button>
                </div>
            </div>
        </modal-cm>
    </div>
</template>

<script>
    import {
        mapState, mapGetters
    } from 'vuex';
    import {
        IS_ADMIN
    } from '@services/store/Login';
    import {
        Length, HasLength
    } from "@vendor/plugin/helper";
    import {
        ACTIVE_ROLE_STATUS, ROLE_STATUS, ACTIVE_CLIENT_ROLE_STATUS, CLIENT_ROLE_STATUS
    } from '@services/service/Roles';
    import ManageLegateService from '@services/service/ManageLegate';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';
    import ModalCm from '@vendor/components/modal/Index.vue';
    import SelectCm from '@vendor/components/select/Index.vue';
    import PermissionsCm from '@components/ManageUser/Permissions.vue';
    import StatusService from '@services/service/Status';

    let Service = null;

    export default {
        name: "ManageLegate",
        data: () => ({
            searchTimeout: null,
            filter: {
                search: ''
            },
            selectedItem: {},
            accessLevel: {
                tab: 1,
                isPending: false,
                shouldBeShowSpinner: false
            },
            userInfo: {
                isPending: true,
                data: {}
            },
            userRole: {
                isPending: false,
            },
            changePassword: {
                value: '',
                isPending: false,
            },
            isPending: true,
            paginateKeyCounter: false,
            isModuleRegistered: false,
            shouldBeShowSearchField: false,
            addedRoleStatus: ACTIVE_ROLE_STATUS,
            rolesStatus: ROLE_STATUS,
            addedClientRoleStatus: ACTIVE_CLIENT_ROLE_STATUS,
            clientRoleStatus: CLIENT_ROLE_STATUS
        }),
        components: {
            DropdownCm, TableCm,
            ImageCm, PaginationCm,
            ModalCm, SelectCm, PermissionsCm
        },
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            ...mapState({
                items: ({ ManageLegateStore }) => ManageLegateStore.items,
                roles: ({ ManageLegateStore }) => ManageLegateStore.roles,
                userRoles: ({ ManageLegateStore }) => ManageLegateStore.userRole,
                pagination: ({ ManageLegateStore }) => ManageLegateStore.pagination,
                education: ({ ManageLegateStore }) => ManageLegateStore.education,
                activities: ({ ManageLegateStore }) => ManageLegateStore.activities,
                permissions: ({ ManageLegateStore }) => ManageLegateStore.permissions
            }),
            isAllUserTab() {
                let { query } = this.$route;
                return !HasLength( query )
            },
            isLegateTab() {
                let { query } = this.$route;
                return query.role_type !== void 0;
            },
            isRecycleTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === StatusService.RECYCLE_STATUS
                ) : false
            },
            lastEducationValue() {
                let lastEducationID = this.userInfo?.data?.last_education_degree;
                return (lastEducationID !== void 0 ) ? (this.education[lastEducationID]?.name || '') : ''
            },
            selectedActivity() {
                let field_of_activities = this.userInfo?.data?.field_of_activities ?? [];
                return (
                    Object.values(this.activities)
                        .filter(({ id }) => field_of_activities.includes( id ))
                            .map(({ name }) => name)
                )
            }
        },
        watch: {
            $route({ query }) {
                this.$set(this, 'isPending', true);
                this.$set(this.filter, 'search', '');
                this.$set(this, 'shouldBeShowSearchField', false);
                Service.getVolunteersListFilterBy( query )
                    .then(this.$nextTick)
                    .then(() => {
                        setTimeout(() => {
                            this.$set(this, 'isPending', false);
                        }, 70);
                    });
            }
        },
        methods: {
            /**
             * @param query { Object }
             */
            switchBetweenTabs( query  = {} ) {
                this.$router.push({
                    name: "MANAGE_LEGATE",
                    query
                }).catch(err => {});
                this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
            },
            onClickAllUserTab() {
                this.switchBetweenTabs()
            },
            onClickLegateUserTab() {
                this.switchBetweenTabs({
                    role_type: 'legate'
                })
            },
            onClickRecycleUserTab() {
                this.switchBetweenTabs({
                    status: StatusService.RECYCLE_STATUS
                })
            },
            onClickToggleSearchButton() {
                this.$set(this.filter, 'search', '');
                this.$set(this, 'shouldBeShowSearchField', !this.shouldBeShowSearchField);
            },
            async oninputSearchField() {
                try {
                    clearTimeout( this.searchTimeout );
                    this.searchTimeout = null;
                    this.searchTimeout = await setTimeout(async () => {
                        await Service.HandelSearchAction( this.filter.search, this.$route );
                        this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
                    }, 350)
                } catch (e) {}
            },
            onClickActionButton( item ) {
                this.$set(item, 'is_opened', !item.is_opened)
            },
            onChangePagination( page ) {
                try {
                    this.backToTop();
                    this.$set(this, 'isPending', true);
                    Service.HandelPagination( page, this.$route )
                        .then(this.$nextTick)
                        .then(() => {
                            setTimeout(() => {
                                this.$set(this, 'isPending', false)
                            }, 70);
                        });
                } catch (e) {}
            },
            async onClickShowUserAccessLevelModal(role, user_id, username) {
                try {
                    if ( this.isAdmin && role.is_legate ) {
                        this.$set(this, 'selectedItem', {
                            user_id, full_name: username,
                            ...role
                        });
                        this.$set(this.accessLevel, 'isPending', true);
                        this.$refs['accessLevel'].visible();
                        await Service.getUserPermission(user_id, role.id);
                        this.$set(this.accessLevel, 'isPending', false);
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            onClickPermissionTabs( tab_index ) {
                this.$set(this.accessLevel, 'tab', tab_index)
            },
            async onClickAssignUserPermission(user_id, role_id) {
                try {
                    this.$set(this.accessLevel, 'shouldBeShowSpinner', true);
                    let permission_data = this.$refs['permissions']?.getUserPermissions();
                    // if (HasLength( permission_data )) {
                        let result = await Service.assignPermissionToUser(user_id, role_id, permission_data);
                        this.displayNotification(result, { type: 'success' });
                        this.onClickCloseUserAccessLevelModal();
                    // } else {
                    //     this.displayNotification('هیچ سطح دسترسی ای انتخاب نشده است.', { type: 'error' })
                    // }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                } finally {
                    this.$set(this.accessLevel, 'shouldBeShowSpinner', false);
                }
            },
            onClickCloseUserAccessLevelModal() {
                this.$refs['accessLevel']?.hidden();
                this.$nextTick(() => {
                    this.$set(this, 'selectedItem', {});
                    this.onClickPermissionTabs( 1 );
                });
            },
            async onClickShowUserInfoModal( user_id ) {
                try {
                    this.$refs['userInfo']?.visible();
                    this.$set(this.userInfo, 'isPending', true);
                    let response = await Service.getDataForUserInfoModal( user_id );
                    this.$set(this.userInfo, 'data', response);
                    this.$set(this.userInfo, 'isPending', false);
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' });
                }
            },
            onClickCloseUserInformationModal() {
                this.$refs['userInfo']?.hidden();
            },
            onClickEditUserButton( user_id ) {
                this.pushRouter({
                    name: 'EDIT_USERS',
                    params: {
                        id: user_id
                    }
                });
            },
            toggleRolesComboBox( item ) {
                this.$set(item, 'isOpen', !item.isOpen);
            },
            async onClickManageUserRoleButton( item ) {
                try {
                    this.$set(this.userRole, 'isPending', true);
                    this.$set(this, 'selectedItem', item);
                    this.onClickActionButton( item );
                    this.$refs['userRole']?.visible();
                    await Service.getUserRoles( item.id );
                    this.$set(this.userRole, 'isPending', false);
                } catch ( error_message ) {
                    this.displayNotification(error_message, { type: 'error' });
                }
            },
            onClickCloseManageUserRoleModal() {
                this.$refs['userRole']?.hidden();
                this.$refs['userRole'].$nextTick(() => {
                    this.$set(this, 'selectedItem', {});
                });
            },
            async changeUserRoleStatus({ id }, user_id, role_id) {
                try {
                    if ( !!id ) {
                        let result = await Service.handelUserRoleAction(user_id, role_id, id);
                        this.displayNotification(result, { type: 'success' });
                    }
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            },
            onClickChangeUserPassword( item ) {
                try {
                    this.$set(this, 'selectedItem', item);
                    this.onClickActionButton( item );
                    this.$refs['changePassword']?.visible();
                } catch (e) {}
            },
            checkChangePasswordFormValidation() {
                let { value } = this.changePassword;
                let isValidPassword = !!value && ( Length(value.trim()) >= 8 );
                if ( !isValidPassword ) this.displayNotification('حداقل هشت کاراکتر حساس به کوچکی و بزرگی حروف.', { type: 'error' });
                return isValidPassword;
            },
            async onClickSubmitChangePasswordModal() {
                try {
                    this.$set(this.changePassword, 'isPending', true);
                    let isValid = this.checkChangePasswordFormValidation();
                    if ( isValid ) {
                        let response = await Service.changePasswordByAdmin( this.selectedItem.id, this.changePassword.value );
                        this.displayNotification(response, { type: 'success' });
                        this.onClickCloseChangePasswordModal();
                    }
                } catch ( error_message ) {
                    this.displayNotification(error_message, { type: 'error' });
                } finally {
                    this.$set(this.changePassword, 'isPending', false);
                }
            },
            onClickCloseChangePasswordModal() {
                this.$refs['changePassword']?.hidden();
                this.$nextTick(() => {
                    this.$set(this, 'selectedItem', {});
                    this.$set(this.changePassword, 'value', '');
                });
            },
            async onClickBlockUserButton( item ) {
                try {
                    this.onClickActionButton( item );
                    this.displayNotification('این قابلیت در حال حاضر فعال نمی‌باشد.', {
                        type: 'warn'
                    })
                } catch (e) {}
            },
        },
        created() {
            Service = new ManageLegateService( this );
        },
        mounted() {
            Service.processFetchAsyncData()
                .then(this.$nextTick)
                .then(() => {
                    setTimeout(() => {
                        this.$set(this, 'isPending', false);
                    }, 70);
                });
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>