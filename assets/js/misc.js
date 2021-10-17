var Origlatlng = {};
var Destlatlng = {};

function initMap() {
    var map = new google.maps.Map(document.getElementById("map"), {
        mapTypeControl: false,
        center: { lat: -33.8688, lng: 151.2195 },
        zoom: 13,
        disableDefaultUI: true,
        styles: [{
                elementType: "geometry",
                stylers: [{
                    color: "#ebe3cd"
                }]
            },
            {
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#523735"
                }]
            },
            {
                elementType: "labels.text.stroke",
                stylers: [{
                    color: "#f5f1e6"
                }]
            },
            {
                featureType: "administrative",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#c9b2a6"
                }]
            },
            {
                featureType: "administrative.land_parcel",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#dcd2be"
                }]
            },
            {
                featureType: "administrative.land_parcel",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#ae9e90"
                }]
            },
            {
                featureType: "landscape.natural",
                elementType: "geometry",
                stylers: [{
                    color: "#dfd2ae"
                }]
            },
            {
                featureType: "poi",
                elementType: "geometry",
                stylers: [{
                    color: "#dfd2ae"
                }]
            },
            {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#93817c"
                }]
            },
            {
                featureType: "poi.park",
                elementType: "geometry.fill",
                stylers: [{
                    color: "#a5b076"
                }]
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#447530"
                }]
            },
            {
                featureType: "road",
                elementType: "geometry",
                stylers: [{
                    color: "#f5f1e6"
                }]
            },
            {
                featureType: "road.arterial",
                elementType: "geometry",
                stylers: [{
                    color: "#fdfcf8"
                }]
            },
            {
                featureType: "road.highway",
                elementType: "geometry",
                stylers: [{
                    color: "#f8c967"
                }]
            },
            {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#e9bc62"
                }]
            },
            {
                featureType: "road.highway.controlled_access",
                elementType: "geometry",
                stylers: [{
                    color: "#e98d58"
                }]
            },
            {
                featureType: "road.highway.controlled_access",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#db8555"
                }]
            },
            {
                featureType: "road.local",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#806b63"
                }]
            },
            {
                featureType: "transit.line",
                elementType: "geometry",
                stylers: [{
                    color: "#dfd2ae"
                }]
            },
            {
                featureType: "transit.line",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#8f7d77"
                }]
            },
            {
                featureType: "transit.line",
                elementType: "labels.text.stroke",
                stylers: [{
                    color: "#ebe3cd"
                }]
            },
            {
                featureType: "transit.station",
                elementType: "geometry",
                stylers: [{
                    color: "#dfd2ae"
                }]
            },
            {
                featureType: "water",
                elementType: "geometry.fill",
                stylers: [{
                    color: "#b9d3c2"
                }]
            },
            {
                featureType: "water",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#92998d"
                }]
            }
        ]
    });

    new AutocompleteDirectionsHandler(map);
}

function AutocompleteDirectionsHandler(map) {
    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = "DRIVING";
    this.directionsService = new google.maps.DirectionsService();
    this.directionsRenderer = new google.maps.DirectionsRenderer();
    this.directionsRenderer.setMap(map);

    var originInput = document.getElementById("origin-input");
    var destinationInput = document.getElementById("destination-input");

    var originAutocomplete = new google.maps.places.Autocomplete(originInput);
    originAutocomplete.setFields(["place_id", "geometry"]);

    var destinationAutocomplete = new google.maps.places.Autocomplete(
        destinationInput
    );
    destinationAutocomplete.setFields(["place_id", "geometry"]);

    this.setupPlaceChangedListener(originAutocomplete, "ORIG");
    this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
}

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
    autocomplete,
    mode
) {
    var me = this;
    autocomplete.bindTo("bounds", this.map);

    autocomplete.addListener("place_changed", function() {
        var place = autocomplete.getPlace();
        if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
        }
        if (mode === "ORIG") {
            Origlatlng = {
                Lat: place.geometry.location.lat(),
                Lng: place.geometry.location.lng()
            };
            me.originPlaceId = place.place_id;
        } else {
            Destlatlng = {
                Lat: place.geometry.location.lat(),
                Lng: place.geometry.location.lng()
            };
            me.destinationPlaceId = place.place_id;
        }
        me.route();
    });
};

AutocompleteDirectionsHandler.prototype.route = function() {
    if (!this.originPlaceId || !this.destinationPlaceId) {
        return;
    }
    var me = this;

    this.directionsService.route({
            origin: { placeId: this.originPlaceId },
            destination: { placeId: this.destinationPlaceId },
            travelMode: this.travelMode
        },
        function(response, status) {
            if (status === "OK") {
                me.directionsRenderer.setDirections(response);
            } else {
                swal(
                    "sorry",
                    "i couldn't find the location, please try another location",
                    "error"
                );
            }
        }
    );
};

function haversine_distance(mk1, mk2) {
    var R = 3958.8; // Radius of the Earth in miles
    var rlat1 = mk1.Lat * (Math.PI / 180); // Convert degrees to radians
    var rlat2 = mk2.Lat * (Math.PI / 180); // Convert degrees to radians
    var difflat = rlat2 - rlat1; // Radian difference (latitudes)
    var difflon = (mk2.Lng - mk1.Lng) * (Math.PI / 180); // Radian difference (longitudes)
    var d =
        2 *
        R *
        Math.asin(
            Math.sqrt(
                Math.sin(difflat / 2) * Math.sin(difflat / 2) +
                Math.cos(rlat1) *
                Math.cos(rlat2) *
                Math.sin(difflon / 2) *
                Math.sin(difflon / 2)
            )
        );
    return d;
}

$(document).ready(function($) {
    $("input[name=rideType]").on("change", function() {
        var item = $(this).val();
        console.log(Origlatlng, Destlatlng);
        estimateFare(item);
    });
});

function estimateFare(item) {
    var price;
    switch (item) {
        case "economy":
            price = Math.ceil(10 * haversine_distance(Origlatlng, Destlatlng));
            break;

        case "business":
            price = Math.ceil(20 * haversine_distance(Origlatlng, Destlatlng));
            break;

        case "vip":
            price = Math.ceil(30 * haversine_distance(Origlatlng, Destlatlng));
            break;

        default:
            price = "";
            break;
    }
    $("#estimate").html("Estimated price: &euro;" + price);
    $('#passengePrice').val(price);
    $('input[name=fare_amount]').val(price);
}


function getStat() {
    var session = sessionStorage.getItem("onlineStat");
    switch (session) {
        case "offline":
            sessionStorage.setItem("onlineStat", "online");
            break;

        case "online":
            sessionStorage.setItem("onlineStat", "offline");
            break;

        case null:
            sessionStorage.setItem("onlineStat", "online");
            break;

        default:
            sessionStorage.setItem("onlineStat", "offline");
    }
    $.ajax({
        url: "../assets/system/controller.php",
        method: "post",
        cache: false,
        dataType: "text",
        data: { setOnlineDriver: sessionStorage.getItem("onlineStat") },
        success: function(response) {
            var sesh = sessionStorage.getItem("onlineStat");
            var sesh = sesh == 'online' ? 'offline' : 'online';
            $('#onlineBtn').html(`Go ${sesh}`);
            $.toast({
                heading: "Notification",
                text: "you are now " + sessionStorage.getItem("onlineStat"),
                position: "top-right",
                icon: "info",
                hideAfter: 5000,
                stack: 6
            });
        }
    });
}