<template>
    <div :class="[CLASSNAME['select'], 'relative transition-opacity', {
        'select--visible' : ( shouldBeShowOption ),
        'select--disabled pointer-event-none': ( disabled ),
        'select--search': ( searchable )
    }]"
         v-click-outside="onClickOutside"
    >
        <div class="select__input font-sm text-bayoux font-bold border-blue-100-1 rounded text-nowrap cursor-pointer overflow-hidden user-select-none"
             @click.prevent="onClickInputField"
             :aria-placeholder="placeholder"
             role="combobox"
        >
            <template v-if="(!multiple && !!selected[label]) || !!value"
            >
                {{ !!selected[label] ? selected[label] : value }}
            </template>
        </div>
        <div class="select__body absolute none w-full bg-white rounded opacity-0 visibility-hidden pointer-event-none transition-opacity z-10">
            <div class="select__search flex items-stretch border border-solid rounded"
                 v-if="searchable"
            >
                <span class="select__search_label flex-shrink-0 relative rounded rounded-tl-none rounded-bl-none"
                > </span>
                <input type="text"
                       class="select__search_input flex-1 font-sm font-bold rounded rounded-tr-none rounded-br-none"
                       @input="onChangeFilterField"
                       v-model="searchField"
                />
            </div>
            <div class="select__options w-full">
                <button class="select__option w-full block text-bayoux font-xs font-bold cursor-pointer user-select-none text-right"
                        v-for="(option, index) in options"
                        :key="index"
                        v-text="option[label]"
                        :class="{ 'select__option--selected': ( option.selected ) }"
                        @click.prevent="onClickOptions( option )"
                        role="option"
                > </button>
                <p class="select__option w-full block text-bayoux font-xs font-bold cursor-pointer user-select-none text-right pointer-event-none"
                   v-if="!Object.values(options).length"
                >
                    آیتمی برای انتخاب وجود ندارد.
                </p>
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
            timer: null,
            searchField: '',
            selected: {},
            CLASSNAME: {
                select: 'select',
                body: 'select__body',
                options: 'select__options',
                option: 'select__option',
            },
            shouldBeShowOption: false,
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
            label: {
                type: String,
                default: 'text'
            }
        },
        methods: {
            resetValue() {
                this.$set(this, 'selected', {});
            },
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
            },
            onChangeFilterField() {
                try {
                    clearTimeout( this.timer );
                    this.$set(this, 'timer', null);
                    this.timer = setTimeout( async () => {
                        await this.filterBy( this.searchField );
                    }, 350);
                } catch (e) {}
            },
        },
    }
</script>