import Vue from 'vue';
import ProgressCm from './Index.vue';

export const ProgressEventBus = new Vue();
let isInstalled = false;

const Progress = {
    install( Vue ) {
        if ( isInstalled ) return;
        isInstalled = true;

        Vue.component( 'ProgressCm', ProgressCm );
        Vue.prototype.displayProgress = () => {
            ProgressEventBus.$emit('displayProgress')
        };
        Vue.prototype.hiddenProgress = () => {
            setTimeout(() => {
                ProgressEventBus.$emit('hiddenProgress')
            }, 80)
        }
    }
};

export default Progress;
