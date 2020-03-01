<template>
    <div class="progress fixed w-screen"
         :style="`background-color: ${progressBackground}`"
         v-if="visible"
    >
        <div class="progress__bar absolute w-screen h-full"
             :style="`animation-duration: ${duration}ms; background-color: ${colors[progressbarIndex]}`"
        ></div>
    </div>
</template>

<script>
    import {
        Length
    } from "@vendor/plugin/helper";
    import {
        ProgressEventBus
    } from "./index";
    import {EventBus} from "../notification/service";

    export default {
        name: "Progress",
        data: () => ({
            timer: null,
            duration: 1400,
            visible: false,
            progressIndex: 0,
            progressbarIndex: 0,
            colors: [
                '#5bc6f3',
                '#03b6f9',
                '#0099d4'
            ],
            colorss: [
                'yellow',
                'blue',
                'red'
            ]
        }),
        computed: {
            progressBackground() {
                let { colors, progressbarIndex } = this;
                return (
                    ( !!colors[progressbarIndex - 1] ) ? (
                        colors[progressbarIndex - 1]
                    ) : (
                        colors[Length( colors ) - 1]
                    )
                )
            }
        },
        methods: {
            changeProgressIndex() {
                let { progressIndex, colors } = this;
                this.$set(this, 'progressIndex',
                    !!colors[progressIndex + 1] ? ( progressIndex + 1 ) : 0
                );
            },
            changeProgressbarIndex() {
                let { progressbarIndex, colors } = this;
                this.$set(this, 'progressbarIndex',
                    !!colors[progressbarIndex + 1] ? ( progressbarIndex + 1 ) : 0
                );
            },
            showProgress() {
                this.$set(this, 'visible', true);
                this.$set(this, 'progressIndex', 0);
                this.$set(this, 'progressbarIndex', 0);
                this.timer = setInterval(() => {
                    new Promise(resolve => {
                        this.changeProgressIndex();
                        resolve();
                    }).then(this.changeProgressbarIndex);
                }, this.duration);
            },
            hiddenProgress() {
                this.$set(this, 'visible', false);
                clearInterval( this.timer );
            }
        },
        mounted() {
            this.showProgress();
            ProgressEventBus.$on('displayProgress', this.showProgress );
            ProgressEventBus.$on('hiddenProgress' , this.hiddenProgress );
        }
    }
</script>