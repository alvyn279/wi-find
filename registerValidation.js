function check(){

	var name =  document.getElementById("username").value;
	document.getElementById("username").style.backgroundColor="#FFFFFF";
	var email =  document.getElementById("email").value;
	document.getElementById("email").style.backgroundColor="#FFFFFF";
	var wifiname =  document.getElementById("wifiname").value;
	document.getElementById("wifiname").style.backgroundColor="#FFFFFF";
	var address =  document.getElementById("address").value;
	document.getElementById("address").style.backgroundColor="#FFFFFF";
	var latitude =  document.getElementById("latitude").value;
	document.getElementById("latitude").style.backgroundColor="#FFFFFF";
	var longitude = document.getElementById("longitude").value;
	document.getElementById("longitude").style.backgroundColor="#FFFFFF";

	var alerts="";

	if (name == ""){
		alerts += "Please enter your full name.\n";

		document.getElementById("username").style.backgroundColor="#f2dede";
		
		if  (document.getElementById("alertWell") == null){
			setAlertWell();
		}
	}
	if (email== ""){
		alerts += "Please enter your email address.\n";
		
		document.getElementById("email").style.backgroundColor="#f2dede";
		
		if  (document.getElementById("alertWell") == null){
			setAlertWell();
		}
	}
	if (wifiname == ""){
		alerts += "Please enter the name of the desired new wi-spot.\n";
		
		document.getElementById("wifiname").style.backgroundColor="#f2dede";
		
		if  (document.getElementById("alertWell") == null){
			setAlertWell();
		}
	}
	if (address == ""){
		alerts += "Please enter the address associated with the location of the wi-fi spot.\n";
		
		document.getElementById("address").style.backgroundColor="#f2dede";
		
		if  (document.getElementById("alertWell") == null){
			setAlertWell();
		}
	}
	if (latitude == ""){
		alerts +="Please enter the latitude coordinate of the wi-fi spot.\n";
		
		document.getElementById("latitude").style.backgroundColor="#f2dede";
		
		if  (document.getElementById("alertWell") == null){
			setAlertWell();
		}
	}
	if (longitude == ""){
		alerts += "Please enter the longitude coordinate of the wi-fi spot.\n";
		
		document.getElementById("longitude").style.backgroundColor="#f2dede";
		
		if  (document.getElementById("alertWell") == null){
			setAlertWell();
		}
	}
	alert(alerts);
	return false;

}


function setAlertWell(){

	var alertdiv = document.createElement("div");
	alertdiv.setAttribute("id", "alertWell");
	alertdiv.setAttribute("class", "alert alert-danger");

	var textnode = document.createTextNode("Please fill all the blanks in order to complete the registration of the new wi-fi spot.");
	alertdiv.appendChild(textnode);

	document.getElementById("message").appendChild(alertdiv);
	
	return false;
}