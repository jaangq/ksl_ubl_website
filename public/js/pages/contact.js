mapboxgl.accessToken = 'pk.eyJ1IjoiamFuZ3EiLCJhIjoiY2psZXh5ZGJlMDk3azNwanZ5dnlwZzZtdSJ9.0SDcfo7EzuV8YZPcYjsYdA';
// eslint-disable-next-line no-undef
var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
mapboxClient.geocoding.forwardGeocode({
    query: 'Wellington, New Zealand',
    autocomplete: false,
    limit: 1
})
    .send()
    .then(function (response) {
        if (response && response.body && response.body.features && response.body.features.length) {
            var feature = response.body.features[0];

            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v9',
                center: [106.74744249647773, -6.2352050422731224],
                zoom: 18
            });
            new mapboxgl.Marker()
                .setLngLat([106.74744249647773, -6.2352050422731224])
                .addTo(map);

            // Add zoom and rotation controls to the map.
            map.addControl(new mapboxgl.NavigationControl());
            // Add style
            var layerList = document.getElementById('menu');
            var inputs = layerList.getElementsByTagName('input');

            function switchLayer(layer) {
                var layerId = layer.target.id;
                map.setStyle('mapbox://styles/mapbox/' + layerId + '-v9');
            }

            for (var i = 0; i < inputs.length; i++) {
                inputs[i].onclick = switchLayer;
            }
        }
    });
