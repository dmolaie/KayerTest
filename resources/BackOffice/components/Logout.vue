<template>
    <div class="p-logout w-full h-full relative">
        <span class="p-logout__loading spinner-loading"></span>
    </div>
</template>

<script>
    import LogoutService from '@services/service/Logout';

    let Service = null;

    export default {
        name: "Logout",
        mounted() {
            Service = new LogoutService( this );
            Service.logoutProcess()
        }
    }
</script>