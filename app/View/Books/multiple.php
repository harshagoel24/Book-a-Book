<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src='jquery-1.11.3.min.js'></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</head>
<body>
	<p id="map" style= "width:600px; height:600px;"> </p>
	<p>vshvxj</p>
</body>
</html>
<?php 
$id=$current_user['id'];

$sql1="select * from locations where users_id='$id'";
$result1=mysql_query($sql);

$sql = "SELECT * FROM `locations`";
$result=mysql_query($sql);
?>
<script>
$(document).ready(function(){
if(navigator.geolocation)
	navigator.geolocation.getCurrentPosition(success,fail);
else{
	$("p").html('HTML5 not supported');
}


});


function success(position)
{
	
	var googleLatLng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	
	var mapOtn ={
		zoom : 10,
		center : googleLatLng,
		mapTypeId : google.maps.MapTypeId.ROAD  // it could be SATELLITE or HYBRID also
	};
	
	var Pmap= document.getElementById("map");
	
	var map= new google.maps.Map(Pmap, mapOtn);
	
<?php	while($row= mysql_fetch_array($result, MYSQL_ASSOC))
{ ?>




//var x= document.write('seller'.link('http://www.facebook.com'));

<?php $link_address = "http://www.facebook.com"?>   // link of the seller
	var DefaultLatLng= new google.maps.LatLng(<?php echo $row['latitude']?>,<?php echo $row['longitude']?>);
addMarker(map, DefaultLatLng, "<?php echo $row['id'];?> ", "<?php echo $row['id'];?> : <?php echo "<a href='".$link_address."'>Details</a>";
?>" );	


	<?php } ?>
	//$("p#demo").html("Latitude:"+ position.coords.latitude +"<br> Longitude"+ position.coords.longitude +"<br> Accuracy"+ position.coords.accuracy);
	
}


function addMarker(map, DefaultLatLng ,title , content){ // content wo h jo click karne par box mein likha hoga
	var markerOptn ={
		position : DefaultLatLng,
		map : map,
		title : title,
		animation : google.maps.Animation.BOUNCE // it could be BOUNCE... i.e google.maps.Animation.BOUNCE
		
	}
	
	var marker = new google.maps.Marker(markerOptn);
	
	var infoWindow = new google.maps.InfoWindow({content : content , position : DefaultLatLng});
	
	google.maps.event.addListener(marker, "click" , function(){
		
		infoWindow.open(map);
	});
}


function fail(error)
{
	var errorType ={
		0 : "Unknown error",
		1 : "Permission Denied By the User",
		2 : "Position of the user not available",
		3 : "Request Timed Out"
	};
	
	var errMsg = errorType[error.code];
	if(error.code==0 || error.code==2)
	{
		errMsg= errMsg + ' - ' + error.message;
		
	}
	$("p").html(errMsg);
	
}
</script>

