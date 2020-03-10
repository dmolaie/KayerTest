<template>
    <draggable class="c-menu__dragArea" tag="div"
               :list="list"
               :group="{ name: 'menu' }"
               handle=".handle"
               ghost-class="ghost"
    >
        <div v-for="item in list"
             :key="item.id"
             class="c-menu__tree w-full block"
        >
            <div class="c-menu__item w-full flex items-center border border-solid rounded font-lg font-bold text-blue-800 cursor-pointer user-select-none"
                 :class="[ (!!item.items && item.items.length) ? 'c-menu__item--parent' : 'c-menu__item--child' ]"
            >
                {{ item.name }}
                <button class="c-menu__item_btn border-r m-r-auto"
                        :class="[
                                            false ? 'c-menu__item_btn--visible' : 'c-menu__item_btn--unvisible'
                                        ]"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--edit border-r"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--delete border-r"
                > </button>
                <button class="c-menu__item_btn c-menu__item_btn--drag border-r handle"
                > </button>
            </div>
            <div class="c-menu__child">
                <menu-draggable :list="item.items"
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
            }
        },
    };
</script>