<template>
    <div class="publish panel w-full block bg-white border-2 rounded-2 border-solid">
        <div class="publish__status w-full font-sm font-bold text-center cursor-default">
            <p class="publish__status--published border border-solid rounded user-select-none"
               v-if="published"
            >
                منتشرشده
            </p>
            <p class="publish__status--not-published border border-solid rounded user-select-none"
               v-else
            >
                ذخیره‌نشده
            </p>
        </div>
        <div class="w-3/4 relative m-0-auto"
             v-click-outside="onClickOutside"
        >
            <button class="publish__submit block w-full text-white font-sm font-bold bg-blue-100 border-blue-1 rounded text-center l:transition-bg l:hover:bg-blue user-select-none"
                    @click.prevent="onClickPublishButton"
                    v-text="published ? 'به روز رسانی' : 'انتشار'"
            > </button>
            <dropdown-cm :visibility="shouldBeShowDropdown"
            >
                <template v-if="published"
                >
                    <slot name="published"
                          :hiddenDropdown="hiddenDropdownVisibility"
                    > </slot>
                </template>
                <template v-else
                >
                    <slot name="notPublished"
                          :hiddenDropdown="hiddenDropdownVisibility"
                    > </slot>
                </template>
            </dropdown-cm>
        </div>
        <button class="block text-blue-100 font-sm font-bold m-0-auto l:transition-color l:hover:text-blue--200 user-select-none">
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
            published: {
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
        }
    }
</script>