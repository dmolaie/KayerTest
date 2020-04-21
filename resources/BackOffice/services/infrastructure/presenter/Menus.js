import BasePresenter from '@vendor/infrastructure/presenter/BasePresenter'
import { HasLength } from "@vendor/plugin/helper";

export const menus = {
    ['counter']: {
        route: 'DASHBOARD',
        icon: 'ic__dashboard--blue.svg'
    },
    ['menu_manager']: {
        route: 'MANAGE_MENU',
        icon: 'ic__menu--blue.svg'
    },
    ['event']: {
        route: 'MANAGE_EVENT',
        icon: 'ic_newspaper--blue.svg'
    },
    ['news']: {
        route: 'MANAGE_NEWS',
        icon: 'ic_newspaper--blue.svg'
    },
    ['article']: {
        route: 'MANAGE_ARTICLE',
        icon: 'ic_newspaper--blue.svg'
    },
    ['ehda_card']: {
        route: 'MANAGE_CARDS',
        icon: 'ic_newspaper--blue.svg'
    },
    ['user']: {
        route: 'MANAGE_LEGATE',
        icon: 'ic_newspaper--blue.svg'
    },
    ['profile_setting']: {
        route: 'USER_SETTING',
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
            route: String,
            name_fa: String,
            name_en: String,
            icon: String,
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
}