<?php
    //This php code will take care of sending a confirmation email. Will do this for th hosting service as well.
    
    $username = $_POST["username"];
    $email= $_POST["email"];
    $wifiname = $_POST["wifiname"];
    $address = $_POST["address"];
    $latitude = $_POST["latitude"];
    $longitude= $_POST["longitude"];
    $strength = $_POST["strength"];
    
    $subject= "Request for new entry on Wi-Find database";
    $message= "Hello " .  $username. ", \n\nWe would like to thank you for your interest in providing free public Wi-Fi to the population of Montreal.This email is a confirmation of your request to add a wi-fi spot onto wi-find.alvynle.me. Here are in full the details of your submission:  \n\n";
    
   
    $message .= "Applicant name: $username  \n";
    $message .= "Wi-Fi Spot Name:  $wifiname \n";
    $message .= "Address:  $address \n";
    
    $message .= "Longitude: $longitude \n";
    $message .= "Latitude: $latitude \n";
    $message .= "Strength: $strength \n\n";
    
    $message .=  "Your application for a new registration will be taken under review within the next days and a status email will be sent to $email \n\nSincerely,\nThe Wi-Find Team";
    
    
    mail($email, $subject, $message);
    //send a copy to master 
    mail("register@alvynle.me", $subject, $message);
    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="../wifind.ico" />
    <title>Send in your request</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/registerValidation.js"></script>
  </head>
  
  <body onload="updateData()">
      
     <nav class="navbar navbar-inverse">
       <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.html">Wi-Find&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-home">&nbsp;</span></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="../about-us.html">About Us</a></li>
            <li><a href="../find-wifi.html">Find a Wi-Fi Location</a></li>
            <li class="active"><a href="#">Request Entry</a></li>
          </ul>
        </div>
    </nav> 
    <div class="container-fluid">

        <div class="jumbotron text-center">
             <h2>Your request was sent</h2>
        </div>

        <div id="message">
            <div class="alert alert-success"> <b>Your request for a new Wi-Fi spot on our database was successfully submitted.</b> A confirmation email has been sent to <b><?php echo $_POST["email"]?></b> along with the details of your entry. The entry will be reviewed and you will be contacted by email shortly.</div>
        </div>

      </div>
      <div class="container-fluid">
      <div class="row">      
          <div class="col-sm-12">
          </div>
        </div>
      </div>

      <div class="container">

      </div>

  </body>
  
</html>

