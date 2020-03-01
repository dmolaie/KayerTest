import Vue from 'vue';

export const HANDEL_FULL_PAGE = 'HANDEL_FULL_PAGE';

const LayoutState = {
    state: {
        shouldBeShowAside: false,
    },
    mutations: {
        [HANDEL_FULL_PAGE]: ( state, payload ) => {
            Vue.set(state, 'shouldBeShowAside', !payload);
        }
    }
};

export default LayoutState;
