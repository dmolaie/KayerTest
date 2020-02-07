<template>
    <div class="app w-full h-full">
        hgjjgfj
        {{ name }}
        <router-view />
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