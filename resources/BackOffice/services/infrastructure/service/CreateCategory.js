import ExceptionService from '@services/service/exception';
import BaseService from '@vendor/infrastructure/service/BaseService';
import { CategoryService } from '@services/service/ManageCategory';
import { CopyOf } from '@vendor/plugin/helper';
import ManageCategoryStore, {
    M_CATEGORY_SET_DATA
} from '@services/store/ManageCategory';

export default class CreateCategoryService {
    constructor( layout ) {
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess(this.$store , false);
        this._RegisterStoreModule();
    }

    _RegisterStoreModule() {
        try {
            this.$store.registerModule('ManageCategory', ManageCategoryStore);
            this.$vm.$set(this.$vm, 'isModuleRegistered', true);
        } catch (e) {}
    }

    _UnregisterStoreModule() {
        try {
            if ( this.$vm.isModuleRegistered )
                this.$store.unregisterModule('ManageCategory');
        } catch (e) {}
    }

    async getCategoriesFilterByType( category_type ) {
        try {
            let response = await CategoryService.getCategoryListByType( category_type );
            BaseService.commitToStore(this.$store, M_CATEGORY_SET_DATA, response)
        } catch ( exception ) {
            throw exception;
        }
    }

    checkFormValidation() {
        try {
            let {
                name_fa, name_en, slug, type
            } = this.$vm.form;
            const CREATE_ERROR_MESSAGE = field => new Error(`فیلد ${field} اجباری است.`);
            if ( !name_fa ) throw CREATE_ERROR_MESSAGE('نام فارسی');
            if ( !name_en ) throw CREATE_ERROR_MESSAGE('نام انگلیسی');
            if ( !slug ) throw CREATE_ERROR_MESSAGE('نامک');
            if ( !type ) throw CREATE_ERROR_MESSAGE('دسته‌بندی');

        } catch ( exception ) { throw exception }
    }

    get createRequestPayload() {
        try {
            this.checkFormValidation();
            const DUPLICATE_FORM = CopyOf( this.$vm.form );

            DUPLICATE_FORM['slug'] = DUPLICATE_FORM['slug'].trim().replace(/ /g, '-');
            if ( !DUPLICATE_FORM['parent_id'] ) delete DUPLICATE_FORM['parent_id'];

            return DUPLICATE_FORM;
        } catch ( exception ) {
            throw ExceptionService._GetErrorMessage( exception );
        }
    }

    async createCategory() {
        try {
           const REQUEST_PAYLOAD = this.createRequestPayload;
            let response = await CategoryService.createCategory( REQUEST_PAYLOAD );
            return response.message;
        } catch ( exception ) { throw exception; }
    }
}