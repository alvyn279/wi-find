<?php
    
    

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="wifind.ico" />
    <title>Send in your request</title>
    <link rel="stylesheet" type="text/css" href="webpage_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="registerValidation.js"></script>
  </head>
  
  <body onload="updateData()">
      
     <nav class="navbar navbar-inverse">
       <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Wi-Find&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-home">&nbsp;</span></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="find_wifi.html">Find a Wi-Fi Location</a></li>
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

