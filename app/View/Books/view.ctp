<style>
            /****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
            
            h1 { font-size: 1.5em; margin: 10px; }
			
			#rate_review{
				
			margin:0 auto;
			margin-top:20px;
			border: 1px solid #F2F2F2;
			padding: 20px 20px;
			
			width: 48%;
			overflow:hidden;
			height:auto;
			border-radius:7px;
			}
			
            .rating { 
                border: none;
                float: left;
            }
 
            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
 
            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }
 
            .rating > label { 
                color: #FFF; 
                float: right; 
            }
 
            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }
 
            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     
 
 
            /* Downloaded from http://devzone.co.in/ */
        </style>

<?php 
echo $this->Html->script('jquery-1.11.3.min');
echo $this->fetch('script');

			?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true" ></script>
<?php 		
			
	
			$dbhostname="localhost";
			$dbuname="root";
			$dbpwd="";
			$dbname="bookabook";
			$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
			mysql_select_db($dbname,$con);
			$login_user=$current_user['id'];
			$BOOK_ID=$book['Book']['id'];
			$genre1 = $book['Book']['category_id'];
			$sql = "SELECT * FROM `categories` where `id` = $genre1";
			$ans=mysql_query($sql);
			$row=mysql_fetch_assoc($ans);
			$genree=$row['name'];
			$seller_id=$book['Book']['user_id'];
			$sql1 = "SELECT * FROM `users` where `id` = $seller_id";
			$ans1=mysql_query($sql1);
			$row1=mysql_fetch_assoc($ans1);
			$seller_name=$row1['username'];

?>
			
			<div id="wholebook">
				<div id="imagebox">
					<div style="height:325px;width:185px;margin:0 auto;">
						<?php echo $this->Html->link(
						$this->Html->image($book['Book']['cover_pic'],array('id'=>'imagebox_pik')),
						array('action' => 'view',$book['Book']['id']),
						array('escape' => false)
				); ?>
						
					</div>
				</div>
				<div id="contentbox">
					<div id="title">
						<h2 id="bookname"><?php echo $book['Book']['name']; ?></h2>
						<span id="author">by <?php echo $book['Book']['author'];?></span>
					</div>
					<div id="rent_details">
						<div id="left_rent_details">
							<p class="descdetails">
								<span> MRP: </span><span><del>Rs. <?php echo $book['Book']['mrp'];?> </del></span>
							</p>
							<p class="descdetails">
								<span> Rent: </span><span class="rent_rate">Rs. <?php echo $book['Book']['rent_prices'];?></span>
							</p>
							<p class="descdetails addtorent">
								<span><span style="margin-left: 13px;">Rental Charges:</span>
								<span class="rent_rate"> Rs. <?php echo $book['Book']['rent_prices'];?></span></span>
								<?php if($logged_in):
										$lid=$current_user['id'];
										else:
										$lid=0;
										endif;
								?>
								<?php
								if($book['Book']['is_rented'] == 1 || $book['Book']['user_id'] == $lid):
								{ ?>
								
								<a class="rent" style="background-color:grey;">Rent</a>
								<?php	
								} ?>
								<?php
								else :  ?>
								<a class="rent" href="http://localhost/book-a-book/carts/show">Rent</a>
								
								<?php	
									endif;
									?>
								
							</p>
							<h4 style="margin: 0px 0px 5px 10px;">Delivery Details</h4>
							<ul id="det" style="list-style: outside none disc;padding-bottom: 15px;margin-left: 15px;">
								<li>Delivery in <span>3-5</span> business days</li>
								<li>Same day shipping</li>
							</ul>
						
						
						</div>
						<div id="right_rent_details">
							<div class="bookdetail">
								<h4>Book Details</h4>
									<ul>
										<li><span>Publisher</span><?php echo $book['Book']['author']; ?></li>
										<li><span>Genre</span><?php echo $genree; ?></li>
										<li><span>ISBN</span><?php echo $book['Book']['isbn']; ?></li>
										<li><span>Binding</span>Paperback</li>					
										<li><span>Seller</span><?php echo $seller_name;?></li>					
									</ul>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="bookSummary" style="overflow:hidden;height:auto">
					
						<div class="bookSummary_sum">
							<p></p>
							<p></p>
							<h2>Summary of the book</h2>
							<p>
							
								<?php 					
										echo $book['Book']['summary'];?>  
							</p>
						</div>
						<div class="youtube">
							<p></p>
							<p></p>
							
							<h2>YouTube Review Video</h2>
							<div id="player" style="margin:0 auto;">This text will be replaced by a player.</div>
							<p id="demo"></p>
							
						</div>
						
				</div>
				
			<div class="sellers">
			<h4>SELLERS</h4>
					
			<p id="map" style= "margin-top:20px;margin-bottom;width:300px; height:300px;">This book dont have any seller.</p>
			<p id="nhiata"></p>
			</div>
			<br></br>
			<!--RATE AND Review -->
			<h3 style="color: #555;font-size: 21px;margin-bottom:10px;margin-left:320px">User Reviews</h3>
			<div style="margin:0 auto;overflow-y:auto;height:300px;width:325px;;">
					
					<?php
	$sql = "SELECT * FROM `rating` where review IS NOT NULL AND book_id = '$BOOK_ID' ORDER BY id DESC";
	$result= mysql_query($sql);
	
    while($row= mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$rate= $row['rate'];
		$review= $row['review'];
		$userid= $row['user_id'];
		$sqlnam=mysql_query("select * from users where `id`='$userid'");
		$nama1=mysql_fetch_assoc($sqlnam);
		$nama=$nama1['username'];
	
	?>
	
	<div class="display_review" 
	style="background: #F2F2F2 none repeat scroll 0% 0%;border:1px solid rgb(156, 156, 156);
	overflow:hidden;height:auto; width:320px">
		<div style="padding:5px;" class="left_col">
			<div class="star">
			<br>
			<span style="width:200px"><strong>Rating:</strong>
			
			 <?php echo $rate; ?>
			 <?php
			echo $this->Html->image('Star-Full-icon.png',
						array('height' => '15','width' => '15'));
			?>
			</span>
			</div >
			
		</div>
		<div style="padding:5px;" class="right_col">
		<p style= "font-size = 16px;"><strong>Rater:<?php echo $nama; ?></strong>
		 <br></p>
		<?php echo $review; ?>
		</div>
	</div>
	<?php
	}
	?>
	</div>			
					<?php if($logged_in): ?>
				
					<div id="rate_review" style="padding-bottom:10px;">
					
					<legend style="color: #555;font-size: 21px;"> <strong>RATE AND REVIEW </strong> </legend>
                    <fieldset id='demo2' class="rating" >
					
                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
                        <label class = "full" for="star5" title="5 stars"></label>
                        <input class="stars" type="radio" id="star4half" name="rating" value="4.5" />
                        <label class="half" for="star4half" title="4.5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3half" name="rating" value="3.5" />
                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2half" name="rating" value="2.5" />
                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1half" name="rating" value="1.5" />
                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input class="stars" type="radio" id="starhalf" name="rating" value="0.5" />
                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						<input type="submit" value="submit"></input>
					</fieldset>
					<br> 
					<br>
					<form method="POST">
					<textarea placeholder ="Write Your Review" name="review" cols = "100" rows = "5" ></textarea>
					<br>
				
					<input type="submit" name="rev" style="background-color:green;float:right;margin:5px;
					color:#FFF;font-size:15px;
					" value="Review"></input>
					<br>
					</form>
					
					</div>

					<?php endif; ?>
			<?php
				
				if (isset($_POST['rev']) && !empty($_POST['review'])) {
					$review= $_POST['review'];
			$rate1 = "SELECT * FROM `rating` WHERE `user_id`= '$login_user' AND `book_id` = '$BOOK_ID'";
				$result_rate=mysql_query($rate1);

				if (mysql_num_rows($result_rate)>0) {
					$rate2 = "UPDATE `rating` SET `review` =  ' $review'  WHERE `user_id`= '$login_user' AND `book_id` = '$BOOK_ID'";
					mysql_query($rate2);
				   // echo $row['id'];
				} else {
			 
					$rate3 = "INSERT INTO `rating` ( `review`, `user_id`,`book_id`) VALUES ('$review', '$login_user', '$BOOK_ID') ";
					mysql_query($rate3);
				}
			}
			
			?>		
					
			<!-- End RATE AND REVIEW -->
				
<?php 
	include('includes/dbfunctions.php');
	
	$nameis=$book['Book']['name'];
	$sql2 = "SELECT * FROM `books` where `name` = '$nameis'";
	$query=mysql_query($sql2);
	$n=mysql_num_rows($query);
	?>
	
<script type="text/javascript">

</script>
<script>
                       $(document).ready(function () {
						 
                            $("#demo2 .stars").click(function () {
                                
								var star= "rate="+$(this).val();
								
								var bookkiid= "&bookid="+<?php echo $BOOK_ID?>;
								
								var loginid = "&userid="+<?php echo $login_user?>;
								
								var main_data=star+bookkiid+loginid;
								
								
								$.ajax({
									type: "POST",
									url: "http://localhost/book-a-book/app/webroot/files/ratingnew.php",
									//dataType : 'json',
									cache: false,
									data: main_data,
									success: function(d){
										 if(d>0)
                                    {
                                        
                                    }else{
                                        
                                    }
			
							},
								error: function(){
									alert("something went wrong");
								},
								complete : function(){

								}

							});
								
                                $(this).attr("checked");
                            });
                        });
                    </script>
<script>
	$(document).ready(function(){
	
if(navigator.geolocation)
{
	navigator.geolocation.getCurrentPosition(success,fail);
}
	else{
	$("#nhiata").html('HTML5 not supported');
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
		
				<?php
				while($seller = mysql_fetch_assoc($query)){ 
				 
				 ?>
						
				<?php 
							$user=$seller['user_id'];
							$rent=$seller['rent_prices'];
							$buk=$seller['id'];
							$sql1 = "SELECT * FROM `users` where `id` = '$user'";
							$query1=mysql_query($sql1);
							$ans=mysql_fetch_assoc($query1);
							
							$sel_name=$ans['username'];
														
							$esql = "SELECT * FROM `locations` where `users_id` = '$user'";
							$quer=mysql_query($esql);
							$anss=mysql_fetch_assoc($quer);
							
							$longitude= $anss['longitude'];
							$latitude= $anss['latitude'];
							$s="http://localhost/book-a-book/books/view/".$buk;
							$url="<a href='$s'>Details</a>";
				?>
							
	   
	
	var DefaultLatLng= new google.maps.LatLng(<?php echo $latitude?>,<?php echo $longitude?>);
	addMarker(map,DefaultLatLng,"<?php echo $sel_name?>","<?php echo "Rs.".$rent; ?> :<?php echo $url?>");	
				
				<?php
				
				} ?>
		
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
	$("#nhiata").html(errMsg);
	
}

	</script>		
			
             <!--
				YOUTUBE API HERE
			 -->
<?php

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
 // Call set_include_path() as needed to point to your client library.
//include('google-api-php-client-master/src/Google/*.php'); 
//set_include_path("google-api-php-client-master/src");

include_once ('google-api-php-client-master/src/Google/Client.php');
include_once ('google-api-php-client-master/src/Google/Exception.php');
include_once ('google-api-php-client-master/src/Google/autoload.php');
include_once ('google-api-php-client-master/src/Google/Utils.php');
include_once ('google-api-php-client-master/src/Google/Config.php');
include_once ('google-api-php-client-master/src/Google/Model.php');
include_once ('google-api-php-client-master/src/Google/Collection.php');
include_once ('google-api-php-client-master/src/Google/Service/Resource.php');
include_once ('google-api-php-client-master/src/Google/Service.php');
include_once ('google-api-php-client-master/src/Google/Service/YouTube.php');
//require_once("C:\wamp\www\fb\google-api-php-client-master\src\Google\Service\YouTube.php");
  /*
   * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
   * Google Developers Console <https://console.developers.google.com/>
   * Please ensure that you have enabled the YouTube Data API for your project.
   */
  $DEVELOPER_KEY = 'AIzaSyAYkncuOCtv6TImgIzfXcJP6mD8xOxliPE';
	
  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);

  // Define an object that will be used to make all API requests.
  $youtube = new Google_Service_YouTube($client);
	$namhai=$book['Book']['name']." "."Book Review";
	try {
    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $namhai
      
	 
    ));

    $videos = '';
    $channels = '';
    $playlists = '';

    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
	$a=array();
    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
          $videos .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['videoId']);
			 array_push($a,$searchResult['id']['videoId']); 

	 break;
        case 'youtube#channel':
          $channels .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['channelId']);
			  
			  
          break;
        case 'youtube#playlist':
          $playlists .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
          break;
      }
    }
	
	
   
  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
    htmlspecialchars($e->getMessage()));
  }

?>
	 		
   
<script type="text/javascript">
playlistids = <?php echo json_encode($a); ?>;
var playing = playlistids[0];

// 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '260',
          width: '350',
          videoId: playing,
		 /* playerVars: {

			videoDuration: "small"
		  }*/
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
     function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo,0);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }


</script>
<!-- 
YOUTUBE API ENDS HERE
-->


