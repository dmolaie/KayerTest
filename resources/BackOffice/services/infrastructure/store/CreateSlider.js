import { ProvincesPresenter } from '@vendor/infrastructure/presenter/MainPresenter';

export const C_SLIDER_SET_PROVINCES = "C_SLIDER_SET_PROVINCES";

const CreateSlider = {
    state: {
        provinces: {}
    },
    mutations: {
        [C_SLIDER_SET_PROVINCES](state, { data }) {
            state.provinces = { ...new ProvincesPresenter( data ) };
        }
    }
};

export default CreateSlider;