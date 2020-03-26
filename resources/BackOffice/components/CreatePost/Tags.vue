<template>
    <div class="tags relative"
         v-click-outside="onClickOutSide"
    >
        <ul class="tags__wrapper w-full flex flex-wrap"
            :class="tagWrapperClassName"

        >
            <li v-for="(item, index) in selectedTags"
                :key="'tags-' + index"
                tabindex="0"
                class="tags__item font-xs font-medium rounded-1/2"
            >
                <div class="tags__item_content w-full h-full flex items-center l:transition-bg cursor-default"
                     :class="tagClassName"
                >
                    {{ item[textLabel] }}
                    <span class="tags__item_remove relative flex-shrink-0 cursor-pointer"
                          @click.prevent="removeTagsFromSelectedList( item, index )"
                    > </span>
                </div>
            </li>
            <li class="tags__input_wrapper flex-1">
                <input type="text"
                       class="tags__input w-full h-full block bg-transparent"
                       :class="inputClassName"
                       @keyup.enter="CreateNewTag"
                       @input="onInputField"
                       @focusin="showAutocompleteDropDown"
                       v-model="inputField"
                       :placeholder="placeholder"
                       autocomplete="off"
                >
            </li>
        </ul>
        <div class="tags__autocomplete absolute w-full overflow-auto"
             v-if="shouldBeShowAutocomplete"
        >
            <template v-if="filteredAutocompleteItems.length">
                <button v-for="(item, index) in filteredAutocompleteItems"
                        :key="'item-' + index"
                        v-text="item[textLabel]"
                        class="tags__autocomplete_items block w-full font-sm font-medium text-bayoux"
                        :class="[
                            itemClassName,
                            {
                                'none': item.hidden
                            }
                        ]"
                        @click.prevent="onClickAutocompleteItem( item )"
                > </button>
            </template>
            <template v-else>
                <span class="block w-full text-blue-800 font-sm font-medium text-center bg-white"
                      style="padding: 10px 0"
                >
                    عنوان دسته‌بندی برای انتخاب وجود ندارد
                </span>
            </template>
        </div>
    </div>
</template>

<script>
    import {
        CopyOf, Length, HasLength
    } from "@vendor/plugin/helper";

    export default {
        name: "Tags",
        data: () => ({
            timer: null,
            selectedTags: [],
            inputField: '',
            shouldBeShowAutocomplete: false
        }),
        props: {
            list: {
                type: Object,
                required: true
            },
            value: {
                type: Array,
                default: () => ([])
            },
            textLabel: {
                type: String,
                default: 'name_fa'
            },
            placeholder: {
                type: String,
                default: ''
            },
            tagWrapperClassName: {
                type: String,
                default: ''
            },
            inputClassName: {
                type: String,
                default: ''
            },
            tagClassName: {
                type: String,
                default: ''
            },
            itemClassName: {
                type: String,
                default: ''
            }
        },
        computed: {
            items() {
                return CopyOf(Object.values( this.list ))
            },
            filteredAutocompleteItems() {
                return (
                    this.items.filter(item => item[this.textLabel].includes( this.inputField ) )
                );
            }
        },
        watch: {
            value( newVal ) {
                if ( HasLength( newVal ) )
                    this.$set(this, 'selectedTags', newVal);
                console.log(newVal, 'newVal');
            }
        },
        methods: {
            /**
             * @return { Array }
             */
            passListToParent() {
                this.$emit('onChange', this.selectedTags)
            },
            showAutocompleteDropDown() {
                this.$set(this, 'shouldBeShowAutocomplete', true);
            },
            hiddenAutocompleteDropDown() {
                this.$set(this, 'shouldBeShowAutocomplete', false);
            },
            onInputField() {
                try {
                    clearTimeout( this.timer );
                    this.$set(this, 'timer', null);
                    this.timer = setTimeout(() => {
                        (
                            !!this.inputField.trim()
                        ) ? (
                            this.showAutocompleteDropDown()
                        ) : (
                            this.hiddenAutocompleteDropDown()
                        );
                    }, 320)
                } catch (e) {}
            },
            onClickAutocompleteItem( item ) {
                this.$set(item, 'hidden', true);
                this.selectedTags.push(item);
                this.hiddenAutocompleteDropDown();
                this.$set(this, 'inputField', '');
                this.passListToParent();
            },
            removeTagsFromSelectedList( item, index ) {
                this.$set(item, 'hidden', false);
                this.selectedTags.splice(index, 1);
                this.passListToParent();
            },
            /**
             * TODO: Check List Before Create & LowerCase
             */
            CreateNewTag() {
                // let selectedItem =
                //     this.selectedTags
                //         .map( ({ name }) => name );
                // if (!selectedItem.includes(this.inputField) ) {
                //     if ( Length( this.inputField.trim() ) > 2 ) {
                //         this.selectedTags.push({
                //             name: this.inputField,
                //             hidden: true,
                //         });
                //         this.$set(this, 'inputField', '');
                //     }
                // } else {
                //     this.displayNotification('این تگ درحال حاظر انتخاب شده است.', {
                //         type: 'error'
                //     })
                // }
            },
            onClickOutSide() {
                this.hiddenAutocompleteDropDown();
            },
        }
    }
</script>