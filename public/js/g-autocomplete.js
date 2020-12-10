document.addEventListener('DOMContentLoaded', function () {
    function debounce(func, timeout) {
        let timeoutInterval;
        clearTimeout(timeoutInterval);
        timeoutInterval = setTimeout(() => {
            func()
        }, timeout)
    }

    function placeAutocomplete(term, block) {
        const KEY = 'AIzaSyA-M4C5q7VMtAjsrGwrf2rh1_rcRXi67zk',
              URL = `https://maps.googleapis.com/maps/api/place/autocomplete/json?input=${term}&types=geocode&language=ru&key=${KEY}`;
        //тут можно будет прокидывать локаль, и менять язык

        fetch(URL)
            .then(res => res.json())
            .then(data => {
                if(data && data.predictions.length){
                    updateContent(block, data.predictions)
                }else{
                    setEmpty(block)
                }
            })
            .catch(err => {
                console.error(err);
            });
    }

    document.querySelectorAll('[data-autocomplete]').forEach(el => {
        const input = el.querySelector('input');
        const dropdownContent = el.querySelector('[data-id="dropdownContent"]');

        input.addEventListener('input', function (e) {
            const value = e.target.value;
            if(value && value.length >= 3){
                debounce(() => {
                    placeAutocomplete(value, dropdownContent);
                    toggleElement(el)
                }, 500)
            }else{
                debounce(() => {
                    toggleElement(el, 'remove')
                }, 100)
            }
        });

        input.addEventListener('blur', function () {
            debounce(() => {
                toggleElement(el, 'remove')
            }, 300)
        })
    });

    function toggleElement(el, state = 'add') {
        el.classList[state]('active');
    }

    function updateContent(el, data) {
        el.innerText = '';
        const template = data.map(item => (
            `<li data-value="${item.description}">${item.description}</li>`
        )).join('');
        el.insertAdjacentHTML('afterbegin', template);
        bindHandlers(el)
    }

    function setEmpty(el) {
        el.innerText = 'Нет результатов';
    }

    function bindHandlers(el) {
        const input = el.parentNode.parentNode.querySelector('input');
        el.querySelectorAll('[data-value]').forEach(item => {
            item.onclick = function () {
                input.value = this.dataset.value;
            }
        })
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setCoords);
        }
    }

    function setCoords(position) {
        const {latitude, longitude} = position.coords;
        document.querySelector('[data-id="lng"]').value = longitude;
        document.querySelector('[data-id="lat"]').value = latitude;
    }

    getLocation()

});
