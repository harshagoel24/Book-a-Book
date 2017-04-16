    
    <style>
        
        
        #slideshow{
            margin:0 auto;
            width:940px;
            height:356px;
            overflow: hidden;
            position: relative;
        }

        #slideshow ul{
            list-style:none;
            margin:0;
            padding:0;
            position: absolute;
        }

        #slideshow li{
            
			float:left;
			padding:0;
			margin:0;
        }


        #slideshow a:hover{
            background: rgba(0,0,0,0.8);
            border-color: #000;
        }

        #slideshow a:active{
            background: #990;
			border-color: #000;
        }

        .slideshow-prev, .slideshow-next{
            position: absolute;
            top:180px;
            font-size: 30px;
            text-decoration: none;
            color:#fff;
            background: rgba(0,0,0,0.5);
            padding: 5px;
            z-index:2;
        }
        
        .slideshow-prev{
            left:0px;
            
        }

        .slideshow-next{
            right:0px;
            
        }

    </style>

<?php
	echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
?>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$dbhostname="localhost";
$dbuname="root";
$dbpwd="";
$dbname="bookabook";
$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
mysql_select_db($dbname,$con);

if(isset($_POST['suu']))
{	
$gen=$_POST['names'];
$auth=$_POST['name1'];
$uuid=$_POST['idss'];
echo $gen.$auth.$uuid;
$genreadd="INSERT INTO `genre_cnt` (`uid`, `genre`,`gen_cnt`) VALUES ('$uuid','$gen','1')";
$authoradd="INSERT INTO `author_cnt` (`uid`, `author`,`auth_cnt`) VALUES ('$uuid','$auth','1')";
mysql_query($genreadd);
mysql_query($authoradd);
}
?>
	
	<!--slider -->
	    <script>
        //an image width in pixels 
        var imageWidth = 940;
    

        //DOM and all content is loaded 
        $(window).ready(function() {
            
            var currentImage = 0;

            //set image count 
            var allImages = $('#slideshow li img').length;
            
            //setup slideshow frame width
            $('#slideshow ul').width(allImages*imageWidth);

            //attach click event to slideshow buttons
            $('.slideshow-next').click(function(){
                
                //increase image counter
                currentImage++;
                //if we are at the end let set it to 0
                if(currentImage>=allImages) currentImage = 0;
                //calcualte and set position
                setFramePosition(currentImage);

            });

            $('.slideshow-prev').click(function(){
                
                //decrease image counter
                currentImage--;
                //if we are at the end let set it to 0
                if(currentImage<0) currentImage = allImages-1;
                //calcualte and set position
                setFramePosition(currentImage);

            });
           
        });

        //calculate the slideshow frame position and animate it to the new position
        function setFramePosition(pos){
            
            //calculate position
            var px = imageWidth*pos*-1;
            //set ul left position
            $('#slideshow ul').animate({
                left:px
            },500);
        }

    </script>
	
	<div style="width: 940px; margin:0 auto;margin-bottom: 20px;">
		
    <div id="slideshow">
       <a class="slideshow-prev">&laquo;</a> 
       <ul>
            <li><?php
			echo $this->Html->image('top_img.jpg',
					array('width'=>'940','height'=>'356'));
			?></li>
            <li><?php
			echo $this->Html->image('top_img1.jpg',
					array('width'=>'940','height'=>'356'));
			?></li>
            <li><?php
			echo $this->Html->image('top_img2.jpg',
			array('width'=>'940','height'=>'356'));
			?></li>
       </ul>
        <a  class="slideshow-next">&raquo;</a> 

    </div>
			
	</div>
	
	<span>LATEST PRODUCTS</span>
	
	<div><img src="img/menubar.png" border="0" height="3" width="155"></div>     
	<div style="overflow:hidden;height:auto;padding-bottom:20px;margin-top:20px">
		<ul class="product_list">
			<?php foreach ($books as $book): ?>
				
				<li>
					<?php echo $this->Html->link(
						$this->Html->image($book['Book']['cover_pic'],
						array('height' => '150','width' => '90','border' => '0')),
						array('action' => 'view',$book['Book']['id']),
						array('escape' => false)
					);
					?>
					<br>
					<span class="product_name">
						<b>
						<?php echo $this->Html->link($book['Book']['name'],
						array('action' => 'view',$book['Book']['id'])); ?>
						</b>
					</span>
					<br>
							<span style="font-size:12px;color:#350;"><i>
							<?php echo $book['Book']['author']; ?></i></span><br>
						<span class="product_price">
							<b>Rent:</b>
							<?php echo $book['Book']['rent_prices']; ?>
						</span>
				</li>
	  
		  <?php endforeach; 
		  	
		  ?>
		</ul>
	</div>
  
	<?php if($logged_in): 
	
	$u=$current_user['id'];
	echo $u;
	?>
	<script>
	alert("ffff");
	
		$(document).ready(function(){
			alert("hjvhj");
		var uid1= <?php echo $u?>;
		alert(uid1);
		var uid = "uid="+uid1;
			$.ajax({
				type : "POST",
				url : "http://localhost/book-a-book/app/webroot/files/recoo.php",
				data: uid,
				beforeSend: function(){},
				success : function(html){
					$("#recbygenre").html(html);
					
				},
				error: function(){
					alert("something went wrong");
				},
				complete : function(){
					
				}
				
			});
		});
		
		</script>
	<span>Recommendation</span>
	<div><img src="img/menubar.png" border="0" height="3" width="155"></div>     
	
	<div id="recbygenre" style="overflow:hidden;height:auto;padding-bottom:20px;margin-top:20px">
		
	</div>
	<?php
	endif;
	?>