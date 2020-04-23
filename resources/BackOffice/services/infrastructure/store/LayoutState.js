import Vue from 'vue';

export const HANDEL_FULL_PAGE = 'HANDEL_FULL_PAGE';
export const PROGRESS_BAR = 'PROGRESS_BAR';

const LayoutState = {
    state: {
        shouldBeShowAside: false,
        shouldBeShowProgress: false,
    },
    mutations: {
        [HANDEL_FULL_PAGE]: ( state, payload ) => {
            Vue.set(state, 'shouldBeShowAside', !payload);
        },
        [PROGRESS_BAR](state, shouldBeShowProgress) {
            Vue.set(state, 'shouldBeShowProgress', shouldBeShowProgress);
        }
    }
};

export default LayoutState;
