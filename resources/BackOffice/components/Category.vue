<template>
    <div class="category w-full block">
        <div class="category__item w-full block"
             v-for="item in list"
             :key="item.id"
        >
            <label class="w-full flex items-center user-select-none"
                   :class="[
                       'fa' === lang ? 'direction-rtl' : 'direction-ltr',
                       item.is_active ? 'cursor-pointer' : 'category__item--disable'
                   ]"
            >
                <input type="checkbox"
                       class="category__input none"
                       :disabled="!item.is_active"
                       :checked="item.checked"
                       :value="item.id"
                       @change="() => {onChangeCheckboxField( item ); item.checked = !item.checked}"
                />
                <span class="category__checkbox relative border border-solid rounded-1/2 flex-shrink-0"
                > </span>
                <span class="category__text font-xs font-bold text-bayoux"
                      v-text="'fa' === lang ? item.name_fa : item.name_en"
                > </span>
            </label>
            <div class="category__children"
                 :class="'fa' === lang ? 'm-r' : 'm-l'"
                 v-if="!!item.children.length"
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
    export default {
        name: "Category",
        props: {
            list: {
                type: [Object, Array],
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
            }
        }
    }
</script>