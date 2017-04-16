<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php
	echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
	?>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<?php
	echo $this->Html->script('myscript');
	echo $this->fetch('script');
	?>
	
	
	
	
	
</head>
<body>
<div class="center_content">
	<div class="prod_box_big">
      
		<div class="center_prod_box_big">
		<div>
	<h4 style="margin:20px">   MY MAP</h4>
	<p id="map" style= "margin:0 auto;width:300px; height:300px;"> </p>
	<h3></h3>
	</div>
		</div>
		</div>
</div>
</body>
</html>
