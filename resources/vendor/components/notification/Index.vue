<template>
    <div class="notification fixed pointer-event-none z-20">
        <div v-for="(item, index) in items"
             :key="index"
             class="notification__item w-full h-full border border-solid rounded-1/2 overflow-hidden opacity-0"
             :class="[
                ( 'notification__item--' + item.option.type ) , {
                    'notification__item--out': !( item.option.visibility )
                }
             ]"
             @click.stop="onClickNotificationItem( item )"
        >
            <p class="notification__label font-base font-bold user-select-none"
               :class="{ 'cursor-pointer': ( item.option.closeWithClick ) }"
            >
                {{ item.text }}
            </p>
            <div class="notification__progress-bar w-full">
                <div class="notification__progress-bar_percentage w-0"
                     :style="`animation-duration: ${item.option.duration}ms`"
                     @animationend="onAnimationEnd( item )"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        EventBus,
    } from './service';

    import {
        HasLength
    } from '@vendor/plugin/helper/index';

    export default {
        name: "Index",
        data: () => ({
            items: [],
            timer: null,
            timeOut: 600
        }),
        methods: {
            NewNotification( item ) {
                if ( !HasLength( this.items ) )
                    this.items.push( item );
                else {
                    this.onAnimationEnd( this.items[0] );
                    setTimeout(() => {
                        this.NewNotification( item );
                    }, (this.timeOut + 100))
                }
            },
            onAnimationEnd( item ) {
                try {
                    this.$set( item.option, 'visibility', false );
                    clearTimeout( this.timer );
                    this.timer = setTimeout(() => {
                        this.$set( this, 'items', [] );
                    }, this.timeOut)
                } catch (e) {
                    this.$set( this, 'items', [] );
                }
            },
            onClickNotificationItem( item ) {
                if ( item.option.closeWithClick )
                    this.onAnimationEnd( item );
            }
        },
        mounted() {
            try {
                EventBus.$on(
                    'displayNotification',
                    this.NewNotification
                )
            } catch (e) {}
        }
    }
</script>