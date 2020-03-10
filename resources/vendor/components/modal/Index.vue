<template>
    <transition name="modal"
    >
        <div class="modal fixed w-full h-full flex items-center justify-center z-10"
             v-if="visibilityState"
        >
            <slot
            > </slot>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "Index",
        data: () => ({
            visibilityState: true
        }),
        props: {
            clickOutside: {
                type: Boolean,
                default: true,
            }
        }
    }
</script>