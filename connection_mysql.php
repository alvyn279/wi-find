<?php
require 'database-credentials.php';
/*
$servername="localhost";
$username= "root";
$password= "Janus097";
$database= "wifi_database";
*/
// Start XML file, create parent node

function parseToXML($htmlStr)
	{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

function handle_sql_errors($something, $error_message)
{
    //echo '<pre>';
    echo $something;
    //echo '</pre>';
    echo $error_message;
    //die();
}

// PDO class usage for opening a connection to MySQL with the use of PHP
try {
	//definition of DSN:
	//$dsn = "mysql:host=localhost;dbname=example";
	//$dbh = new PDO($dsn, $username, $password);
    	$conn = new PDO("mysql:host=$servername; dbname=$database"/* charset=utf8mb4*/, $username, $password);
    // set the PDO error mode to exception
   		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    	//echo "Connected successfully. Transmitting"; 
    }
catch(PDOException $ex){
    	handle_sql_errors("Connection failed", ($ex->getMessage()));//get message is an integrated method that can analyze the PDOException event and get its error type in a string
    }


//select all the rows in the the WiFiSpots table
try{
		$query= "SELECT * FROM WiFiSpots WHERE 1" ;	
		//$result= $conn->query($query);
		$stmt = $conn->prepare($query);
		$stmt->execute();
		//$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo "\n Sick Connection M8";

}
catch(PDOException $ex){ //handle error
		handle_sql_errors("Failure to run query", ($ex->getMessage()));
}

header('Content-Type: text/xml');
//echo the parent node

echo '<WiFiSpots>';
	//going through all the rows, echoing in xml
	foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {	
	//while($row = $result->fetch(PDO::FECTH_ASSOC)){

	 echo '<marker ';	
	  echo 'idWiFiSpots="' . $row['idWiFiSpots'] . '" ';
	  echo 'WiFiName="' . parseToXML($row['WiFiName']) . '" ';
	  echo 'Strength="' . $row['Strength'] . '" ';
	  echo 'Paid="' . parsetoXML($row['Paid']) . '" ';
	  echo 'UsersPerDay="' . $row['UsersPerDay'] . '" ';
	  echo 'latitude="' . $row['latitude'] . '" ';
	  echo 'longitude="' . $row['longitude'] . '" ';
	  echo 'Address="' . parseToXML($row['Address']) . '" ';
	  echo 'DateRegistered="' . parseToXML($row['DateRegistered']) . '" ';
	  echo '/>';
	  	
	}
//ending xml file
echo '</WiFiSpots>';

?>
