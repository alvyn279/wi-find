var autocomplete;

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('address')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();
    var formattedAddress = place.formatted_address;
    document.getElementById("formatted-address").value = formattedAddress.split(" ").join("+");
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}
/***************************************************/
// Get GPS Coordinates logic starts here
var coordinateComponents = {
    lat: document.getElementById("latitude"),
    lng: document.getElementById("longitude"),
    formattedAddress: document.getElementById("formatted-address"),
    request: "https://maps.googleapis.com/maps/api/geocode/json?address=",
    APIKey: "&key=AIzaSyBQG5yAn1cybxAKDpFrVyiWWyg3FEt3gMg"
};

function getCoordinates() {
    alert(coordinateComponents.formattedAddress.value);
    var formattedAddressVal = coordinateComponents.formattedAddress.value;
    var fullRequest = coordinateComponents.request + formattedAddressVal + coordinateComponents.APIKey;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            coordinateComponents.lat.value = response.results[0].geometry.location.lat;
            coordinateComponents.lng.value = response.results[0].geometry.location.lng
        }
    };
    xhttp.open("GET", fullRequest, true);
    xhttp.send();
}

