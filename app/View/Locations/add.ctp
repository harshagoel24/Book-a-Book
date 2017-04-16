<?php 
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookabook";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


	
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$ids = $current_user['id'];
	$sql = "INSERT INTO `bookabook`.`locations` (`users_id`, `latitude`, `longitude`) VALUES ('$ids', '$lat','$lng')";

	if($conn->query($sql))
	echo "yes";
	else
	echo "no";
	$conn->close();

 
 ?>