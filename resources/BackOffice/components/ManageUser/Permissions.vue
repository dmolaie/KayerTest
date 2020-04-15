<template>
    <div class="">
        <div class="text-blue-800"
             v-for="permission in data.list"
        >
            <span class="block w-full font-base font-bold"
                  v-text="permission.name"
            > </span>
            <div class="p-confirm__sub flex flex-wrap">
                <button v-for="sub in permission.items"
                        class="p-confirm__item relative w-1/6 font-sm font-medium text-right"
                        @click.stop="onClickTogglePermissionDropdown(sub)"
                >
                    {{ sub.name_fa }}
                    <dropdown-cm :visibility="sub.is_opened"
                                 :clickOutside="true"
                                 @onClickOutside="onClickTogglePermissionDropdown(sub)"
                    >
                        <label class="dropdown__item checkbox-square w-full relative flex items-center text-nowrap cursor-pointer"
                               @click.stop
                        >
                            <input type="checkbox"
                                   class="checkbox-square__input"
                            />
                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                            <span class="checkbox-square__label font-sm font-medium user-select-none">
                                فارسی
                            </span>
                        </label>
                        <label class="dropdown__item checkbox-square w-full relative flex items-center text-nowrap cursor-pointer"
                               @click.stop
                        >
                            <input type="checkbox"
                                   class="checkbox-square__input"
                            />
                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"> </span>
                            <span class="checkbox-square__label font-sm font-medium rounded user-select-none">
                                انگلیسی
                            </span>
                        </label>
                    </dropdown-cm>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import DropdownCm from '@vendor/components/dropdown/Index.vue';

    export default {
        name: "Permissions",
        data: () => ({

        }),
        props: {
            data: {
                type: [Object, Array],
                required: true
            }
        },
        components: {
            DropdownCm
        },
        methods: {
            onClickTogglePermissionDropdown( role ) {
                console.log(role);
                this.$set(role, 'is_opened', !role.is_opened);
            }
        }
    }
</script>