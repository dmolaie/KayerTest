<template>
    <div class="pagination w-full"
         v-if="!isPending && Object.values( pages ).length > 1"
    >
        <div class="pagination__container flex flex-row-reverse items-stretch justify-start">
            <button class="pagination__item pagination__item--page pagination__item--first-page text-center"
                    :class="{ 'pagination__item--disabled': firstPageSelected }"
                    v-if="!firstPageSelected"
                    @click.prevent="onClickPrevPage"
            > </button>

            <div class="pagination__item"
                 v-for="(page, index) in pages"
                 :key="'p-' + index"
            >
                <div class="pagination__item--break font-sm font-bold w-full h-full text-center cursor-default"
                     v-if="page.breakView"
                     v-text="'…'"
                > </div>
                <div class="pagination__item--disabled font-sm font-bold w-full h-full text-center cursor-default"
                     v-else-if="page.disabled"
                     v-text="page.content"
                > </div>
                <button class="w-full h-full font-sm font-bold text-center"
                        :class="{ 'pagination__item--selected': ( page.selected ) }"
                        v-else
                        v-text="page.content"
                        @click="handlePageSelected(page.index + 1)"
                > </button>
            </div>

            <button class="pagination__item pagination__item--page pagination__item--last-page text-center"
                    :class="{ 'pagination__item--disabled': lastPageSelected }"
                    v-if="!lastPageSelected"
                    @click.prevent="onClickNextPage"
            > </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pagination",
        data: () => ({
            innerValue: 1
        }),
        props: {
            isPending: {
                type: Boolean,
                default: false
            },
            pageRange: {
                type: Number,
                default: 3
            },
            currentPage: {
                type: Number,
                default: 1
            },
            perPage: {
                type: Number,
                default: 10
            },
            total: {
                type: Number,
                required: true
            }
        },
        computed: {
            pageCount() {
                return Math.ceil((
                    this.total / this.perPage
                ))
            },
            selected: {
                get: function() {
                    return this.value || this.innerValue
                },
                set: function(newValue) {
                    this.innerValue = newValue
                }
            },
            firstPageSelected() {
                return this.selected === 1
            },
            lastPageSelected() {
                return (this.selected === this.pageCount) || (this.pageCount === 0)
            },
            pages() {
                let items = {};
                if ( this.pageCount <= this.pageRange ) {
                    for (let index = 0; index < this.pageCount; index++) {
                        items[index] = {
                            index: index,
                            content: index + 1,
                            selected: index === (this.selected - 1)
                        }
                    }
                }
                else {
                    const halfPageRange = Math.floor(this.pageRange / 2);

                    let setPageItem = index => {
                        items[index] = {
                            index: index,
                            content: index + 1,
                            selected: index === (this.selected - 1)
                        }
                    };

                    let setBreakView = index => {
                        items[index] = {
                            disabled: true,
                            breakView: true
                        }
                    };

                    for (let i = 0; i < 1; i++) {
                        setPageItem(i);
                    }

                    let selectedRangeLow = 0;
                    if (this.selected - halfPageRange > 0)
                        selectedRangeLow = this.selected - 1 - halfPageRange;

                    let selectedRangeHigh = selectedRangeLow + this.pageRange - 1;

                    if (selectedRangeHigh >= this.pageCount) {
                        selectedRangeHigh = this.pageCount - 1;
                        selectedRangeLow = selectedRangeHigh - this.pageRange + 1;
                    }

                    for (let i = selectedRangeLow; i <= selectedRangeHigh && i <= this.pageCount - 1; i++) {
                        setPageItem(i);
                    }

                    if ( selectedRangeLow )
                        setBreakView(selectedRangeLow - 1);

                    if (selectedRangeHigh + 1 < this.pageCount - 1)
                        setBreakView(selectedRangeHigh + 1);

                    for (let i = this.pageCount - 1; i >= this.pageCount - 1; i--) {
                        setPageItem(i);
                    }
                }
                return items
            }
        },
        methods: {
            handlePageSelected(selected) {
                if (this.selected === selected) return;

                this.innerValue = selected;
                this.$emit('input', selected);
            },
            onClickPrevPage() {
                if (this.selected <= 1) return;
                this.handlePageSelected(this.selected - 1)
            },
            onClickNextPage() {
                if (this.selected >= this.pageCount) return;

                this.handlePageSelected(this.selected + 1)
            }
        }
    }
</script>