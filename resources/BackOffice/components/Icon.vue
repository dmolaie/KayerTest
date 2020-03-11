<template>
    <div class="icon flex items-center justify-center">
        <svg class="icon__svg">
            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                 :xlink:href="'#icon--' + name"
            > </use>
        </svg>
    </div>
</template>

<script>
    export default {
        name: "Icon",
        props: {
            name: {
                default: "",
                type: String,
                required: true
            }
        }
    }
</script>