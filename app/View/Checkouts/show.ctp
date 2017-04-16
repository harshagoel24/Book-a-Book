<style>
	.checkout{
	
	width:85%;
	background: #FFF none repeat scroll 0% 0%;
	margin: 0px auto;
	list-style: outside none none;
	margin-top:30px;
	
	}
	.checkout li{
	margin: 0px;
	padding: 0px;
	
	}
	.firstli{
	display: block;
	padding: 10px 5px;
	background: #F9F8F9 none repeat scroll 0% 0%;
	border-bottom: 1px solid #333;
	}
	.tick{
		 
    position: relative;
    display: inline-block;
	width: 1%;
	padding: 6px 15px 6px 12px;
	margin: 0px 10px 10px -14px;
	color: #FFF;
	background-color: #16B594;
	color: #FFF;
	border-width: 0px 0px 1px 1px;
	border-style: solid;
	border-color: #666 #666;

	}
	
	.firstli_h3{
	width: 25%;
	font-family: arial,tahoma,verdana,sans-serif;
	font-weight: normal;
	margin:0;
	padding:0;
	margin-top: 10px;
	display: inline-block;
letter-spacing: normal;
word-spacing: normal;
vertical-align: top;
text-rendering: auto;
	}
	.firstli_h3 span{
	text-transform: uppercase;
	font-weight:bold;
	}
	.email_id{
	font-family: arial,tahoma,verdana,sans-serif;
	font-size: 19px;
	display: inline-block;
letter-spacing: normal;
word-spacing: normal;
vertical-align: top;
text-rendering: auto;
margin-top: 5px;
color: #565656;
margin-left:30px;
	}
	.phno{
	margin-top:11px;
	display: inline-block;
	color: #565656;
	margin-left:10px;
	letter-spacing:0.5px;
	}
	.address1{
	color: #565656;
	margin-left:275px;
	letter-spacing:0px;
	
	}
	.greenbar{
    width: 96%;
    padding: 11px 20px 15px 25px;
    margin: 0 10px 10px -7px;
    color: #fff;
    background-color: #16b594;
	}
	#linbut{
	margin-top:-25px;
	margin-right:0px;
	width:110px;
	height:30px;
	text-align:center;
	border-radius:4px;
	border:1px solid sienna;
	font-size:14px;
	float:right;
	color:#fff;
	background-color: #ee3a39;
	}
</style>
<?php 	

		$dbhostname="localhost";
		$dbuname="root";
		$dbpwd="";
		$dbname="bookabook";
		$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
		mysql_select_db($dbname,$con);
		$summ=0;
		$ids = $current_user['id'];
		$sql1 = "select * from `carts` where users_id ='$ids'";
		$res=mysql_query($sql1);
		$num=mysql_num_rows($res);
		
		if($num>0)
		{
			while($row=mysql_fetch_assoc($res)){
			$bid=$row['books_id'];
			$cartId=$row['id'];
			$res1=mysql_query("select * from `books` where id ='$bid'");
			$row1=mysql_fetch_assoc($res1);
			$summ=$summ + $row1['rent_prices'];
			}
		}
		else {
			$summ=0;
		}
		$email=$current_user['email_id']; 
		$phn=$current_user['phn_no']; 
		$name=$current_user['username'];
		$address=$current_user['address'];
			
		
?>
<ul class="checkout">
	<li>
		<div class="firstli">
			<span class="tick">?</span>
			<h3 class="firstli_h3"><span>1. Login ID </span></h3>
			<span class="email_id"><?php echo $email; ?></span>
		</div>
	</li>
	<li>
		<div class="firstli">
			<span class="tick">?</span>
			<h3 class="firstli_h3"><span>2. Delivery Address </span></h3>
			
			<span class="email_id"><?php echo $name; ?></span>
			<span class="phno"><?php echo $phn; ?></span>
			<br>
			<span class="address1">
			<?php echo $address; ?>
			</span>
		</div>
	
	</li>
	<li>
		<div  class="firstli">
			<span class="tick">?</span>
			<h3 class="firstli_h3"><span>3. Order Summary </span></h3>
			<span class="email_id"><?php echo $num; ?> Item(s) Total  Rs.<?php echo $summ; ?></span>
		</div>
	</li> 
	<li><div style="padding:0px;padding-bottom:15px;" class="firstli">
		<div class="greenbar">
			<h3 class="firstli_h3"><span>4. payment </span></h3>
		</div>
		<span style="font-size:15px" class="email_id">Cash ON Delivery(COD)</span>
			<?php echo $this->Html->link('CHECKOUT',array('controller'=>'checkouts','action' => 'invoice'),
			array('style'=>'float:right;padding:5px;background-color:#ee3a39;color:#fff;'));?>
		</div>
	</li>
</ul>