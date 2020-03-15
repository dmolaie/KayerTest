<template>
    <div class="table border border-solid rounded text-blue-800">
        <div class="table__header flex">
            <slot name="head"
            > </slot>
        </div>
        <div class="table__body">
            <template v-if="!isPending">
                <template v-if="!!data && Object.values( data ).length">
                    <slot name="body" :data="data"
                    > </slot>
                </template>
                <template v-else>
                        <span class="block w-full text-center font-sm font-bold text-blue-800 cursor-default"
                              style="padding: 1.2rem 0"
                        >
                            چیزی برای نمایش وجود ندارد.
                        </span>
                </template>
            </template>
            <template v-else>
                <div v-for="i in itemCount"
                     :key="i"
                     class="table__skeleton table__row relative w-full overflow-hidden"
                     :style="`min-height: ${minHeight}px`"
                > </div>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Table",
        props: {
            data: {
                type: [Array, Object],
                default: () => ([]),
                required: true
            },
            isPending: {
                type: Boolean,
                default: false
            },
            itemCount: {
                type: Number,
                default: 10
            },
            minHeight: {
                type: [Number, String],
                default: 110
            }
        },
    }
</script>