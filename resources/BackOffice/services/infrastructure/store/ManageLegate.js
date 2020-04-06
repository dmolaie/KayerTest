import ManageLegatePresenter from '@services/presenter/ManageLegate';

export const M_LEGATE_SET_DATA = 'M_LEGATE_SET_DATA';
export const M_LEGATE_SET_USER_ROLES = 'M_LEGATE_SET_USER_ROLES';

const ManageLegate = {
    state: {
        items: {},
        roles: {},
        pagination: {}
    },
    mutations: {
        [M_LEGATE_SET_DATA](state, { data }) {
            console.log(new ManageLegatePresenter(data.items));
            state.items = { ...new ManageLegatePresenter( data.items ) };
            state.pagination = {
                ... {
                    current_page: data.current_page || 1,
                    total: data.total || 0,
                }
            }
        },
        [M_LEGATE_SET_USER_ROLES](state, { data }) {
            state.roles = { ...[
                    {
                        id: 1,
                        name: 'به عنوان مدیر',
                    },
                    {
                        id: 2,
                        name: 'به عنوان سفیر بابل',
                    },
                    {
                        id: 3,
                        name: 'به عنوان سفیر آذربایجان شرقی',
                    },
                    {
                        id: 4,
                        name: 'به عنوان سفیر آذربایجان غربی',
                    },
                    {
                        id: 5,
                        name: 'به عنوان سفیر اردبیل',
                    },
                    {
                        id: 6,
                        name: 'به عنوان سفیر ایلام',
                    },
                    {
                        id: 7,
                        name: 'به عنوان سفیر اصفهان',
                    },
                    {
                        id: 8,
                        name: 'به عنوان سفیر البرز',
                    },
                    {
                        id: 9,
                        name: 'به عنوان سفیر بوشهر',
                    },
                    {
                        id: 10,
                        name: 'به عنوان سفیر تهران',
                    },
                    {
                        id: 11,
                        name: 'به عنوان سفیر چهار محال و بختیاری',
                    },
                    {
                        id: 12,
                        name: 'به عنوان سفیر خراسان جنوبی ',
                    },
                    {
                        id: 13,
                        name: ' به عنوان سفیر خراسان رضوی',
                    },
                    {
                        id: 14,
                        name: 'به عنوان سفیر خراسان شمالی',
                    },
                    {
                        id: 15,
                        name: 'به عنوان سفیر خوزستان',
                    },
                ] }
        }
    }
};

export default ManageLegate;