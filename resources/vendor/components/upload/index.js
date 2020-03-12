export default class UploadService {
    static async imagePreview( formData, name = 'images' ) {
        const PHOTOS = formData.getAll( name );

        return Promise.all(
            PHOTOS.map(file =>
                this.getImage( file )
                    .then(image => ({
                        image,
                        fileName: file.name,
                    }))
            )
        )
    }

    static async getImage( file ) {
        try {
            return await new Promise(resolve => {
                const fReader = new FileReader();
                fReader.addEventListener(
                    'load',
                    () => {
                        resolve( fReader.result );
                    }
                );
                fReader.readAsDataURL( file );
            })
        } catch (e) {}
    }

    static getBase64Image( image ) {
        try {
            const CANVAS = document.createElement('canvas');
            CANVAS.width  = image.naturalWidth  || image.width;
            CANVAS.height = image.naturalHeight || image.height;
            const CTX = CANVAS.getContext('2d');
            CTX.drawImage(image, 0, 0);
            return CANVAS.toDataURL('image/png');
        } catch (e) {}
    }
}