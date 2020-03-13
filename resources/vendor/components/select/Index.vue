<template>
    <div :class="[CLASSNAME['select'], 'relative transition-opacity', {
        'select--visible' : ( shouldBeShowOption ),
        'select--disabled pointer-event-none': ( disabled ),
    }]"
         v-click-outside="onClickOutside"
    >
        <div class="select__input font-sm text-bayoux font-bold border-blue-100-1 rounded text-nowrap cursor-pointer overflow-hidden user-select-none"
             @click.prevent="onClickInputField"
             :aria-placeholder="placeholder"
             role="combobox"
        >
            <template v-if="!multiple && !!selected.text"
            >
                {{ selected.text }}
            </template>
        </div>
        <div class="select__body absolute w-full bg-white rounded opacity-0 visibility-hidden pointer-event-none transition-opacity z-10">
            <div class="select__options w-full"
            >
                <button class="select__option w-full block text-bayoux font-xs font-bold cursor-pointer user-select-none text-right"
                        v-for="(option, index) in options"
                        :key="index"
                        v-text="option.text"
                        :class="{ 'select__option--selected': ( option.selected ) }"
                        @click.prevent="onClickOptions( option )"
                        role="option"
                > </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        CopyOf
    } from "@vendor/plugin/helper";

    export default {
        name: "Index",
        data: () => ({
            selected: {},
            CLASSNAME: {
                select: 'select',
                body: 'select__body',
                options: 'select__options',
                option: 'select__option',
            },
            shouldBeShowOption: false
        }),
        props: {
            options: {
                type: [Array, Object],
                required: true
            },
            value: {
                default: null
            },
            disabled: {
                type: Boolean,
            },
            multiple: {
                type: Boolean,
            },
            searchable: {
                type: Boolean,
            },
            filterBy: {
                type: Function,
                default(option, search) {
                    return (option.text | "").toLowerCase().includes( search.toLowerCase() );
                }
            },
            placeholder: {
                type: String,
                default: ''
            },
        },
        methods: {
            onClickOutside() {
                this.$set( this, 'shouldBeShowOption', false );
            },
            onClickInputField() {
                this.$set( this, 'shouldBeShowOption', !this.shouldBeShowOption );
            },
            /**
             * @param  { Object }  option
             */
            onClickOptions( option ) {
                let {
                    options, multiple
                } = this;
                console.log(option);
                if ( !multiple ) {
                    let prevSelectedOption =
                        (
                            Array.isArray( options ) ? options : Object.keys( options )
                        ).find( item => item.selected );
                    if ( prevSelectedOption )
                        this.$set( prevSelectedOption, 'selected', false );
                }
                this.$set( option, 'selected', true );
                this.$set( this, 'selected', option);
                this.$emit('onChange', CopyOf(option));
                this.onClickOutside();
            }
        },
    }
</script>