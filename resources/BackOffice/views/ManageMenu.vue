<template>
    <div class="c-menu w-full w-full">
        <div class="c-menu__container w-full inner-box inner-box--white">
            <div class="box box--white w-full">
                <div class="box__header border-2 border-solid"
                ></div>
                <div class="c-menu__box box__body border-2 border-t-0 border-solid">
                    <div class="flex items-center">
                        <h1 class="text-blue-800 font-24 font-bold cursor-default">
                            منوی اصلی
                        </h1>
                        <button class="c-menu__button c-menu__button--white text-blue-800 font-lg font-bold border border-solid rounded m-r-auto">
                            اضافه کردن
                        </button>
                    </div>
                    <div class="c-menu__draggable block w-full">
                        <menu-draggable :list="items"
                        />
                    </div>
                    ManageMenuManageMenuManageMenu
                </div>
            </div>
        </div>
        <modal-cm>
            <div class="modal:medium bg-white rounded-10">
                <div class="modal__header flex items-center justify-between rounded-inherit">
                    <span class="text-blue-800 font-lg font-bold cursor-default">
                        اضافه کردن منوها
                    </span>
                    <button class="modal__button relative"
                    > </button>
                </div>
                <div class="modal__content">
                    <label class="flex items-center w-full">
                        <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                            نام منو
                        </span>
                        <input type="text"
                               class="modal__input input input--white text-blue-800 border border-solid rounded font-base font-light flex-1"
                               placeholder="نام منو را وارد کنید"
                        >
                    </label>
                    <label class="flex items-center w-full">
                        <span class="modal__label text-blue-800 font-lg font-bold flex-shrink-0">
                            URL
                        </span>
                        <input type="text"
                               class="modal__input input input--white text-blue-800 border border-solid rounded font-base font-light flex-1"
                               placeholder="URL را وارد کنید"
                        >
                    </label>
                </div>
                <button class="modal__submit block text-white font-lg font-bold border border-solid rounded m-0-auto text-center l:transition-bg">
                    تایید
                </button>
            </div>
        </modal-cm>
    </div>
</template>

<script>
    import MenuDraggable from "@components/MenuDraggable";
    import ModalCm from '@vendor/components/modal/Index.vue';
    import ManageMenuService from '@services/service/ManageMenu';

    let Service = null;

    export default {
        name: "ManageMenu",
        data: () => ({
            items: [
                {
                    id: 1,
                    name: 'parent 1',
                    items: [],
                },
                {
                    id: 2,
                    name: 'parent 2',
                    items: [
                        {
                            id: 3,
                            name: 'child 1'
                        },
                        {
                            id: 4,
                            name: 'child 2'
                        }
                    ]
                }
            ],
        }),
        components: {
            MenuDraggable, ModalCm,
        },
        methods: {
        },
        async mounted() {
            Service = new ManageMenuService( this );
            await Service.getList();
        }
    }
</script>