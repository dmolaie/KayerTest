export const M_COUNT_UP_SET_DATA = "M_COUNT_UP_SET_DATA";
export const M_COUNT_UP_UPDATE_DATA = "M_COUNT_UP_UPDATE_DATA";

const ManageCountUp = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_COUNT_UP_SET_DATA](state, { data }) {
            // state.items = { ...new ManageGalleryPresenter( data.items ) };
            // state.pagination = {
            //     ... {
            //         total: data.total || 0,
            //         current_page: data.current_page || 1,
            //     }
            // }
        },
        [M_COUNT_UP_UPDATE_DATA](state, payload) {
            // state.items = { ...[] };
            // state.items = { ...payload };
        }
    }
};

export default ManageCountUp;