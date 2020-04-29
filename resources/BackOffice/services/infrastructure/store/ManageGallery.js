import ManageGalleryPresenter from '@services/presenter/ManageGallery';

export const M_GALLERY_SET_DATA = "M_GALLERY_SET_DATA";
export const M_GALLERY_UPDATE_DATA = "M_GALLERY_UPDATE_DATA";

const ManageGalleryStore = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_GALLERY_SET_DATA](state, { data }) {
            state.items = { ...new ManageGalleryPresenter( data.items ) };
            state.pagination = {
                ... {
                    total: data.total || 0,
                    current_page: data.current_page || 1,
                }
            }
        },
        [M_GALLERY_UPDATE_DATA](state, payload) {
            state.items = { ...[] };
            state.items = { ...payload };
        }
    }
};

export default ManageGalleryStore;