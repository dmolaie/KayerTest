<template>
    <VueNestable v-model="data"
                 @change="change"
                 rtl
                 class-prop="class"
    >
        <div slot="placeholder">
            <p class="font-base font-bold text-blue-800 text-center p-20">
                در حال دریافت اطلاعات...
            </p>
        </div>
        <VueNestableHandle slot-scope="{ item, index }"
                           :item="item"
        >
            <div class="c-menu__tree w-full block"
                 :class="{
                     'c-menu__tree--disabled': ( !item.active ),
                     'c-menu__tree--closed overflow-hidden': ( !item.is_opened ),
                     'c-menu__tree--editable': ( !item.is_opened && item.is_edit ),
                 }"
            >
                <div class="c-menu__item w-full flex items-center border border-solid rounded font-lg font-bold text-blue-800 user-select-none"
                     :class="[ (!!item.children && item.children.length) ? 'c-menu__item--parent cursor-pointer' : 'c-menu__item--child cursor-default']"
                >
                    <span class="c-menu__item_title inline-flex items-center flex-1"
                          v-text="item.name"
                    > </span>
                    <button class="c-menu__item_btn flex-shrink-0 border-r m-r-auto"
                            :class="[ item.active ? 'c-menu__item_btn--unvisible' : 'c-menu__item_btn--visible' ]"
                            @click.prevent="onClickToggleActiveItem( item, index )"
                    > </button>
                    <button class="c-menu__item_btn c-menu__item_btn--edit flex-shrink-0 border-r"
                            @click="onClickEditButton( item )"
                    > </button>
                    <button class="c-menu__item_btn c-menu__item_btn--delete flex-shrink-0 border-r"
                            @click.prevent="onClickRemoveItem( item.id )"
                    > </button>
                    <VueNestableHandle :item="item">
                        <button class="c-menu__item_btn c-menu__item_btn--drag flex border-r flex-shrink-0 handle"
                        > </button>
                    </VueNestableHandle>
                </div>
                <template v-if="item.is_edit">
                    <manage-menu-form-cm :item="item"
                                         :index="index"
                                         :menuType="menuType"
                    />
                </template>
            </div>
        </VueNestableHandle>
    </VueNestable>
</template>

<script>
    import {
        HasLength
    } from "@vendor/plugin/helper";
    import ManageMenuFormCm from "@components/ManageMenu/Form.vue";

    export default {
        name: "MenuList",
        data () {
            return {
                nestableItems: [
                    {
                        id: 0,
                        text: 'Andy 1'
                    },
                    {
                        id: 1,
                        text: 'Harry',
                        children: [{
                            id: 2,
                            text: 'David'
                        }]
                    },
                    {
                        id: 3,
                        text: 'Lisa'
                    }
                ]
            }
        },
        props: {
            list: {
                type: [Object, Array],
            },
            menuType: {
                type: [Object, Array],
                required: true
            }
        },
        components: {
            ManageMenuFormCm
        },
        computed: {
            data: {
                get() {
                    return ( !!this.list && HasLength(this.list) ) ? (
                        Object.values( this.list )
                    ) : ([])
                },
                set( newVal ){
                    this.$emit('input', newVal)
                }
            },
        },
        methods: {
            change(_, { items }) {
                this.$emit('change', items);
            },
            onClickToggleActiveItem(item, index) {
                this.$set(item, 'active', !item.active);
                this.$emit('toggleActive', {
                    ...item,
                    index
                });
            },
            onClickEditButton( item ) {
                this.$set(item, 'is_edit', !item.is_edit);
            },
            onClickRemoveItem( id ) {
                this.$emit('removeItem', {
                    id
                });
            },
        }
    }
</script>