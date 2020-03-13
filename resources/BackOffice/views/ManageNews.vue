<template>
    <div class="l-post l-news">

    </div>
</template>

<script>
    import ManageNewsService from '@services/service/ManageNews';

    let Service = null;

    export default {
        name: "ManageNews",
        async created() {
            Service = new ManageNewsService( this );
            await Service.processFetchAsyncData();
        }
    }
</script>