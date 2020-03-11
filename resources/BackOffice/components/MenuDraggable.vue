<template>
    <draggable class="c-menu__dragArea" tag="div"
               v-model="list"
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
    import ModalCm from '@vendor/components/modal/Index.vue';

    export default {
        name: "MenuDraggable",
        display: "Nested",
        order: 0,
        data: () => ({
            selectedItem: {}
        }),
        props: {
            list: {
                value: [Object, Array],
                required: true,
            }
        },
        components: {
            ModalCm, draggable
        },
        computed: {
        },
        methods: {
            forceUpdate() {
                this.$forceUpdate();
            },
            onClickToggleActiveItem( item ) {
                this.$emit('onClickToggleActiveItem', item );
            },
            onClickRemoveItem( item, parentObj ) {
                let r = {
                    parentObj,
                    ...item,
                } ;
                console.log(r, 'v');
                this.$refs['confirm'].visible();
                Object.assign( this.selectedItem, r );
                // this.$emit('onClickRemoveItem', {
                //     parentObj,
                //     ...item,
                // });
            },
            async onClickConfirmSubmitButton() {
                this.$refs['confirm'].hidden();
                // await Service._onClickRemoveItem( this.selectedItem );
                this.selectedItem.parentObj.splice(this.selectedItem.index, 1);
                this.$set( this, 'selectedItem', {} );
            },
            onClickDiscardSubmitButton() {
                this.$refs['confirm'].hidden();
                this.$set( this, 'selectedItem', {} );
            }
        },
    };
</script>