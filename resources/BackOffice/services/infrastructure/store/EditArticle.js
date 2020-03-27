import {
    FlattenCategories,
    CategoriesPresenter,
} from '@vendor/infrastructure/presenter/MainPresenter';
import ArticleItemPresenter from '@services/presenter/EditArticle';

export const E_ARTICLE_SET_DATA = 'E_ARTICLE_SET_DATA';
export const E_ARTICLE_SET_CATEGORIES = 'E_ARTICLE_SET_CATEGORIES';

const EditArticle = {
    state: {
        detail: {},
        categories: {}
    },
    mutations: {
        [E_ARTICLE_SET_DATA](state, payload) {
            let fake_payload = {
                data: {
                    id: 5,
                    first_title: "این تست صفحات ایستا است.",
                    second_title: "این تست صفحات ایستا است.",
                    third_title: "این تست صفحات ایستا است.",
                    abstract: "این چکیده تست صفحات ایستا است.",
                    description: '&#60;p dir="auto"&#62;&#1575;&#1740;&#1606; &#1578;&#1587;&#1578; &#1589;&#1601;&#1581;&#1575;&#1578; &#1575;&#1740;&#1587;&#1578;&#1575; &#1575;&#1587;&#1578;.&#1575;&#1740;&#1606; &#1578;&#1587;&#1578; &#1589;&#1601;&#1581;&#1575;&#1578; &#1575;&#1740;&#1587;&#1578;&#1575; &#1575;&#1587;&#1578;.&#60;/p&#62;&#60;p dir="auto"&#62;&#1575;&#1740;&#1606; &#1578;&#1587;&#1578; &#1589;&#1601;&#1581;&#1575;&#1578; &#1575;&#1740;&#1587;&#1578;&#1575; &#1575;&#1587;&#1578;.&#60;/p&#62;',
                    categories: [
                        {name_en: "عسل بابا", name_fa: "عسل بابا", id: 8, is_main: false},
                        {name_en: "article", name_fa: "مطلب", id: 3, is_main: false},
                        {name_en: "چی بگم", name_fa: "چی بگم", id: 9, is_main: true},
                    ],
                    publish_date: 1585230319,
                    slug: "این-تست-صفحات-ایستا-است.",
                    status: {fa: "منتشر شده", en: "published"},
                    province: null,
                    publisher: {id: 1, name: "محمد", last_name: "سلیمانیان"},
                    editor: null,
                    language: "fa",
                    relation_id: null,
                    image_paths: [
                        {
                            image_id: 27,
                            path: "upload/images/Article/032620201345195e7cb1efad90b-googlelogo_color_92x30dp.png"
                        }
                    ]
                }
            };
            state.detail = { ... new ArticleItemPresenter( fake_payload ) };
        },
        [E_ARTICLE_SET_CATEGORIES](state, { data }) {
            state.categories = { ...FlattenCategories( new CategoriesPresenter( data ) ) }
        },
    }
};

export default EditArticle;