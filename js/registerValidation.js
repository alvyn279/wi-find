function errorMessages() {
    return {
        name: "Please enter your full name.",
        email: "Please enter your email address.",
        wifiname: "Please enter the name of the desired new wi-spot.",
        address: "Please enter the address associated with the location of the wi-fi spot.",
        latitude: "Please enter the latitude coordinate of the wi-fi spot.",
        longitude: "Please enter the longitude coordinate of the wi-fi spot",
        strength: "Please enter the strength you obtain in terms of bars when connecting to the wi-fi spot."
    };
}
function check() {
    var colorRed = "#f2dede";
    var alerts = "";
    var fields = [
        {selector: document.getElementById("username"), errorMsg: errorMessages().name},
        {selector: document.getElementById("email"), errorMsg: errorMessages().email},
        {selector: document.getElementById("wifiname"), errorMsg: errorMessages().wifiname},
        {selector: document.getElementById("address"), errorMsg: errorMessages().address},
        {selector: document.getElementById("latitude"), errorMsg: errorMessages().latitude},
        {selector: document.getElementById("longitude"), errorMsg: errorMessages().longitude},
        {selector: document.getElementById("strength"), errorMsg: errorMessages().strength}
    ];
    for (var i = 0; i < fields.length; i++) {
        var strengthIndex = fields.length - 1;
        var strengthSelectedIndex = fields[strengthIndex].selector.selectedIndex;
        if (i === 1) { // special case for email
            if (!Util.isValidEmail(fields[i].selector.value)) {
                alerts += fields[i].errorMsg + "\n";
                fields[i].selector.style.backgroundColor = colorRed;
            }
        } else if (strengthSelectedIndex === 0 && i === strengthIndex) { // special case for strength
            alerts += fields[i].errorMsg + "\n";
            fields[i].selector.style.backgroundColor = colorRed;
        } else if (Util.isEmpty(fields[i].selector.value)) {
            alerts += fields[i].errorMsg + "\n";
            fields[i].selector.style.backgroundColor = colorRed;
        }
    }
    if (alerts === "") {
        document.getElementById("registerForm").setAttribute('action', "server/emailLanding.php");
    } else {
        alert(alerts);
        setAlertWell();
        return false;
    }
}

function setAlertWell() {

    var alertdiv = document.createElement("div");
    alertdiv.setAttribute("id", "alertWell");
    alertdiv.setAttribute("class", "alert alert-danger");

    var textnode = document.createTextNode("Please fill all the blanks in order to complete the registration of the new wi-fi spot.");
    alertdiv.appendChild(textnode);

    document.getElementById("message").appendChild(alertdiv);

    return false;
}
