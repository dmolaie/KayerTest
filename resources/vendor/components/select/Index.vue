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
            <template v-if="!!selected[label] || !!value"
            >
                {{ !!selected[label] ? selected[label] : value }}
            </template>
        </div>
        <div class="select__body absolute none w-full bg-white rounded opacity-0 visibility-hidden pointer-event-none transition-opacity z-10">
            <div class="select__search relative flex items-stretch border border-solid rounded"
                 v-if="searchable && optionsHasValue"
            >
                <span class="select__search_label flex-shrink-0 relative rounded rounded-tl-none rounded-bl-none"
                > </span>
                <input type="text"
                       class="select__search_input w-full font-medium rounded rounded-tr-none rounded-br-none"
                       @input="onChangeFilterField" placeholder="جستجو..."
                       v-model="search.value"
                />
                <span class="select__search_loading pointer-event-none spinner-loading"
                        v-show="search.isPending"
                > </span>
            </div>
            <div class="select__options w-full">
                <template v-if="!required && optionsHasValue && dataHasValue">
                    <button class="select__option w-full block text-bayoux font-xs font-bold cursor-pointer user-select-none text-right"
                            @click.prevent="onClickOptions( {[label]: ' ', id: ''} )"
                            role="option"

                    >
                        هیچکدام...
                    </button>
                </template>
                <button class="select__option w-full block text-bayoux font-xs font-bold cursor-pointer user-select-none text-right"
                        v-for="(option, index) in data"
                        :key="index"
                        v-text="option[label]"
                        :class="{ 'select__option--selected': ( option.selected ) }"
                        @click.prevent="onClickOptions( option )"
                        role="option"
                > </button>
                <p class="select__option w-full block text-bayoux font-xs font-bold cursor-pointer user-select-none text-right pointer-event-none"
                   v-if="!optionsHasValue || !dataHasValue"
                >
                    آیتمی برای انتخاب وجود ندارد.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        CopyOf, HasLength
    } from "@vendor/plugin/helper";

    export default {
        name: "Select",
        data: () => ({
            data: {},
            timer: null,
            selected: {},
            search: {
                value: '',
                isPending: false
            },
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
            searchable: {
                type: Boolean,
                default: false
            },
            filterBy: {
                type: Function,
                default( search ) {
                    return  Object.values(CopyOf( this.options ))
                        .filter(item => item[this.label].toLowerCase().includes(search.toLowerCase()));
                }
            },
            placeholder: {
                type: String,
                default: ''
            },
            label: {
                type: String,
                default: 'text'
            },
            required: {
                Type: Boolean,
                default: true
            }
        },
        computed: {
            optionsHasValue() {
                return HasLength( this.options )
            },
            dataHasValue() {
                return HasLength( this.data )
            },
        },
        watch: {
            options( newVal ) {
                this.data = { ...newVal }
            }
        },
        methods: {
            resetValue() {
                this.$set(this, 'selected', {});
            },
            resetFilter() {
                this.data = { ...this.options };
                this.$set(this.search, 'value', '');
            },
            onClickOutside() {
                this.$set( this, 'shouldBeShowOption', false );
                this.resetFilter();
            },
            onClickInputField() {
                this.$set( this, 'shouldBeShowOption', !this.shouldBeShowOption );
            },
            /**
             * @return  { Object }
             */
            onClickOptions( option ) {
                this.$set( this, 'selected', option);
                this.$emit('onChange', CopyOf(option));
                this.onClickOutside();
                // let {
                //     options
                // } = this;
                // if ( ! ) {
                //     let prevSelectedOption =
                //         (
                //             Array.isArray( options ) ? options : Object.keys( options )
                //         ).find( item => item.selected );
                //     if ( prevSelectedOption )
                //         this.$set( prevSelectedOption, 'selected', false );
                // }
                // this.$set( option, 'selected', true );
                // this.$set( this, 'selected', option);
                // this.$emit('onChange', CopyOf(option));
                // this.onClickOutside();
            },
            onChangeFilterField() {
                try {
                    clearTimeout( this.timer );
                    this.$set(this, 'timer', null);
                    this.timer = setTimeout( async () => {
                        this.$set(this.search, 'isPending', true);
                        let newData = await this.filterBy(this.search.value);
                        this.data = {...newData};
                        this.$set(this.search, 'isPending', false);
                    }, 300);
                } catch (e) {}
            },
        },
        mounted() {
            this.data = { ...this.options }
        }
    }
</script>