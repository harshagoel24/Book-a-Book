<?php 

echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
	
?>
<script>
	$(document).ready
		(
		function()
		{	
						
			$("#cross").click(function(){
			
				$("#lay").hide();
				$("#popup").hide();
			
			});
			
		
			$("#butt4").click(function(){
				var idss=$("#popup").attr("id");
				//alert(idss);
				$("#lay").show();
				$("#popup").show();
				var winwidth = $(window).width();
				var left=(winwidth/2)-180;
				$("#popup").css("left",left);		
				
			});
		});
</script>

<style>
	.my_details{
		overflow:hidden;
		height:2%;
		height:auto;
		width:90%;
		margin:20px auto;
	}
	.left_edit{
		border-right: 1px solid #F2F2F2;
		width:25%;
		float:left;
		height:200px;
	}
	.right_details{
		margin-left:10px;
		width:70%;
		float:right;
	}
	.detail_uls{
		
	}
	.detail_uls li{
		
		padding:10px;
		margin-bottom:10px;
	}
	.a2{
		border-radius:5px;
		padding:5px;
		background:#F2F2F2 none repeat scroll 0% 0%;
		
	}
	
	.my_sold{	
		border-top: 1px solid #F2F2F2;
		width:85%;
		margin:20px auto;
		padding-top:30px;
	}
	.editform{
		width:100%;
	}
	

		
		
		#popup{
		width:360px;
		height:400px;
		background-color:#fff;
		position:fixed;
		left:0px;
		top: 110px;
		display:none;
		z-index:999;
		padding:10px;
		border-radius:10px;
		}
		
	</style>	
		
	
	<div id="popup">
		<button style="float:right;color:#FFF;background-color:red;opacity:0.9;" id="cross">[X]</button>
		<div style="width:375px;margin:0 auto;">
			<h2 style="margin:35px 0 20px 135px;color:#000;">
			<i>Edit Details</i></h2>
			<ul id="su">
			<?php
			$phn=$user['User']['phn_no'];
			$address=$user['User']['address'];
			echo $this->Form->create('User');
			echo '<li>';
			echo $this->Form->input('phn_no',array('class'=>'inp','value'=>$phn));
			echo '</li>';
			echo '<li>';
			echo $this->Form->input('address',
			array('type'=>'textarea','value'=>$address,'class'=>'inp','maxlength'=>'255','cols'=>'30','rows'=>'6','style'=>
			'padding:5px;width: 306px; height: 60px;'));
			echo '</li>';
			echo '<li>';
			echo $this->Form->end('Edit',array('id'=>'subut'));
			echo '</li>';
			?>

			</ul>
		</div>
	</div>


	
		
		
	<div class="my_details">
		<div class="left_edit">
			<ul class="detail_uls" style="margin-top:5px;font-weight: bold;">
				<li>
						<a id="butt4" class = "a1 a2" style="margin-bottom: 20px;">Edit Details</a>
				</li>
				
				<li>
				<?php echo $this->Html->link('Add a Book',array('controller' => 'books','action'=>'add'),
							array('class' => 'a1 a2','style'=>'margin-bottom: 20px;'));	?>	
				</li>
				
				<li>
				<?php echo $this->Html->link('View Rent Cart',array('controller' => 'books','action'=>'viewcart'),
							array('class' => 'a1 a2','style'=>'margin-bottom: 20px;'));	?>	
				</li>
				
				<li>
				<?php echo $this->Html->link('Share Your Location',array('controller' => 'locations',
				'action'=>'mylocation'),
					array('class' => 'a1 a2','style'=>'margin-bottom:20px;'));?>
				</li>
				<br>
					</ul>
		</div>
		
		
		<div class="right_details">
						<div class="bookdetail" style="margin-top:5px;">
				<h4 >Personal Information</h4>
					<ul>
						<li><span style="padding-right:175px;margin-right:20px;">Username</span><?php echo $user['User']['username']; ?></li>
						<li><span style="padding-right:170px;margin-right:20px;">Phone Number</span><?php echo $user['User']['phn_no'];?></li>
						<li><span style="padding-right:175px;margin-right:20px;">Email Id</span><?php echo $user['User']['email_id']; ?></li>
						<li><span style="padding-right:102px;margin-right:20px;">Number of books rented</span>3</li>
						
					</ul>
				</div>
			</div>
		</div>	
		
		<div class="my_sold" >
			<span style='margin-left:10px;font-weight:bold'>Books Added By You</span>
			<div style='margin-left:10px;'><img src="img/menubar.png" border="0" height="3" width="155"></div>     
			<div style="height:1000px;padding-bottom:20px;margin-top:20px">
				<ul class="product_list" style="margin-left:40px;">
					<?php foreach ($books as $book): ?>
						
						<li>
							<?php echo 
								$this->Html->image($book['Book']['cover_pic'],
								array('height' => '150','width' => '90','border' => '0'));
								
							
							?>
							<br>
							<span class="product_name">
								<b>
								<?php echo $book['Book']['name'];
								 ?>
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
			  
				  <?php endforeach; ?>
				</ul>
			</div>
		</div>