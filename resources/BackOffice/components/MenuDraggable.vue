<template>
    <draggable class="c-menu__dragArea" tag="div"
               :list="list"
               :group="{ name: 'menu' }"
               handle=".handle"
               ghost-class="ghost"
    >
        <div v-for="(item, index) in list"
             :key="item.id"
             class="c-menu__tree w-full block"
        >
            <div class="c-menu__item w-full flex items-center border border-solid rounded font-lg font-bold text-blue-800 cursor-pointer user-select-none"
                 :class="[ (!!item.children && item.children.length) ? 'c-menu__item--parent' : 'c-menu__item--child' ]"
            >
                {{ item.name }}
                <button class="c-menu__item_btn border-r m-r-auto"
                        :class="[ item.active ? 'c-menu__item_btn--unvisible' : 'c-menu__item_btn--visible' ]"
                        @click.prevent="onClickToggleActiveItem( item )"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--edit border-r"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--delete border-r"
                        @click.prevent="onClickRemoveItem( {...item, index}, list )"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--drag border-r handle"
                > </button>
            </div>
            <div class="c-menu__child">
                <menu-draggable :list="item.children"
                                @onClickToggleActiveItem="onClickToggleActiveItem"
                                @onClickRemoveItem="onClickRemoveItem"
                />
            </div>
        </div>
    </draggable>
</template>

<script>
    import draggable from "vuedraggable";

    export default {
        name: "MenuDraggable",
        display: "Nested",
        order: 0,
        props: {
            list: {
                type: Array,
                required: true,
                default: () => ([])
            }
        },
        components: {
            draggable
        },
        computed: {
        },
        methods: {
            emitter(value) {
                this.$emit("input", value);
            },
            onClickToggleActiveItem( item ) {
                this.$emit('onClickToggleActiveItem', item );
            },
            onClickRemoveItem( item, parent ) {
                this.$emit('onClickRemoveItem', {
                    parent,
                    ...item,
                })
            }
        },
    };
</script>