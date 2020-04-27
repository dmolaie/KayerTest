<template>
    <div class="breadcrumb w-full overflow-auto">
        <div class="breadcrumb__container w-full"
             v-if="!!items.length"
        >
            <button v-for="(item, index) in items"
                    :key="index"
                    v-text="routeName( item.name )"
                    @click.prevent="changeRoute( item.route )"
                    class="breadcrumb__item font-1xs font-bold l:transition-color l:hover:text-blue--200"
                    :class="{ 'pointer-event-none': !item.route }"
            > </button>
        </div>
    </div>
</template>

<script>

    export default {
        name: "Index",
        props: {
            items: {
                type: Array,
                default: [],
                required: false
            }
        },
        methods: {
            changeRoute( location ) {
                if ( !!location )
                    this.pushRouter( { name: location } );
            },
            routeName( title ) {
                return ( title instanceof Function ) ? (
                    title( this.$route )
                ) : title
            }
        }
    }
</script>