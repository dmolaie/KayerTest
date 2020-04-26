import {
    FlattenCategories,
    ProvincesPresenter,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';

export const C_GALLERY_SET_PROVINCE = 'C_GALLERY_SET_PROVINCE';
export const C_GALLERY_SET_CATEGORIES = 'C_GALLERY_SET_CATEGORIES';

const CreateGalleryStore = {
    state: {
        provinces: {},
        categories: {},
    },
    mutations: {
        [C_GALLERY_SET_PROVINCE](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [C_GALLERY_SET_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
    }
};

export default CreateGalleryStore;