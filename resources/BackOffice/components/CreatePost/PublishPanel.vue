<template>
    <div class="publish panel w-full block bg-white border-2 rounded-2 border-solid">
        <div class="w-full font-sm font-bold text-center cursor-default m-b-24">
            <p class="publish__status border border-solid rounded user-select-none"
               :class="{
                   'publish__status--published': isPublished,
                   'publish__status--ready-published': isReadyPublished,
                   'publish__status--pending': isPending,
                   'publish__status--reject': isReject,
                   'publish__status--accept': isAccept,
                   'publish__status--recycle': isRecycle,
                   'publish__status--cancel': isCancel,
                   'publish__status--delete': isDelete,
                   'publish__status--not-published': isNotPublished,
               }"
               v-text="statusLabel"
            > </p>
        </div>
        <div class="w-3/4 relative m-0-auto"
             v-click-outside="onClickOutside"
        >
            <button class="publish__submit block w-full text-white font-sm font-bold bg-blue-100 border-blue-1 rounded text-center l:transition-bg l:hover:bg-blue user-select-none"
                    @click.prevent="onClickPublishButton"
                    v-text="buttonLabel"
            > </button>
            <dropdown-cm :visibility="shouldBeShowDropdown"
            >
                <slot name="dropdown"
                      :hiddenDropdown="hiddenDropdownVisibility"
                > </slot>
            </dropdown-cm>
        </div>
        <button class="block text-blue-100 font-sm font-bold m-0-auto l:transition-color l:hover:text-blue--200 user-select-none"
                v-if="showDraftButton"
                @click.prevent="onClickDraftButton"
        >
            ذخیره پیش‌نویس
        </button>
    </div>
</template>

<script>
    import DropdownCm from '@vendor/components/dropdown/Index.vue';

    export default {
        name: "PublishPanel",
        data: () => ({
            shouldBeShowDropdown: false
        }),
        props: {
            showDraftButton: {
                type: Boolean,
                default: false
            },
            buttonLabel: {
                type: String,
                default: 'انتشار'
            },
            statusLabel: {
                type: String,
                default: ''
            },
            isPublished: {
                type: Boolean,
                default: false
            },
            isAccept: {
                type: Boolean,
                default: false
            },
            isReadyPublished: {
                type: Boolean,
                default: false
            },
            isPending: {
                type: Boolean,
                default: false
            },
            isReject: {
                type: Boolean,
                default: false
            },
            isRecycle: {
                type: Boolean,
                default: false
            },
            isCancel: {
                type: Boolean,
                default: false
            },
            isDelete: {
                type: Boolean,
                default: false
            },
            isNotPublished: {
                type: Boolean,
                default: false
            },
        },
        components: {
            DropdownCm
        },
        methods: {
            hiddenDropdownVisibility() {
                this.$set( this, 'shouldBeShowDropdown', false )
            },
            onClickOutside() {
                this.$set( this, 'shouldBeShowDropdown', false );
            },
            onClickPublishButton() {
                this.$set( this, 'shouldBeShowDropdown', !this.shouldBeShowDropdown );
            },
            onClickDraftButton() {
                this.$emit('onClickDraftButton')
            }
        }
    }
</script>