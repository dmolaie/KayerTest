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
                           @change="() => {onChangeCheckboxField( item ); item.checked = !item.checked}"
                    />
                    <span class="category__checkbox relative border border-solid rounded-1/2 flex-shrink-0"
                    > </span>
                    <span class="category__text font-xs font-bold text-bayoux"
                          v-text="'fa' === lang ? item.name_fa : item.name_en"
                    > </span>
                </label>
                <template v-if="!!selectedItems.length">
                    <span v-if="isMainCategory( item.id )"
                          class="font-1xs font-bold text-green-200 cursor-default"
                          :class="[ 'fa' === lang ? 'm-r-auto' : 'm-l-auto' ]"
                    >
                        اصلی
                    </span>
                    <button v-else-if="categoryIsSelected( item.id )"
                        class="font-1xs font-bold text-gray cursor-pointer"
                        :class="[ 'fa' === lang ? 'm-r-auto' : 'm-l-auto' ]"
                        @click="onClickDoMainCategory( item.id )"
                    >
                        اصلی شود
                    </button>
                </template>
            </div>
            <div class="category__children"
                 :class="'fa' === lang ? 'm-r' : 'm-l'"
                 v-if="!!item.children.length && false"
            >
                <category :list="item.children"
                          :lang="lang"
                          @onChange="onChangeCheckboxField"
                />
            </div>
        </div>
    </div>
</template>

<script>
    import {
        HasLength
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
            }
        },
        methods: {
            onChangeCheckboxField( item ) {
                this.$emit('onChange', item)
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
                    let index = this.selectedItems.findIndex(({ id }) => id === category_id);
                    this.selectedItems.splice(index, 1);
                    this.selectedItems.unshift( category_id );
                } catch (e) {}
            }
        }
    }
</script>