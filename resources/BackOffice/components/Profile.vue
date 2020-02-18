<template>
    <div class="text-center">
        Profile
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
        name: "Profile"
    }
</script>