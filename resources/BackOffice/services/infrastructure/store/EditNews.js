import {
    NewsItemPresenter,
} from '@services/presenter/EditNews';
import {
    ProvincesPresenter,
    CategoriesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import {
    HasLength
} from "@vendor/plugin/helper";

const FlattenCategories = ( payload = [] ) => {
    return payload.reduce((flatArray, item) => {
        HasLength( item.children ) ? (
            flatArray.push( item, ...FlattenCategories( item.children ) )
        ) : flatArray.push( item );
        return flatArray;
    }, [])
};

export const E_NEWS_SET_DATA = 'E_NEWS_SET_DATA';
export const E_NEWS_SET_PROVINCES = 'E_NEWS_SET_PROVINCES';
export const E_NEWS_SET_CATEGORIES = 'E_NEWS_SET_CATEGORIES';

const EditNewsStore = {
    state: {
        detail: {},
        categories: {},
        provinces: {}
    },
    mutations: {
        [E_NEWS_SET_DATA](state, payload) {
            state.detail = { ...new NewsItemPresenter( payload ) };
        },
        [E_NEWS_SET_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
        [E_NEWS_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        },
    }
};

export default EditNewsStore;