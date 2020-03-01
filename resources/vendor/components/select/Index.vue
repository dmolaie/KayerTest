<template>
    <div class="select">
        <div :class="[ 'dropdown__wrapper relative', {
                'sla': ( !shouldBeShow )
             }]"
             v-click-outside="onClickOutside"
        >
            <div class="dropdown__input relative font-sm font-bold border-blue-100-1 rounded cursor-pointer text-nowrap overflow-hidden user-select-none"
                 v-text="selected.text"
            > </div>
            <div class="dropdown__body absolute w-full bg-white rounded opacity-0 visibility-hidden pointer-event-none transition-opacity z-10"
                 style="opacity: 1; pointer-events: all"
            >
                <div class="dropdown__options w-full">
                    <button v-for="(option, index) in options"
                         :key="index"
                         class="dropdown__option w-full block text-bayoux font-medium cursor-pointer user-select-none text-right"
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
        data() {
            return {
                shouldBeShow: false,
                PREFIX: 'drp',
                selected: {
                    text: this.placeholder,
                    value: '',
                }
            }
        },
        props: {
            options: {
                type: Array,
                required: true
            },
            multiple: {
                type: Boolean,
                default: false
            },
            placeholder: {
                type: String,
                default: ''
            }
        },
        methods: {
            onClickOutside() {
                this.$set( this, 'shouldBeShow', false );
                console.log('onClickOutside');
            }
        },
        mounted() {
        }
    }
</script>

<!--<template>-->
<!--    <div :dir="dir" class="v-select" :class="stateClasses">-->
<!--        <div ref="toggle" @mousedown.prevent="toggleDropdown" class="vs__dropdown-toggle">-->

<!--            <div class="vs__selected-options" ref="selectedOptions">-->
<!--                <slot v-for="option in selectedValue"-->
<!--                      name="selected-option-container"-->
<!--                      :option="normalizeOptionForSlot(option)"-->
<!--                      :deselect="deselect"-->
<!--                      :multiple="multiple"-->
<!--                      :disabled="disabled">-->
<!--                      <span :key="getOptionKey(option)" class="vs__selected">-->
<!--                        <slot name="selected-option" v-bind="normalizeOptionForSlot(option)">-->
<!--                          {{ getOptionLabel(option) }}-->
<!--                        </slot>-->
<!--                        <button v-if="multiple" :disabled="disabled" @click="deselect(option)" type="button" class="vs__deselect" aria-label="Deselect option" ref="deselectButtons">-->
<!--                          <component :is="childComponents.Deselect" />-->
<!--                        </button>-->
<!--                      </span>-->
<!--                </slot>-->

<!--                <slot name="search" v-bind="scope.search">-->
<!--                    <input class="vs__search" v-bind="scope.search.attributes" v-on="scope.search.events">-->
<!--                </slot>-->
<!--            </div>-->

<!--            <div class="vs__actions" ref="actions">-->
<!--                <button-->
<!--                        v-show="showClearButton"-->
<!--                        :disabled="disabled"-->
<!--                        @click="clearSelection"-->
<!--                        type="button"-->
<!--                        class="vs__clear"-->
<!--                        title="Clear selection"-->
<!--                        ref="clearButton"-->
<!--                >-->
<!--                    <component :is="childComponents.Deselect" />-->
<!--                </button>-->

<!--                <slot name="open-indicator" v-bind="scope.openIndicator">-->
<!--                    <component :is="childComponents.OpenIndicator" v-if="!noDrop" v-bind="scope.openIndicator.attributes"/>-->
<!--                </slot>-->

<!--                <slot name="spinner" v-bind="scope.spinner">-->
<!--                    <div class="vs__spinner" v-show="mutableLoading">Loading...</div>-->
<!--                </slot>-->
<!--            </div>-->
<!--        </div>-->

<!--        <transition :name="transition">-->
<!--            <ul ref="dropdownMenu" v-if="dropdownOpen" class="vs__dropdown-menu" role="listbox" @mousedown.prevent="onMousedown" @mouseup="onMouseUp">-->
<!--                <li-->
<!--                        role="option"-->
<!--                        v-for="(option, index) in filteredOptions"-->
<!--                        :key="getOptionKey(option)"-->
<!--                        class="vs__dropdown-option"-->
<!--                        :class="{ 'vs__dropdown-option&#45;&#45;selected': isOptionSelected(option), 'vs__dropdown-option&#45;&#45;highlight': index === typeAheadPointer, 'vs__dropdown-option&#45;&#45;disabled': !selectable(option) }"-->
<!--                        @mouseover="selectable(option) ? typeAheadPointer = index : null"-->
<!--                        @mousedown.prevent.stop="selectable(option) ? select(option) : null"-->
<!--                >-->
<!--                    <slot name="option" v-bind="normalizeOptionForSlot(option)">-->
<!--                        {{ getOptionLabel(option) }}-->
<!--                    </slot>-->
<!--                </li>-->
<!--                <li v-if="!filteredOptions.length" class="vs__no-options" @mousedown.stop="">-->
<!--                    <slot name="no-options">Sorry, no matching options.</slot>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </transition>-->
<!--    </div>-->
<!--</template>-->