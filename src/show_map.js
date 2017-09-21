    //loading the XML file: Google version
    //parameters: 
    // url: path to the XML file, included into the same master directory to be able to call the file by name
    // callback: function that the  that the script calls when the xml returns to the Javascript

    var customLabel = { //variable that will take care of showing p for paid or f for free in the markers
            Yes: {
              label: 'P'
            },
            No: {
              label: 'F'
            }
          };

        function initMap() {
        var mtl = {lat: 45.497719, lng: -73.575342}; //start at this location for now
        var map = new google.maps.Map(document.getElementById('map'), {
          center: mtl, //center the map to location
          zoom:  14 //zoom level
        });

          var infoWindow = new google.maps.InfoWindow; //create a window object

          // Change this depending on the name of your PHP or XML file
          downloadUrl('connection_mysql.php', function(data) { //using the file in the same directory for the connection to database 
          //and output of the xml document

            var xml = data.responseXML;
            var WiFiSpots = xml.documentElement.getElementsByTagName('marker'); //retrieve the nodes and their respective attributes
            
            Array.prototype.forEach.call(WiFiSpots, function(markerElem) { //go through every node marker (which is every wifispot in
            //the database)
              //create variables that contain every child attribute
              var id = markerElem.getAttribute('idWiFiSpots');
              var name = markerElem.getAttribute('WiFiName');
              var address = markerElem.getAttribute('Address');
              var Strength = markerElem.getAttribute('Strength');
              var Paid = markerElem.getAttribute('Paid');
              var UsersPerDay = markerElem.getAttribute('UsersPerDay');
              
              var point = new google.maps.LatLng( //define variable point as an initialized pointer to the location
                  parseFloat(markerElem.getAttribute('latitude')),
                  parseFloat(markerElem.getAttribute('longitude')));

              var icon = customLabel[Paid] || {}; //create a label on the marker accroding to variable of paid

              var marker = new google.maps.Marker({ //create marker
                position: point,
                map: map,
                label: icon.label
              });
              
              //manage content fo the content on the clicking of the marker
              //using the variables declared earlier concerning the child nodes of WiFiSpots

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
              var text2 = document.createElement('text2');
              text2.textContent = UsersPerDay + ' users per day';
              infowincontent.appendChild(text2);
              infowincontent.appendChild(document.createElement('br'));
              var text3 = document.createElement('text3');
              text3.textContent = Strength + '/5 connectivity';
              infowincontent.appendChild(text3);

              

              //create the on click action response for the marker
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
                map.setZoom(17); // set zoom of 17 when clicking on the marker
                map.setCenter(marker.getPosition()); //centers the map when you click on the marker
              });

            
              
            }); //array
          }); // downloadURL
        }//function init_map()


      //
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {} //function that does nothing
