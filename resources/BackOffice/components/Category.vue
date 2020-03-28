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
            >
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox"
                           class="category__input none"
                           :disabled="!item.is_active"
                           :checked="item.checked"
                           :value="item.id"
                           v-model="selectedItems"
                           @change="() => {onChangeCheckboxField(); item.checked = !item.checked}"
                    />
                    <span class="category__checkbox relative border border-solid rounded-1/2 flex-shrink-0"
                    > </span>
                    <span class="category__text font-xs font-bold text-bayoux"
                          v-text="'fa' === lang ? item.name_fa : item.name_en"
                    > </span>
                </label>
                <template v-if="!!selectedItems.length">
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
        HasLength, CopyOf
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
                if ( HasLength( newVal ) )
                    this.$set(this, 'selectedItems', CopyOf( newVal ))
            }
        },
        methods: {
            reset() {
                this.$set(this, 'selectedItems', []);
            },
            onChangeCheckboxField() {
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
                        this.onChangeCheckboxField();
                    }
                } catch (e) {}
            }
        },
    }
</script>