<template>
    <div class="c-card c-post w-full">
        <div class="main w-full inner-box inner-box--white w-full rounded-2">
            <p class="font-sm font-bold text-blue cursor-default">
                استعلام کد ملی
            </p>
            <label class="p-account__field w-full flex items-center">
                <span class="p-account__c-text text-blue-800 text-required font-sm font-bold flex-shrink-0">
                    کدملی
                </span>
                <input type="text" placeholder="۱۰ رقم بدون خط تیره" v-model="step1.nationalCode" autocomplete="off"
                       class="input input--blue block w-full border-blue-100-1 rounded font-sm font-normal transition-bg direction-ltr">
            </label>
            <button class="bg-green"
                    @click.prevent="onClickCheckNationalCodeButton"
            >
                استعلام کد ملی
            </button>
        </div>
    </div>
</template>

<script>
    import CreateCardsService from '@services/service/CreateCards';

    let Service = null;
    //0520696042
    export default {
        name: "CreateCards",
        data: () => ({
            step1: { nationalCode: '' },
            isModuleRegistered: false
        }),
        methods: {
            async onClickCheckNationalCodeButton() {
                try {
                    let result = await Service.checkNationalCodeValidation( this.step1.nationalCode );
                    this.displayNotification(result, { type: 'success' });
                } catch ( exception ) {
                    this.displayNotification(exception, { type: 'error' })
                }
            }
        },
        created() {
            Service = new CreateCardsService( this );
        },
        beforeDestroy() {
            Service._UnregisterStoreModule();
        }
    }
</script>