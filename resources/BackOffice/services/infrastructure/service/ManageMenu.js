import Endpoint from '@endpoints';
import HTTPService from '@vendor/plugin/httpService';
import BaseService from '@vendor/infrastructure/service/BaseService';
import {
    MENU_SET_DATA,
    MENU_UPDATE_DATA,
    MENU_SET_TYPE_DATA,
    MENU_ADD_ITEM
} from '@services/store/ManageMenu';
import {
    SavePriorityPresenter
} from '@services/presenter/ManageMenu';
import {
    CopyOf, Length
} from "@vendor/plugin/helper";

const DEFAULT_ERROR_MESSAGE   = 'متاسفانه مشکلی پیش آمده است.';
const DEFAULT_Success_MESSAGE = 'فرآیند با موفقیت انجام شد.';

export default class ManageMenuService extends BaseService {
    constructor( layout ) {
        super();
        this.$vm = layout;
        this.$store = layout.$store;

        BaseService.ViewPortProcess( this.$store , false );
    }

    displayErrorNotification( message ) {
        this.$vm.displayNotification( message || DEFAULT_ERROR_MESSAGE, {
            type: 'error',
            duration: 4000
        })
    }

    displaySuccessNotification( message ) {
        this.$vm.displayNotification( message || DEFAULT_Success_MESSAGE, {
            type: 'success',
            duration: 4000
        })
    }

    processIsPending( status = true ) {
        try {
            ( status ) ? (
                this.$vm.$set(this.$vm, 'anotherProcessIsPending', true)
            ) : (
                setTimeout(() => { this.$vm.$set(this.$vm, 'anotherProcessIsPending', false) }, 50)
            )
        } catch (e) {}
    }

    /**
     * TODO: Should be refactor structure
     */
    async processFetchAsyncData() {
        try {
            await this.getList();
            await this.getMenuType();
        } catch (e) {}
    }

    async getList() {
        try {
            let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_MENU_LIST ) );
            BaseService.commitToStore( this.$store, MENU_SET_DATA, response );
        }
        catch ( { message } ) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    async getMenuType() {
        try {
            let response = await HTTPService.getRequest( Endpoint.get( Endpoint.GET_MENU_TYPE ) );
            BaseService.commitToStore(this.$store, MENU_SET_TYPE_DATA, response)
        }
        catch ( { message } ) {
            this.$vm.displayNotification( message, {
                type: 'error',
                duration: 4000
            })
        }
    }

    static async getArticleList() {
        try {
            return await HTTPService.getRequest( Endpoint.get( Endpoint.GET_ARTICLE_LIST ), {
                status: 'published'
            });
        }
        catch ( e ) {
            throw e;
        }
    }

    static getCategoryName( selectedType = '' ) {
        const ChunkStr = 'list_';

        return ( selectedType.includes( ChunkStr ) ) ? (
            selectedType.replace(ChunkStr, '')
        ) : ( '' )
    }

    static async getCategoryList( filterBy = '' ) {
        try {
            return await HTTPService.getRequest(Endpoint.get(Endpoint.GET_CATEGORY_LIST), {
                category_type: filterBy
            });
        } catch (e) {
            throw e;
        }
    }

    async _onClickRemoveItem( item ) {
        try {
            this.processIsPending();
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.REMOVE_MENU_ITEM),{
                menu_id: item.id
            });
            item.parentObj.splice(item.index, 1);
            this.displaySuccessNotification( response?.message );
        }
        catch ({ message }) {
            this.displayErrorNotification( message );
        }
        finally {
            this.processIsPending( false );
        }
    }

    static async updateMenuItem( payload ) {
        try {
            return await HTTPService.postRequest( Endpoint.get(Endpoint.EDIT_MENU_ITEM), payload);
        } catch (e) {
            throw e
        }
    }

    async _onClickToggleActiveItem( item ) {
        try {
            let {
                name, title, alias, publish_date, language, type, link, priority
            } = item;
            let payload = {
                name, title, alias, publish_date, language, type, link,
                menu_id: item.id,
                active: +(!item.active),
            };
            let findIndex = item.parentObj.findIndex(ch => ch.id === item.id);
            let findItem = item.parentObj.find(ch => ch.id === item.id);
            this.processIsPending();
            this.$vm.$set( findItem, 'active', !findItem.active );
            payload.priority = ( !!findIndex ) ? (
                findIndex + 1
            ) : (
                priority
            );
            if ( !!item.parent )
                payload.parent_id = item.parent.id;
            if ( !!item.menuable_id )
                payload.menuable_id = item.menuable_id;
            if ( !payload.link )
                delete payload.link;

            let response = await ManageMenuService.updateMenuItem( payload );
            this.displaySuccessNotification( response?.message );
            // this.displaySuccessNotification();
        }
        catch ({ message }) {
            this.displayErrorNotification( message );
        }
        finally {
            this.processIsPending( false );
        }
    }

    async saveMenuPriority( payload ) {
        try {
            if ( !this.$vm.anotherProcessIsPending ) {
                this.processIsPending();
                let response = await HTTPService.postRequest(Endpoint.get(Endpoint.SAVE_MENU_LIST), {
                    menu_items: SavePriorityPresenter(payload)
                });
                // BaseService.commitToStore( this.$store, MENU_SET_DATA, response );
                this.displaySuccessNotification( response?.message );
            }
        }
        catch ({ message }) {
            this.displayErrorNotification( message );
        } finally {
            this.processIsPending( false );
        }
    }

    async onClickCreateNewMenuItem( payload ) {
        try {
            let data = CopyOf( payload );
            this.$vm.$set(this.$vm, 'shouldBeShowSpinnerLoading', true);
            if ( !data.name.trim() ) {
                this.displayErrorNotification('فیلد نام منو اجباری است.');
                return false;
            }
            if ( !data.type ) {
                this.displayErrorNotification('فیلد نوع منو اجباری است.');
                return false;
            }
            // if ( !data.link.trim() ) {
            //     this.displayErrorNotification('فیلد URL اجباری است.');
            //     return false;
            // }
            if ( !data.link.trim() )
                delete data['link'];

            if ( !data.menuable_id )
                delete data['menuable_id'];

            data['title'] = ( data.name );
            data['alias'] = (data.name.replace(/ /g, '-'));
            data['publish_date'] = (new Date().getTime() / 1e3);
            data['priority'] = Length( this.$vm.elements ) + 1;
            this.processIsPending();
            let response = await HTTPService.postRequest(Endpoint.get(Endpoint.CREATE_MENU_LIST), data);

            BaseService.commitToStore(this.$store, MENU_ADD_ITEM, response);
            this.displaySuccessNotification(response?.message);
            this.$vm.$refs['modal']?.hidden();
            this.$vm.$set(this.$vm.form, 'name', '');
            this.$vm.$set(this.$vm.form, 'menuable_id', '');
            this.$vm.$set(this.$vm.form, 'type', '');
            this.$vm.$set(this.$vm.form, 'link', '');
        }
        catch ( exception ) {
            let errorMessage = exception.message;
            let errors = exception?.errors;
            if (!!errors)
                errorMessage = Object.entries(errors)[0][1][0];
            this.displayErrorNotification( errorMessage );
        }
        finally {
            this.$vm.$set(this.$vm, 'shouldBeShowSpinnerLoading', false);
            this.processIsPending( false );
        }
    }
}