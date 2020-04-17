<template>
    <div class="permission w-full block">
        <ul class="permission__list w-full"
             v-for="(item, name) in data.list"
             :key="'permission-' + name"
        >
            <li class="block w-full">
                <div class="checkbox-square w-full relative flex items-center text-nowrap cursor-pointer"
                     @click.stop="toggleParentItem( item )"
                >
                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"
                          :class="{
                               'permission__checkbox--checked': (!!item.checked),
                               'permission__checkbox--indeterminate': (!!item.indeterminate)
                          }"
                    > </span>
                    <span class="permission__text--blue checkbox-square__label text-blue-800 rounded font-base font-bold user-select-none"
                          v-text="item.name"
                    > </span>
                </div>
                <ul class="block m-0-20"
                    v-for="(nested, i) in item.items"
                    :key="'nested-' + i"
                >
                    <li class="block w-full">
                        <div class="checkbox-square w-full relative flex items-center text-nowrap cursor-pointer"
                             @click.stop="toggleNestedItem(item, nested)"
                        >
                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"
                                  :class="{
                                       'permission__checkbox--indeterminate': (!!nested.checked_fa || !!nested.checked_en),
                                       'permission__checkbox--checked': (!!nested.checked),
                                  }"
                            > </span>
                            <span class="checkbox-square__label rounded font-sm font-medium user-select-none"
                                  v-text="nested.name_fa"
                            > </span>
                        </div>
                        <div class="flex">
                            <template v-if="onlyFa.includes( name )">
                                <div class="w-1/2 checkbox-square w-full relative flex items-center text-nowrap cursor-pointer m-0-20"
                                     @click.stop="toggleMultiItem(item, nested)"
                                >
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"
                                          :class="{ 'permission__checkbox--checked': !!nested.checked_fa }"
                                    > </span>
                                    <span class="permission__text--rum checkbox-square__label rounded font-xs font-normal user-select-none"
                                          v-text="'زبان فارسی'"
                                    > </span>
                                </div>
                            </template>
                            <template v-else>
                                <div class="w-1/2 checkbox-square w-full relative flex items-center text-nowrap cursor-pointer m-0-20"
                                     @click.stop="toggleItem(item, nested, 'checked_fa')"
                                >
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"
                                          :class="{ 'permission__checkbox--checked': !!nested.checked_fa }"
                                    > </span>
                                    <span class="permission__text--rum checkbox-square__label rounded font-xs font-normal user-select-none"
                                          v-text="'زبان فارسی'"
                                    > </span>
                                </div>
                                <div class="w-1/2 checkbox-square w-full relative flex items-center text-nowrap cursor-pointer m-0-20"
                                     @click.stop="toggleItem(item, nested, 'checked_en')"
                                >
                                    <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"
                                          :class="{ 'permission__checkbox--checked': !!nested.checked_en }"
                                    > </span>
                                    <span class="permission__text--rum checkbox-square__label rounded font-xs font-normal user-select-none"
                                          v-text="'زبان انگلیسی'"
                                    > </span>
                                </div>
                            </template>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Permissions",
        data: () => ({
            onlyFa: ['article']
        }),
        props: {
            data: {
                type: [Object, Array],
                required: true
            }
        },
        methods: {
            checkParentItem( item ) {
                const CHECKED = item['items'].every(nested => !!nested.checked);
                const INDETERMINATE = item['items'].some(nested => !!nested.checked_fa || !!nested.checked_en);
                this.$set(item, 'checked', CHECKED);
                this.$set(item, 'indeterminate', INDETERMINATE);
            },
            checkedItem( item ) {
                this.$set(item, 'checked', true);
                this.$set(item, 'checked_fa', true);
                this.$set(item, 'checked_en', true);
            },
            uncheckItem( item ) {
                this.$set(item, 'checked', false);
                this.$set(item, 'checked_fa', false);
                this.$set(item, 'checked_en', false);
            },
            toggleMultiItem(parent, item) {
                this.$set(item, 'checked_fa', !item['checked_fa']);
                this.$set(item, 'checked_en', !item['checked_en']);
                this.$set(item, 'checked', item['checked_fa'] && item['checked_en']);
                this.checkParentItem( parent );
            },
            toggleItem(parent, item, key) {
                this.$set(item, key, !item[key]);
                this.$set(item, 'checked', item['checked_fa'] && item['checked_en']);
                this.checkParentItem( parent );
            },
            toggleNestedItem(parent, item) {
                ( !item['checked'] ) ? this.checkedItem( item ) : this.uncheckItem( item );
                this.checkParentItem( parent );
            },
            toggleParentItem( item ) {
                this.$set(item, 'checked', !item['checked']);
                this.$set(item, 'indeterminate', item['checked']);
                item.items.forEach(nested => {
                    nested['checked'] = item['checked'];
                    nested['checked_en'] = item['checked'];
                    nested['checked_fa'] = item['checked'];
                });
            },
            getUserPermissions() {
                let payload = Object.values(this.data.list).map(per => {
                    return per.items.reduce((data, item) => {
                        const CONDITION = [];
                        if ( !!item['checked_fa'] ) CONDITION.push('fa');
                        if ( !!item['checked_en'] ) CONDITION.push('en');
                        if (CONDITION.length)
                            data.push({
                                'permission_id': item['id'],
                                "permission_condision": CONDITION,
                            });
                        return data;
                    }, [])
                });
                return [].concat.apply([], payload);
            }
        },
    }
</script>