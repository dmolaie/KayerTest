<template>
    <div class="excel w-full">
        <json-excel :fetch="fetch" :fields="fields"
                    :meta="meta" :name="name" :title="title"
                    v-bind="$attrs" :class="[className, isPending ? 'spinner-loading' : '']"
        >
            {{ buttonTitle }}
        </json-excel>
    </div>
</template>

<script>
    import { ZeroPad } from "@vendor/plugin/helper";
    import JsonExcel from 'vue-json-excel';

    export default {
        inheritAttrs: false,
        name: "Excel",
        data: () => ({
            title: 'انجمن اهدای‌ عضو ‌ایرانیان',
        }),
        props: {
            fetch: {
                type: Function,
                required: true
            },
            fields: {
                type: Object,
                required: true
            },
            meta: {
                type: Array,
                default: () => ([
                    [
                        {
                            'key': 'charset',
                            'value': 'utf-8'
                        }
                    ]
                ])
            },
            buttonTitle: {
                type: String,
                default: 'خروجی اکسل'
            },
            className: {
                type: String,
                default: ''
            },
            isPending: {
                type: Boolean,
                default: false
            }
        },
        components: { JsonExcel },
        computed: {
            jsonData() {
                return Object.values( this.data )
            },
            name() {
                const DATE = new Date();
                return `Report-${DATE.getFullYear()}-${ZeroPad(DATE.getMonth() + 1)}-${ZeroPad(DATE.getDate())}T${ZeroPad(DATE.getHours())}:${ZeroPad(DATE.getMinutes())}.xls`;
            }
        }
    }
</script>