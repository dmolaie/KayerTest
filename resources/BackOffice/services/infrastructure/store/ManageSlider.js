import ManageSliderPresenter from '@services/presenter/ManageSlider';

export const M_SLIDER_SET_DATA = "M_SLIDER_SET_DATA";
export const M_SLIDER_UPDATE_DATA = "M_SLIDER_UPDATE_DATA";

const ManageSlider = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_SLIDER_SET_DATA](state, { data }) {
            state.items = { ...new ManageSliderPresenter( data.items ) };
            state.pagination = {
                ... {
                    total: data.total || 0,
                    current_page: data.current_page || 1,
                }
            }
        },
        [M_SLIDER_UPDATE_DATA](state, payload) {
            state.items = { ...[] };
            state.items = { ...payload };
        }
    }
};

export default ManageSlider;