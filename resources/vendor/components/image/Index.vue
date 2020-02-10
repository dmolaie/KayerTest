<template>
    <figure class="image-cm"
            :class="{ 'relative has-skeleton': lazyLoading }"
            ref="image"
    >
        <img :src="src"
             :alt="alt"
             :title="alt"
             class="image-cm__image h-full"
             :class="'object-' + objectFit + ' ' + className"
        />
    </figure>
</template>

<script>
    import ImageLazyLoading from '@vendor/plugin/imageLazyLoading';

    export default {
        name: "Index",
        props: {
            src: {
                type: String,
                required: true,
            },
            alt: {
                type: String,
            },
            className: {
                type: String,
                default: ''
            },
            objectFit: {
                type: String,
                default: 'cover'
            },
            lazyLoading: {
                type: Boolean,
                default: false
            }
        },
        mounted() {
            if ( this.lazyLoading )
                ImageLazyLoading( this.$refs['image'] );
        }
    }
</script>