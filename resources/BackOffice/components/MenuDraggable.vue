<template>
    <draggable class="c-menu__dragArea" tag="div"
               :group="{ name: 'menu' }"
               :list="list"
               :value="value"
               @input="emitter"
               handle=".handle"
               ghost-class="ghost"
    >
        <div v-for="(item, index) in realValue"
             :key="item.id"
             class="c-menu__tree w-full block"
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
                      @click="onClickToggleChild( item )"
                      v-text="item.name"
                > </span>
                <button class="c-menu__item_btn flex-shrink-0 border-r m-r-auto"
                        :class="[ item.active ? 'c-menu__item_btn--unvisible' : 'c-menu__item_btn--visible' ]"
                        @click.prevent="onClickToggleActiveItem( item, realValue )"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--edit flex-shrink-0 border-r"
                        @click="onClickEditButton( item )"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--delete flex-shrink-0 border-r"
                        @click.prevent="onClickRemoveItem( {...item, index}, realValue )"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--drag border-r flex-shrink-0 handle"
                > </button>
            </div>
            <div class="w-full"
                 v-if="!!item.is_edit"
            >
                <manage-menu-form-cm :item="item"
                                     :menuType="menuType"
                                     :parentItem="realValue"
                                     @onToggleChild="onToggleChild"
                />
            </div>
            <div class="c-menu__child"
            >
                <menu-draggable :list="item.children"
                                @onClickToggleActiveItem="onClickToggleActiveItem"
                                @onClickRemoveItem="onClickRemoveItem"
                                @input="emitter"
                                @onToggleChild="onToggleChild"
                                :menuType="menuType"
                />
            </div>
        </div>
    </draggable>
</template>

<script>
    import draggable from "vuedraggable";
    import ManageMenuFormCm from "@components/ManageMenu/Form.vue";
    import {
        CopyOf
    } from "@vendor/plugin/helper";

    export default {
        name: "MenuDraggable",
        display: "Nested",
        order: 0,
        data: () => ({
            edit: {}
        }),
        props: {
            value: {
                required: false,
                type: Array,
                default: null
            },
            list: {
                value: [Object, Array],
            },
            menuType: {
                type: [Object, Array],
                required: true
            }
        },
        components: {
            draggable, ManageMenuFormCm
        },
        computed: {
            realValue() {
                return this.value ? this.value : this.list;
            }
        },
        methods: {
            emitter( value ) {
              this.$emit("input", value)
            },
            onClickToggleActiveItem( item, parentObj ) {
                this.$emit('onClickToggleActiveItem', {
                    parentObj,
                    ...item,
                });
            },
            onToggleChild() {
                this.$emit('onToggleChild')
            },
            onClickToggleChild( item ) {
                this.$set(item, 'is_opened', !item.is_opened);
                this.onToggleChild();
            },
            onClickEditButton( item ) {
                this.$set(item, 'is_edit', !item.is_edit);
                this.onToggleChild();
            },
            onClickRemoveItem( item, parentObj ) {
                this.$emit('onClickRemoveItem', {
                    parentObj,
                    ...item,
                });
            },
            onChangeSearchMethod( value ) {
                // console.log(value);
            },
        },
    };
</script>