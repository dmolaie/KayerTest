const G_LAT = 35.7526066;
const G_LNG = 51.4108511;
const MARKER = {
    ['size']: [32, 32],
    ['anchor']: [10, 10],
    ['path']: '/images/ic_map.svg',
};
const API_KEY = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBlNzUxN2NjNzMyN2JlNjU4YTM2ZWNmYzQxOThhZjU0NWIwN2VhMzQ1MTA2MjU1MzBhZDhlN2Y0ZTM1YTgwNzZhYjkzMjgzNDk4NmUyNzRhIn0.eyJhdWQiOiI5MjA1IiwianRpIjoiMGU3NTE3Y2M3MzI3YmU2NThhMzZlY2ZjNDE5OGFmNTQ1YjA3ZWEzNDUxMDYyNTUzMGFkOGU3ZjRlMzVhODA3NmFiOTMyODM0OTg2ZTI3NGEiLCJpYXQiOjE1ODkyMDU0NzIsIm5iZiI6MTU4OTIwNTQ3MiwiZXhwIjoxNTkxNzk3NDcyLCJzdWIiOiIiLCJzY29wZXMiOlsiYmFzaWMiXX0.jPW4UHSqUHSpyagoJxXJZzqQnAMAZ986Ati6nAhVvLC7g-SVa_wX2DnYrDB6-QYc9gW7tUOrK_x03gVDy1HHF56EDtbB5yWt24k-Etsp5aaUE8zAsTUbPVP7lRZerUF2-bv5e_kMlDAOhq-Pg2RW6pAvwiYsRrdWoV-leUpPh3JbCk5-HM2dTn0JbCbPE_c0CpUs8J2tzrO2rRhb3cMdtP5xd0BtourtmCNDpKFFilNC8GgNmTZYb0IFMZSDdfTOPy9fv13W9f_AOMs0m_wy8WmNzf3F_1hhIsTVurcTi4CeRUOp6EQjllLydeU3DOLprXDm1J6tbI5DART0nxsuVA';

window.addEventListener(
    'load',
    () => {
        try {
            const APP = new Mapp({
                apiKey: API_KEY,
                element: '#map',
                presets: {
                    latlng: { lat: G_LAT, lng: G_LNG },
                    zoom: 23,
                },
                dragging: !L.Browser.mobile,
            });

            APP.addMenu();
            APP.addVectorLayers();

            const CROSS_ICON = {
                iconUrl: MARKER['path'],
                iconSize: MARKER['size'],
                iconAnchor: MARKER['anchor'],
            };

            APP.addMarker({
                popup: false,
                draggable: true,
                icon: CROSS_ICON,
                latlng: { lat: G_LAT, lng: G_LNG },
            })
        } catch (e) {
            console.log(e);
        }
    }
);