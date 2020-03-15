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
                       placeholder="دامنه مورد نظر خود را انتخاب کنید"
                       @onChange="onChangeSelectBox"
                       :value="computedValue"
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
    import {
        HasLength
    } from "@vendor/plugin/helper";
    import SelectCm from '@vendor/components/select/Index.vue';

    export default {
        name: "DomainsPanel",
        props: {
            options: {
                type: [Object, Array],
                required: true
            },
            isPending: {
                type: Boolean,
                default: false,
            },
        },
        components: {
            SelectCm
        },
        computed: {
            ...mapState({
                username: state => state.UserStore?.username,
            }),
            computedValue() {
                return ( HasLength( this.options ) ) ? (
                    this.options[0].text
                ) : 'تهران'
            }
        },
        methods: {
            onChangeSelectBox( payload ) {
                this.$emit('onChange', payload?.value )
            }
        }
    }
</script>