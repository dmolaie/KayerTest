<template>
    <div class="app w-full h-full">
        <router-view />
        <notification-cm />
    </div>
</template>

<script>
    export default {
        name: 'App',
        data: () => ({
            name: 'fu'
        })
    }
</script>