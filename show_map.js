//JAVASCRIPT,included in separate file

      function initMap() {  //function called to initialize the map

        var uluru = {lat: 45.507731, lng: -73.776876}; //initial position of the map, to uluru, Google Maps API takes care of handling the content of the variable uluru
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru 
        
        });
        var marker = new google.maps.Marker({ //create a marker (red pin)
          position: uluru,
          map: map //?
        });
        }

  

   