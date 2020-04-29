import {
    FlattenCategories,
    ProvincesPresenter,
    CategoriesPresenter
} from '@vendor/infrastructure/presenter/MainPresenter';
import { SingleGalleryPresenter } from '@services/presenter/ManageGallery';

export const E_GALLERY_SET_DATA = "E_GALLERY_SET_DATA";
export const E_GALLERY_PROVINCES = "E_GALLERY_PROVINCES";
export const E_GALLERY_CATEGORIES = "E_GALLERY_CATEGORIES";

const EditGallery = {
    state: {
        detail: {},
        categories: {},
        provinces: {}
    },
    mutations: {
        [E_GALLERY_SET_DATA](state, { data }) {
            console.log(new SingleGalleryPresenter(data));
            state.detail = { ...new SingleGalleryPresenter( data ) };
        },
        [E_GALLERY_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
        [E_GALLERY_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
    }
};

export default EditGallery;