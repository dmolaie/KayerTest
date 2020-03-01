<template>
    <div class="select">
        <select class=""
        >
            <option v-for="(option, index) in options"
                    :key="index"
                    :value="option.value"
                    :data-value="PREFIX + option.value"
                    v-text="option.text"
            > </option>
        </select>
        <div :class="CLASSNAME['wrapper'] + ' relative'"
        >
            <div :class="CLASSNAME['input'] + ' cursor-pointer user-select-none'"
            > </div>
            <div :class="CLASSNAME['body'] + ' absolute w-full opacity-0 visibility-hidden pointer-event-none transition-opacity'"
                 style="background: red"
            >
                <div :class="CLASSNAME['options'] + ' w-full'">
                    <button v-for="(option, index) in options"
                         :key="index"
                         :class="CLASSNAME['option'] + ' cursor-pointer user-select-none'"
                         :data-value="PREFIX + option.value"
                         v-text="option.text"
                    > </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data: () => ({
            PREFIX: 'drp',
            CLASSNAME: {
                wrapper: 'dropdown__wrapper',
                input: 'dropdown__input',
                body: 'dropdown__body',
                options: 'dropdown__options',
            }
        }),
        props: {
            options: {
                type: Array,
                required: true
            }
        }
    }
</script>