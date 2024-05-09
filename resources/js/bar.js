document.addEventListener('DOMContentLoaded', function () {
    var countrySelect = document.querySelector('select[name="country_id"]');
    var provinceSelect = document.querySelector('select[name="province_id"]');
    var citySelect = document.querySelector('select[name="city_id"]');
    
    countrySelect.addEventListener('change', function () {
        var countryId = this.value;
        var url = '/api/address/get-provinces/' + countryId;

        var xhr = new XMLHttpRequest();

        xhr.open('GET', url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                console.dir(response);
                var provincesObject = JSON.parse(response);

                provinceSelect.innerHTML = '';

                for (var id in provincesObject) {
                    if (provincesObject.hasOwnProperty(id)) {
                        var option = document.createElement('option');
                        option.text = provincesObject[id];
                        option.value = id;
                        provinceSelect.add(option);
                    }
                }

                provinceSelect.disabled = false;
            } else {
                console.error('Request failed with status:', xhr.status);
            }
        };

        xhr.onerror = function () {
            console.error('Request failed');
        };

        xhr.send();
    });

    provinceSelect.addEventListener('change', function () {
        var provinceId = this.value;
        var url = '/api/address/get-cities/' + provinceId;

        var xhr = new XMLHttpRequest();

        xhr.open('GET', url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                var citiesObject = JSON.parse(response);

                citySelect.innerHTML = '';

                for (var id in citiesObject) {
                    if (citiesObject.hasOwnProperty(id)) {
                        var option = document.createElement('option');
                        option.text = citiesObject[id];
                        option.value = id;
                        citySelect.add(option);
                    }
                }

                citySelect.disabled = false;
            } else {
                console.error('Request failed with status:', xhr.status);
            }
        };

        xhr.onerror = function () {
            console.error('Request failed');
        };

        xhr.send();
    });
});