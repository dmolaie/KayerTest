<template>
    <div class="excel w-full">
        <json-excel :fetch="fetch" :fields="fields"
                    :meta="meta" :name="name" :title="title"
                    v-bind="$attrs"
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
            json_fields: {
                'نام': 'name',
                'شهر': 'city',
                'Telephone': 'country',
                'Telephone 2' : 'birthdate',
            },
            json_data: [
                {
                    'name': 'محمد سلیمانیان',
                    'city': '&#8203;09013040633',
                    'country': '&#8203;0521141966',
                    'birthdate': '78/01/25',
                    'phone': {
                        'mobile': '1-541-754-3010',
                        'landline': '(541) 754-3010'
                    }
                },
                {
                    'name': 'Thessaloniki',
                    'city': 'Athens',
                    'country': 'Greece',
                    'birthdate': '1987-11-23',
                    'phone': {
                        'mobile': '+1 855 275 5071',
                        'landline': '(2741) 2621-244'
                    }
                }
            ],
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