import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter'
import { HasLength } from "@vendor/plugin/helper";

export const menus = {
    ['dashboard']: {
        route: { name: 'DASHBOARD' },
        icon: 'ic__dashboard--blue.svg'
    },
    ['menu_manager']: {
        route: { name: 'MANAGE_MENU' },
        icon: 'ic__menu--blue.svg'
    },
    ['event']: {
        route: { name: 'MANAGE_EVENT' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['news']: {
        route: { name: 'MANAGE_NEWS' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['article']: {
        route: { name: 'MANAGE_ARTICLE' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['ehda_card']: {
        route: { name: 'MANAGE_CARDS' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['user']: {
        route: { name: 'MANAGE_LEGATE' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['profile_setting']: {
        route: { name: 'USER_SETTING' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['report']: {
        route: { name: 'MANAGE_REPORT' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['category']: {
        route: { name: 'MANAGE_CATEGORY' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['slider']: {
        route: { name: 'MANAGE_SLIDER' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['gallery']: {
        route: { name: '' },
        icon: 'ic_newspaper--blue.svg'
    },
    ['image_gallery']: {
        route: { name: 'MANAGE_GALLERY', params: { type: 'image' } },
        icon: 'ic_newspaper--blue.svg'
    },
    ['text_gallery']: {
        route: { name: 'MANAGE_GALLERY', params: { type: 'text' } },
        icon: 'ic_newspaper--blue.svg'
    },
    ['voice_gallery']: {
        route: { name: 'MANAGE_GALLERY', params: { type: 'voice' } },
        icon: 'ic_newspaper--blue.svg'
    },
    ['video_gallery']: {
        route: { name: 'MANAGE_GALLERY', params: { type: 'video' } },
        icon: 'ic_newspaper--blue.svg'
    },
};

export default class MenusPresenter {
    constructor( payload ) {
        return !!payload && HasLength( payload ) ? (
            payload.map(item => new MenuPresenter( item ))
        ) : ([])
    }
}

class MenuPresenter extends BasePresenter {
    constructor( data ) {
        super( data );
        this.data = data;
        this.item = menus[this.data.en_name];
        
        return this.mapProps({
            icon: String,
            route: String,
            name_fa: String,
            name_en: String,
            children: Array,
        })
    }

    route() {
        return this.item?.route
    }

    name_fa() {
        return this.data.fa_name
    }

    name_en() {
        return this.data.en_name
    }

    icon() {
        return this.item?.icon
    }

    children() {
        return new MenusPresenter( this.data.children )
    }
}