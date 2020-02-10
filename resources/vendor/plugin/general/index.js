let isInstalled = false;

const General = {
    install( Vue ) {
        if ( isInstalled ) return;
        isInstalled = true;

        Vue.mixin({
            methods: {
                $asset( src ) {
                    return (
                        '/images/' + src
                    )
                }
            }
        })
    }
};

export default General;