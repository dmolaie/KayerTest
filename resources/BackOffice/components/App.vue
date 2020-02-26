<template>
    <div class="app w-full h-full flex items-start overflow-hidden">
        <Aside v-if="shouldBeShowAside"
        />
        <div class="flex-1 h-full bg-snow"
             role="main"
        >
            <Toolbar v-if="shouldBeShowAside"
            />
            <div class="w-full"
                 :class="[ shouldBeShowAside ? 'router-view' : 'h-full' ]"
            >
                <router-view class="w-full" />
            </div>
        </div>
        <Notification-cm />
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    import Aside from '@sub_components/Aside.vue';
    import Toolbar from '@sub_components/Toolbar.vue';

    export default {
        name: 'App',
        data: () => ({
            name: 'fu'
        }),
        computed: {
            ...mapState({
                shouldBeShowAside: state => state.LayoutState.shouldBeShowAside
            })
        },
        components: {
            Aside, Toolbar
        }
    }
</script>