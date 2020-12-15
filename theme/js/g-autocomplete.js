document.addEventListener('DOMContentLoaded', function () {
    // function debounce(func, timeout) {
    //     let timeoutInterval;
    //     clearTimeout(timeoutInterval);
    //     timeoutInterval = setTimeout(() => {
    //         func()
    //     }, timeout)
    // }
    //
    // function placeAutocomplete(term, block) {
    //     const KEY = 'AIzaSyA-M4C5q7VMtAjsrGwrf2rh1_rcRXi67zk',
    //           URL = `https://maps.googleapis.com/maps/api/place/autocomplete/json?input=${term}&types=geocode&language=ru&key=${KEY}`;
    //     //тут можно будет прокидывать локаль, и менять язык
    //
    //     fetch(URL)
    //         .then(res => res.json())
    //         .then(data => {
    //             if(data && data.predictions.length){
    //                 console.log(data)
    //                 updateContent(block, data.predictions)
    //             }else{
    //                 setEmpty(block)
    //             }
    //         })
    //         .catch(err => {
    //             console.error(err);
    //         });
    // }
    //
    // document.querySelectorAll('[data-autocomplete]').forEach(el => {
    //     const input = el.querySelector('input');
    //     const dropdownContent = el.querySelector('[data-id="dropdownContent"]');
    //
    //     input.addEventListener('input', function (e) {
    //         const value = e.target.value;
    //         if(value && value.length >= 3){
    //             debounce(() => {
    //                 placeAutocomplete(value, dropdownContent);
    //                 toggleElement(el)
    //             }, 500)
    //         }else{
    //             debounce(() => {
    //                 toggleElement(el, 'remove')
    //             }, 100)
    //         }
    //     });
    //
    //     input.addEventListener('blur', function () {
    //         debounce(() => {
    //             toggleElement(el, 'remove')
    //         }, 300)
    //     })
    // });
    //
    // function toggleElement(el, state = 'add') {
    //     el.classList[state]('active');
    // }
    //
    // function updateContent(el, data) {
    //     el.innerText = '';
    //     const template = data.map(item => (
    //         `<li data-value="${item.description}">${item.description}</li>`
    //     )).join('');
    //     el.insertAdjacentHTML('afterbegin', template);
    //     bindHandlers(el)
    // }
    //
    // function setEmpty(el) {
    //     el.innerText = 'Нет результатов';
    // }
    //
    // function bindHandlers(el) {
    //     const input = el.parentNode.parentNode.querySelector('input');
    //     el.querySelectorAll('[data-value]').forEach(item => {
    //         item.onclick = function () {
    //             input.value = this.dataset.value;
    //         }
    //     })
    // }
    //
    // function getLocation() {
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(setCoords);
    //     }
    // }
    //
    // function setCoords(position) {
    //     const {latitude, longitude} = position.coords;
    //     document.querySelector('[data-id="lng"]').value = longitude;
    //     document.querySelector('[data-id="lat"]').value = latitude;
    // }
    //
    // getLocation()

    let placeSearch;
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
        const place = autocomplete.getPlace();

        for (const component in componentForm) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
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