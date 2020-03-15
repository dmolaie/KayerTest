<template>
    <div class="table border border-solid rounded text-blue-800">
        <div class="table__header flex">
            <slot name="head"
            > </slot>
        </div>
        <div class="table__body">
            <slot name="body" :data="data"
            > </slot>
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
            }
        },
        mounted() {
            console.log(this.data);
        }
    }
</script>