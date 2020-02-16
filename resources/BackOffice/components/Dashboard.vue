<template>
    <div class="text-center">
        Dashboard
        <br>
        <router-link
            :to="{ name: 'LOGOUT' }"
        >
            LOGOUT
        </router-link>
    </div>
</template>

<script>
    export default {
        name: 'Dashboard',
        data: () => ({

        })
    }
</script>