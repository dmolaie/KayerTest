<template>
    <div class="category w-full block">
        <div class="category__item w-full block"
             v-for="item in list"
             :key="'category-' + item.id"
        >
            <div class="w-full flex items-center user-select-none"
                 :class="[
                     'fa' === lang ? 'direction-rtl' : 'direction-ltr',
                     !item.is_active ? 'category__item--disable' : '',

                 ]"
                 :style="`padding-${'fa' === lang ? 'right' : 'left'}: ${item.gap}px`"
            >
                <label class="inline-flex items-center cursor-pointer"
                       @click.prevent="onClickCategoriesItems( item )"
                >
                    <input type="checkbox"
                           class="category__input none"
                           :disabled="!item.is_active"
                           :value="item.id"
                           v-model="selectedItems"
                    />
                    <span class="category__checkbox relative border border-solid rounded-1/2 flex-shrink-0"
                    > </span>
                    <span class="category__text font-xs font-bold text-bayoux"
                          v-text="'fa' === lang ? item.name_fa : item.name_en"
                    > </span>
                </label>
                <template v-if="!!selectedItems.length && !hasLength( item.children_ids )">
                    <span v-if="isMainCategory( item.id )"
                          class="category__label font-1xs font-bold text-green-200 cursor-default text-center"
                          :class="[ 'fa' === lang ? 'm-r-auto' : 'm-l-auto' ]"
                    >
                        اصلی
                    </span>
                    <button v-else-if="categoryIsSelected( item.id )"
                        class="category__label font-1xs font-bold text-gray cursor-pointer text-center"
                        :class="[ 'fa' === lang ? 'm-r-auto' : 'm-l-auto' ]"
                        @click="onClickDoMainCategory( item.id )"
                    >
                        اصلی شود
                    </button>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        Length, HasLength, CopyOf
    } from "@vendor/plugin/helper";

    export default {
        name: "Category",
        data: () => ({
            selectedItems: []
        }),
        props: {
            list: {
                type: Object,
                required: true
            },
            lang: {
                type: String,
                required: true
            },
            value: {
                type: Array,
                default: () => ([])
            }
        },
        watch: {
            value( newVal ) {
                if ( HasLength( newVal ) ) {
                    this.$set(this, 'selectedItems', CopyOf( newVal ))
                }
            }
        },
        methods: {
            hasLength( payload ) {
                return HasLength( payload )
            },
            reset() {
                this.$set(this, 'selectedItems', []);
            },
            emitter() {
                this.$emit('change', this.selectedItems)
            },
            isMainCategory( category_id ) {
                try {
                    return this.selectedItems[0] === category_id
                } catch (e) {}
            },
            categoryIsSelected( category_id ) {
                try {
                    return this.selectedItems.includes( category_id )
                } catch (e) {}
            },
            onClickDoMainCategory( category_id ) {
                try {
                    let index = this.selectedItems.findIndex(id => id === category_id);
                    if ( index >= 0 ) {
                        this.selectedItems.splice(index, 1);
                        this.selectedItems.unshift( category_id );
                        this.emitter();
                    }
                } catch (e) {}
            },
            toggleParentItem( parent_id ) {
                const { selectedItems, list } = this;
                const LIST = Object.values( list );
                const PARENT_ITEM = LIST.find(({ id }) => id === parent_id);
                if ( !!PARENT_ITEM ) {
                    const IS_CHECKED = PARENT_ITEM['children_ids'].some(id => selectedItems.includes( id ));
                    if ( !IS_CHECKED ) {
                        const PARENT_INDEX = selectedItems.findIndex(id => id === parent_id);
                        this.$delete(selectedItems, PARENT_INDEX);
                    } else {
                        !selectedItems.includes(PARENT_ITEM.id) && this.$set(selectedItems, Length( selectedItems ), PARENT_ITEM.id);
                    }
                }
            },
            onClickCategoriesItems( item ) {
                const { selectedItems } = this;
                const IS_CHECKED = selectedItems.includes( item['id'] );
                if ( !IS_CHECKED ) {
                    const SET = new Set([
                        ...selectedItems,
                        ...item['children_ids'],
                        item['id']
                    ]);
                    this.$set(this, 'selectedItems', [...SET]);
                }
                else {
                    const SET = new Set([
                        ...selectedItems
                    ]);
                    item['children_ids'].forEach(id => SET.delete( id ));
                    SET.delete(item['id']);
                    this.$set(this, 'selectedItems', [...SET]);
                }
                !!item.parent_id && this.toggleParentItem( item.parent_id );
                this.emitter();
            }
        },
    }
</script>