<template>
    <div class="datepicker">
        <date-picker v-model="date"
                     :value="value"
                     :initialValue="initialValue"
                     :displayFormat="displayFormat"
                     :format="format"
                     :view="view"
                     :type="type"
                     :min="min"
                     :max="max"
                     :inputClass="inputClass"
                     :placeholder="placeholder"
                     :color="color"
                     :disabled="disabled"
                     :locale="locale"
                     :wrapper-submit="wrapperSubmit"
                     @input="onInput"
                     @change="onChange"
        />
    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

    export default {
        name: "DatePicker",
        data: () => ({
            date: ''
        }),
        props: {
            value: {
                type: [Number, String],
                default: ''
            },
            initialValue: {
                type: [Number, String],
                default: ''
            },
            /**
             *@example jYYYY/jMM/jDD HH:mm | YYYY/MM/DD HH:mm | jYYYY/jMM/jDD | YYYY/MM/DD | unix | HH:mm
             */
            inputFormat: {
                type: String,
                default: 'unix'
            },
            /**
             * @example jYYYY/jMM/jDD HH:mm | YYYY/MM/DD HH:mm | jYYYY/jMM/jDD | YYYY/MM/DD | unix | HH:mm
             */
            displayFormat: {
                type: String,
                default: 'jYYYY/jMM/jDD'
            },
            /**M/
             * @example jYYYY/jMM/jDD HH:mm | YYYY/MM/DD HH:mm | jYYYY/jMjDD | YYYY/MM/DD | unix | HH:mm
             */
            format: {
                type: String,
                default: 'jYYYY/jMM/jDD'
            },
            /**
             * @supported day | month | year | time
             */
            view: {
                type: String,
                default: 'day'
            },
            /**
             * @supported date | datetime | year | month | time
             */
            type: {
                type: String,
                default: 'date'
            },
            min: {
                type: String,
                default: ''
            },
            max: {
                type: String,
                default: ''
            },
            inputClass: {
                type: String,
                default: 'datepicker__input'
            },
            placeholder: {
                type: String,
                default: ''
            },
            color: {
                type: String,
                default: '#359be0'
            },
            disabled: {
                type: Boolean,
                default: false
            },
            locale: {
                type: String,
                default: 'fa'
            },
            wrapperSubmit: {
                type: Boolean,
                default: false,
            }
        },
        components: {
            datePicker: VuePersianDatetimePicker
        },
        methods: {
            /**
             * @returns formatted date as string.
             */
            onInput( event ) {
               this.$emit('onInput', event);
            },
            /**
             * @returns formatted date as unix.
             */
            onChange( event ) {
                try {
                    const DATE = new Date( event.xFormat() );
                    this.$emit('onChange', (
                        DATE.getTime() / 1e3
                    ));
                } catch (e) {
                    this.$emit('onChange', (
                        new Date().getTime() / 1e3
                    ))
                }
            }
        }
    }
</script>