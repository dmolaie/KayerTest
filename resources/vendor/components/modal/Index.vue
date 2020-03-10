<template>
    <transition name="modal"
    >
        <div class="modal fixed w-full h-full flex items-center justify-center z-10"
             v-if="visibilityState"
        >
            <div :class="`modal:${size}`"
                 v-click-outside="onClickOutside"
            >
                <slot> </slot>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "Index",
        data: () => ({
            visibilityState: false
        }),
        props: {
            clickOutside: {
                type: Boolean,
                default: true,
            },
            size: {
                type: String,
                default: 'medium'
            }
        },
        methods: {
            visible() {
                this.$set(this, 'visibilityState', true);
            },
            hidden() {
                this.$set(this, 'visibilityState', false);
            },
            onClickOutside() {
                if ( this.clickOutside ) this.hidden();
            }
        }
    }
</script>