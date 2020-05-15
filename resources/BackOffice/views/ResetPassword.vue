<template>
    <div class="h-full">
        <div class="m-login flex items-stretch w-full h-full">
            <div class="m-login__panel relative h-full md:w-full">
                <div class="m-login__content w-full h-full flex items-start justify-center flex-wrap">
                    <a href="/"
                       class="m-login__logo w-full">
                        <img src="/images/ic_ehda-center.png"
                             alt="انجمن اهدای عضو ایرانیان"
                             class="block w-full h-full m-0-auto object-contain"
                        />
                    </a>
                    <form class="w-full">
                        <div class="">

                        </div>
                    </form>
                </div>
            </div>
            <div class="m-login__aside flex-1 h-full md:none"></div>
        </div>
    </div>
</template>

<script>
    // import ResetPasswordService from '@services/serivce/ResetPassword'

    let Service = null;

    export default {
        name: "ResetPassword",
        data: () => ({

        }),
        methods: {},
        created() {
            // Service = new ResetPasswordService( this );

        }
    }
</script>