var util = {
    isValidEmail: function (email) {
        return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    },
    isEmpty: function (field) {
        return field.length === 0 || field === "";
    }
};
function errorMessages() {
    return {
        name: "Please enter your full name.",
        email: "Please enter a valid email address.",
        wifiname: "Please enter the name of the desired new wi-spot.",
        address: "Please enter the address associated with the location of the wi-fi spot.",
        latitude: "Please enter the latitude coordinate of the wi-fi spot.",
        longitude: "Please enter the longitude coordinate of the wi-fi spot",
        strength: "Please enter the strength you obtain in terms of bars when connecting to the wi-fi spot."
    };
}
function check() {
    var inputBGColor = {
        red: "#f2dede",
        white: "#fff"
    };
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
            if (!util.isValidEmail(fields[i].selector.value)) {
                alerts += fields[i].errorMsg + "\n";
                fields[i].selector.style.backgroundColor = inputBGColor.red;
            } else {
                fields[i].selector.style.backgroundColor = inputBGColor.white;
            }
        } else if (strengthSelectedIndex === 0 && i === strengthIndex) { // special case for strength
            alerts += fields[i].errorMsg + "\n";
            fields[i].selector.style.backgroundColor = inputBGColor.red;
        } else if (util.isEmpty(fields[i].selector.value)) {
            alerts += fields[i].errorMsg + "\n";
            fields[i].selector.style.backgroundColor = inputBGColor.red;
        } else {
            fields[i].selector.style.backgroundColor = inputBGColor.white;
        }
    }
    if (alerts === "") {
        document.getElementById("registerForm").setAttribute('action', "server/emailLanding.php");
    } else {
        alert(alerts);
        var alertWell = document.getElementById("alertWell");
        alertWell.classList.remove("hidden");
        return false;
    }
}
