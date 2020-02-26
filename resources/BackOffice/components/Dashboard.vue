<template>
    <div class="dashboard">
        <nav class="dashboard-p__nav bg-white w-full flex items-center">
            <router-link
                :to="{ name: 'LOGOUT' }"
                class="dashboard-p__nav_user flex items-center text-blue"
                >
                logout
            </router-link>
        </nav>
        <div class="dashboard-p__content w-full text-center font-24 font-bold">
            به پنل مدیریتی انجمن اهدا خوش آمدید
        </div>
    </div>
</template>

<script>
    import ImageCm from '@vendor/components/image/Index.vue';
    import DashboardService from '@services/service/Dashboard';

    let Service = null;

    export default {
        name: 'Dashboard',
        data: () => ({
            menu: [
                {
                    title: 'رویدادها',
                    icon: 'ic_event--blue.svg'
                },
                {
                    title: 'اخبار',
                    icon: 'ic_newspaper--blue.svg'
                }
            ]
        }),
        components: {
            ImageCm
        },
        mounted() {
            Service = new DashboardService( this );
            Service.processViewPort();
        }
    }
</script>