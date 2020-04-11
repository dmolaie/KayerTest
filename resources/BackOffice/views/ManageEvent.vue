<template>
    <div class="m-news m-post">
        <div class="m-post__container w-full bg-white rounded-10">
            <div class="m-post__tabs">
                <div class="inline-flex items-stretch min-w-full">
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isPublishedTab }"
                            @click.prevent="onClickPublishTab"
                    >
                        منتشرشده‌ها
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isScheduleTab }"
                            @click.prevent="onClickScheduledTab"
                    >
                        صف انتشار
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isPendingTab }"
                            @click.prevent="onClickPendingTab"

                    >
                        منتظر تأیید
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isCancelTab }"
                            @click.prevent="onClickCancelTab"
                    >
                        کنسل شده
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isRejectTab }"
                            @click.prevent="onClickRejectTab"
                    >
                        رد شده
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isRecycleTab }"
                            @click.prevent="onClickRecycleTab"
                    >
                        زباله‌دان
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isDeleteTab }"
                            @click.prevent="onClickDeleteTab"
                    >
                        حذف شده
                    </button>
                    <button class="m-post__tab relative flex-1 font-sm font-bold transition-bg text-nowrap p-0"
                            :class="{ 'm-post__tab--active': isMyPostTab }"
                            @click.prevent="onClickMyPostTab"
                    >
                        نوشته‌های من
                    </button>
                </div>
            </div>
            <div class="m-post__wrapper">

            </div>
        </div>
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
        Length, HasLength, toEnglishDigits
    } from "@vendor/plugin/helper";
    import StatusService from '@services/service/Status';
    import ManageEventService from "@services/service/ManageEvent";
    import DatePickerCm from '@components/DatePicker.vue';
    import TableCm from '@vendor/components/table/Index.vue';
    import ImageCm from '@vendor/components/image/Index.vue';
    import DropdownCm from '@vendor/components/dropdown/Index.vue';
    import PaginationCm from '@vendor/components/pagination/Index.vue';

    const PUBLISH_STATUS = StatusService.PUBLISH_STATUS;
    const READY_TO_PUBLISH_STATUS =  StatusService.READY_TO_PUBLISH_STATUS;
    const RECYCLE_STATUS =  StatusService.RECYCLE_STATUS;
    const CANCEL_STATUS =  StatusService.CANCEL_STATUS;
    const PENDING_STATUS =  StatusService.PENDING_STATUS;
    const DELETE_STATUS =  StatusService.DELETE_STATUS;
    const REJECT_STATUS =  StatusService.REJECT_STATUS;
    const MY_POST_STATUS =  StatusService.MY_POST_STATUS;

    let Service = null;

    export default {
        name: "ManageEvent",
        data: () => ({
            paginateKeyCounter: 0
        }),
        computed: {
            ...mapGetters({
                isAdmin: IS_ADMIN
            }),
            isPublishedTab() {
                let { query } = this.$route;
                return ( HasLength(this.$route.query) ) ? (
                    query.status === PUBLISH_STATUS
                ) : true
            },
            isScheduleTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === READY_TO_PUBLISH_STATUS;
            },
            isPendingTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === PENDING_STATUS;
            },
            isCancelTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === CANCEL_STATUS;
            },
            isRejectTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === REJECT_STATUS;
            },
            isRecycleTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === RECYCLE_STATUS;
            },
            isDeleteTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === DELETE_STATUS;
            },
            isMyPostTab() {
                let { query } = this.$route;
                return HasLength( query ) && query.status === MY_POST_STATUS;
            }
        },
        methods: {
            /**
             * @param query { Object }
             */
            switchBetweenTabs( query  = {} ) {
                this.$router.push(
                    {
                        name: "MANAGE_NEWS",
                        query
                    }).catch(err => {});
                this.$set(this, 'paginateKeyCounter', this.paginateKeyCounter + 1);
            },
            onClickPublishTab() {
                this.switchBetweenTabs({
                    status: PUBLISH_STATUS
                })
            },
            onClickScheduledTab() {
                this.switchBetweenTabs({
                    status: READY_TO_PUBLISH_STATUS
                })
            },
            onClickPendingTab() {
                this.switchBetweenTabs({
                    status: PENDING_STATUS
                })
            },
            onClickCancelTab() {
                this.switchBetweenTabs({
                    status: CANCEL_STATUS
                })
            },
            onClickRejectTab() {
                this.switchBetweenTabs({
                    status: REJECT_STATUS
                })
            },
            onClickRecycleTab() {
                this.switchBetweenTabs({
                    status: RECYCLE_STATUS
                })
            },
            onClickDeleteTab() {
                this.switchBetweenTabs({
                    status: DELETE_STATUS
                })
            },
            onClickMyPostTab() {
                this.switchBetweenTabs({
                    status: MY_POST_STATUS
                })
            }
        },
        created() {
            Service = new ManageEventService( this );
        }
    }
</script>