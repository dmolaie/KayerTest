import ManageEventPresenter from '@services/presenter/ManageEvent';

export const M_EVENT_SET_DATA = 'M_EVENT_SET_DATA';

const ManageEvent = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_EVENT_SET_DATA](state, { data }) {
            console.log(new ManageEventPresenter(data.items));
            state.items = { ...new ManageEventPresenter( data.items ) };
            state.pagination = {
                ... {
                    total: data.total || 0,
                    current_page: data.current_page || 1,
                }
            }
        }
    }
};

export default ManageEvent;