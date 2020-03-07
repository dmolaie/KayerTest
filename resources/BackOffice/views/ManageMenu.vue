<template>
    <div class="ManageMenu">
        ManageMenuManageMenuManageMenu
    </div>
</template>

<script>
    import ManageMenuService from '@services/service/ManageMenu';

    let Service = null;

    export default {
        name: "ManageMenu",
        async mounted() {
            Service = new ManageMenuService( this );
            await Service.getList();
        }
    }
</script>