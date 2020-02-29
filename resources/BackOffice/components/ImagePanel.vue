<template>
    <div class="image-p panel w-full block bg-white border-2 rounded-2 border-solid">
        <div class="panel__title font-sm font-bold text-blue cursor-default">
            تصویر شاخص
        </div>
        <button class="image-p__submit block w-3/4 text-white font-sm font-bold bg-blue-100 border-blue-1 rounded text-center l:transition-bg l:hover:bg-blue m-0-auto"

        >
            انتخاب عکس
        </button>
        <div class="image-p__preview">
            <template>
                <image-cm
                    class="image-p__image w-full block rounded"
                    src="https://images.unsplash.com/photo-1558981285-6f0c94958bb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                    className="w-full h-full block rounded-inherit"
                    :lazyLoading="true"
                />
            </template>
            <button class="block m-0-auto text-red font-sm font-bold"
                    v-text="'تخلیه‌ی عکس'"
            > </button>
        </div>
    </div>
</template>

<script>
    import ImageCm from '@vendor/components/image/Index.vue';

    export default {
        name: "ImagePanel",
        components: {
            ImageCm
        }
    }
</script>