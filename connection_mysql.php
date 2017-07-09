<?php
include 'database-credentials.php';
//include path ?

// PDO class usage for opening a connection to MySQL with the use of PHP
try {
    	$conn = new PDO('mysql:host=$servername;dbname=$database, charset=utf8mb4', $username, $password);
    // set the PDO error mode to exception
   		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    	echo "Connected successfully. Transmitting"; 
    }
catch(PDOException $ex)
    {
    	echo "Connection failed: " . $ex->getMessage();
    }


//select all the rows in the the WiFiSpots table


$query= "SELECT * FROM WiFiSpots WHERE 1";
$result= $conn->query($query);
 //handle error

header(Content-type: text/xml);

//going through all the rows, creating xml nodes for each

while($row=$conn->fetch(PDO::FECTH_ASSOC)){

//ADD XML DOCUMENT NODE. 
$node =$doc->create_element("wifi");
$newnode = $parnode->append_child($node);

$newnode->set_attribute("idWiFiSpots",$row['idWiFiSpots']);
$newnode->set_attribute("WiFiName",$row['WiFiName']);
$newnode->set_attribute("Strength",$row['Strength']);
$newnode->set_attribute("Paid",$row['Paid']);
$newnode->set_attribute("UsersPerDay",$row['UsersPerDay']);
$newnode->set_attribute("latitude",$row['latitude']);
$newnode->set_attribute("longitude",$row['longitude']);
$newnode->set_attribute("Address",$row['Address']);
$newnode->set_attribute("Date Registered",$row['Date Registered']);

}

$xmlfile= $doc->dump_mem();
echo $xmlfile;

?>

<!-- CLOSE CONNECTION $conn = null; -->