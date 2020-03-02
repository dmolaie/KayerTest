<template>
    <div class="domains panel relative w-full block bg-white border-2 rounded-2 border-solid"
         :class="{
            'domains--pending pointer-event-none': ( isPending )
         }"
    >
        <div class="domains__loading spinner-loading w-full h-full rounded-inherit z-10"
             v-if="isPending"
        ></div>
        <p class="panel__title font-sm font-bold text-blue cursor-default">
            متفرقه
        </p>
        <p class="panel__title font-sm font-bold text-bayoux cursor-default">
            دامنه
        </p>
        <div class="panel__title">
            <select-cm :options="options"
                       placeholder="دامنه مورد نظر خود را انتخاب کنیددامنه مورد نظر خود را انتخاب کنید"
                       :multiple="false"
                       @onChange="onChangeSelectBox"
            />
        </div>
        <p class="panel__title font-sm font-bold text-bayoux cursor-default m-0">
            مالک مطلب: {{ username }}
        </p>
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    import SelectCm from '@vendor/components/select/Index.vue';

    export default {
        name: "DomainsPanel",
        data: () => ({
            options: [
                {
                    text: 'salam',
                    value: '213'
                },
                {
                    text: 'bye',
                    value: '341'
                }
            ],
            isPending: true
        }),
        components: {
            SelectCm
        },
        computed: mapState({
            username: state => state.UserStore?.username,
        }),
        methods: {
            onChangeSelectBox( payload ) {
                this.$emit('onChange', payload?.value )
            }
        }
    }
</script>