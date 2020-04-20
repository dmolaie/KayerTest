import ManageReportPresenter from '@services/presenter/ManageReport';

export const M_REPORT_SET_DATA = 'M_REPORT_SET_DATA';

const ManageReportStore = {
    state: {
        items: {},
        pagination: {}
    },
    mutations: {
        [M_REPORT_SET_DATA](state, { data }) {
            state.items = { ...new ManageReportPresenter( data.items ) };
            state.pagination = {
                ... {
                    total: data.total || 0,
                    current_page: data.current_page || 1,
                }
            }
        }
    }
};

export default ManageReportStore;