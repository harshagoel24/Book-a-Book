<?php 
  
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$ids = $current_user['id'];
	
 $sql = "INSERT INTO `locations` (`users_id`,`latitude`, `longitude`) VALUES ('$ids','$lat', '$lng')";

if(mysql_query($sql))
	echo "yes";
else
	echo "no";

	//2. Select Database
   ///mysql_select_db($dbname,$con);
   
   //3. Generate Database Insert Query
   
   
   //4. Run mysql Query to insert

   // Return appropriate return back to Javascript code - Success or Failure 
 
 
 ?>