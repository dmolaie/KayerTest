import BreadcrumbCm from './Index.vue';

let isInstalled = false;

const Breadcrumb = {
    install( Vue ) {
        if ( isInstalled ) return;
        isInstalled = true;

        Vue.component( 'BreadcrumbCm', BreadcrumbCm );
    }
};

export default Breadcrumb;