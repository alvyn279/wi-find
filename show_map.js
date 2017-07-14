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



    //loading the XML file: Google version
    //parameters: 
    // url: path to the XML file, included into the same master directory to be able to call the file by name
    // callback: function that the  that the script calls when the xml returns to the Javascript

    function downloadURL(url, callback){

      var request=window.ActiveXObject?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

      request.onreadystatechange= function(){
        if (request.readyState == 4) { //the response is ready
          request.onreadystatechange = doNothing;
          callback(request, request.status); 
        }
      }
      request.open('GET', url, true);
      request.send(null);
    }