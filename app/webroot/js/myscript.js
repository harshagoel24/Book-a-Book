
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
addMarker(map, googleLatLng, "YOUR CURRENT LOCATION", "The Product is to be delivered here ");	

var dataString="lat="+position.coords.latitude+"&lng="+position.coords.longitude;
$.ajax({
	type : "POST",
	url : "http://localhost/book-a-book/locations/add",
	data: dataString,
	beforeSend: function(){},
	success : function(){
		
		alert("success"+position.coords.latitude + " " + position.coords.longitude);
	},
	error: function(){
		alert("something went wrong");
	},
	complete : function(){
		
	}
	
});
	
	//$("p#demo").html("Latitude:"+ position.coords.latitude +"<br> Longitude"+ position.coords.longitude +"<br> Accuracy"+ position.coords.accuracy);
	
}

function addMarker(map, googleLatLng ,title , content){ // content wo h jo click karne par box mein likha hoga
	var markerOptn ={
		position : googleLatLng,
		map : map,
		title : title,
		animation : google.maps.Animation.BOUNCE // it could be BOUNCE... i.e google.maps.Animation.BOUNCE
		
	}
	
	var marker = new google.maps.Marker(markerOptn);
	
	var infoWindow = new google.maps.InfoWindow({content : content , position : googleLatLng});
	
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

