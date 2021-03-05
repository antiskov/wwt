document.addEventListener('DOMContentLoaded', function () {
    let autocomplete;
    const componentForm = {
        street_number: "short_name",
        route: "long_name",
        locality: "long_name",
        administrative_area_level_1: "short_name",
        country: "long_name",
        postal_code: "short_name",
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("autocomplete"),
            { types: ["geocode"] }
        );
        autocomplete.setFields(["address_component"]);
        autocomplete.addListener("place_changed", fillInAddress);
    }

    function fillInAddress() {
        document.querySelector('#autocomplete').setAttribute('autocomplete', 'nope');
        const place = autocomplete.getPlace();
        for (const component in componentForm) {
            document.getElementById(component).value = "";
            document.getElementById(component).readOnly = false;
        }

        for (const component of place.address_components) {
            const addressType = component.types[0];

            if (componentForm[addressType]) {
                document.getElementById(addressType).value = component[componentForm[addressType]];
            }
        }

    }

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                const circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy,
                });
                setCoords(geolocation)
                autocomplete.setBounds(circle.getBounds());
            });
        }

    }

    function setCoords(position) {
        const {lat, lng} = position;
        document.querySelector('[data-id="lng"]').value = lng;
        document.querySelector('[data-id="lat"]').value = lat;
    }

    google.maps.event.addDomListener(window, 'load', initAutocomplete);

    document.querySelector('#autocomplete').onblur = geolocate
});
