<template>
    <div class="app w-full h-full flex items-start overflow-hidden">
        <template v-if="shouldBeShowProgress">
            <div class="progress fixed w-full overflow-hidden pointer-event-none">
                <div class="progress__bar"></div>
            </div>
        </template>
        <Aside v-if="shouldBeShowAside"
        />
        <div class="flex-1 h-full bg-snow overflow-auto"
             role="main"
        >
            <Toolbar v-if="shouldBeShowAside"
            />
            <div class="w-full"
                 :class="[ shouldBeShowAside ? 'router-view' : 'h-full' ]"
            >
                <Breadcrumb-cm :items="breadcrumb"
                />
                <router-view class="w-full" />
            </div>
        </div>
        <Notification-cm />
        <div class="h-0 w-0 opacity-0">
            <span class="font-zar">
                انجمن‌اهدای‌عضو‌ایرانیان
            </span>
        </div>
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    import Aside from '@components/Aside.vue';
    import Toolbar from '@components/Toolbar.vue';

    export default {
        name: 'App',
        data: () => ({
            breadcrumb: []
        }),
        components: {
            Aside, Toolbar
        },
        watch: {
            '$route' ( route ) {
                this.$set( this, 'breadcrumb', route?.meta?.breadcrumb || [] );
            },
        },
        computed: {
            ...mapState({
                shouldBeShowAside: state => state.LayoutState.shouldBeShowAside,
                shouldBeShowProgress: state => state.LayoutState.shouldBeShowProgress
            })
        },
    }
</script>