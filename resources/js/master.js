import ImageLazyLoading from "../vendor/plugin/imageLazyLoading";

try {
    document.addEventListener(
        'DOMContentLoaded',
        () => {
            ImageLazyLoading(
                document.querySelectorAll('.has-skeleton')
            );
        }
    );
} catch (e) {
    //
}