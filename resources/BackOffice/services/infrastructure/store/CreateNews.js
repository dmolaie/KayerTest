import {
    NewsCategoryPresenter,
    ProvincesPresenter
} from '@services/presenter/CreateNews';
import {
    HasLength
} from "@vendor/plugin/helper";

export const C_NEWS_SET_CATEGORY = 'C_NEWS_SET_CATEGORY';
export const C_NEWS_SET_PROVINCES = 'C_NEWS_SET_PROVINCES';

const FlattenCategories = ( payload = [] ) => {
    return payload.reduce((flatArray, item) => {
        HasLength( item.children ) ? (
            flatArray.push( item, ...FlattenCategories( item.children ) )
        ) : flatArray.push( item );
        return flatArray;
    }, [])
};

const CreateMenu = {
    state: {
        categories: {},
        provinces: {},
    },
    mutations: {
        [C_NEWS_SET_CATEGORY](state, payload) {
            state.categories = { ...FlattenCategories( new NewsCategoryPresenter( payload.data ) ) };
        },
        [C_NEWS_SET_PROVINCES](state, payload) {
            state.provinces = { ...new ProvincesPresenter( payload ) };
        }
    }
};

export default CreateMenu;