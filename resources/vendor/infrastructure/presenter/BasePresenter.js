export default class BasePresenter {
    #INSTANCE = null;

    constructor() {
        this.#INSTANCE = this.constructor.prototype;
    }

    mapProps( object ) {
        let result = {};

        for ( const [key, defaultValue] of Object.entries( object ) ) {
            !!( this.#INSTANCE[key] ) ? (
                result[key] = this.#INSTANCE[key].call( this )
            ) : (
                result[key] = defaultValue()
            )
        }

        return result;
    }
}