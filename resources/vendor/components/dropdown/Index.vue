<template>
    <div>
        <transition name="fade"
        >
            <div class="dropdown absolute w-full bg-white rounded overflow-hidden user-select-none z-10"
                 :class="`dropdown--${align}`"
                 v-if="visibility"
                 v-clickOutside="onclickOutside"
            >
                <slot
                > </slot>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: "Dropdown",
        props: {
            align: {
                type: String,
                default: 'center'
            },
            visibility: {
                type: Boolean,
                default: false
            },
            clickOutside: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            onclickOutside() {
                if ( this.clickOutside )
                    this.$emit('onClickOutside');
            },
        }
    }
</script>