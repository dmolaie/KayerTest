<template>
    <div>
        <h1>
            error
        </h1>
    </div>
</template>

<script>
    import NotFoundService from '@services/service/NotFound';

    let Service = null;

    export default {
        name: 'NotFound',
        mounted() {
            Service = new NotFoundService( this );
            Service.processViewPort();
        }
    }
</script>