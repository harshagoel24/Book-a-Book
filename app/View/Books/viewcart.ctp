<?php
echo $this->Html->css('cart');
		
echo $this->fetch('css');
		

$dbhostname="localhost";
$dbuname="root";
$dbpwd="";
$dbname="bookabook";
$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
mysql_select_db($dbname,$con);
$ids = $current_user['id'];
$summ=0;
$sql1 = "select * from `carts` where users_id ='$ids'";
	$res=mysql_query($sql1);
	$num=mysql_num_rows($res);

?>
		<?php 
		if($num>0)
		{ ?>
		<div id="main_cart" style="overflow:hidden;height:auto;">
			<div class="cartpage-tabs">
				<div id="cartpage-cart-tab">
				Cart <span>(<?php echo $num;?>)</span> </div>  

			</div>
			<div id="cartpage-cart-tab-content" class="cartpage-tab-content cp-tab-content">
				<table class="cart-table" cellpadding="0" cellspacing="0" width="100%">
					<thead class="cart-head">
						<tr>
						<td class="product-info head-cell" style="padding-top:2px;" colspan="2"> 
							<table cellpadding="0" cellspacing="0" width="100%">
							<tbody>
									<tr>
										<td class="image-cell"></td> 
										<td class="item-cell"><span class="lpadding10">Item</span></td> 
									</tr> 
							</tbody>
							</table> 
						</td>
						
						<td class="price-cell head-cell lborder">Price</td> 
						<td class="head-cell delivery-cell lborder">Delivery Details</td> 
						<td class="head-cell subtotal-cell lborder">Subtotal</td> 
						</tr> 
					</thead>
					<tbody class="cart-body"> 
		
		<?php
		while($row=mysql_fetch_assoc($res)){
		$bid=$row['books_id'];
		$cartId=$row['id'];
		$res1=mysql_query("select * from `books` where id ='$bid'");
		$row1=mysql_fetch_assoc($res1);
		$uid=$row1['user_id'];
		$res2=mysql_query("select * from `users` where id ='$uid'");
		$row2=mysql_fetch_assoc($res2);
		
		?>            
		<tr class="item-row" style="border-bottom: 1px solid #B9B9B9;"> 
			<td colspan="2" class="product-info fk-position-relative">
				<table cellpadding="0" cellspacing="0" height="100%" width="100%">
					<tbody>
							
						<tr> 
						<td class="cell image-cell"> 
						<div class="carty-image fk-text-center fk-position-relative"> 
						<a href="" class="img-link"> 
						<img 
						src="<?php echo $row1['cover_pic'];?>" 
						class="product-image" alt="Rogue Lawyer (English)"> </a> </div> 
						</td> 
						<td class="cell item-cell ">
						<span class="title fk-font-14"><?php echo $row1['name'];?></span>
						<p class="fk-font-11 font-color-medium"><?php echo $row1['author'];?></p>
						<div class="line tmargin5 fk-font-12">
						Seller: <span class="fk-bold"><?php echo $row2['username'];?></span> 
					
						</div> 
						</td>
					</tr> 
					<tr>
						<td colspan="2" class="product-action fk-font-11"> 
						<div class="unit fk-uppercase fk-italic return-policy"> 
						<span class="tick fk-inline-block"></span> 
						<span class="applicable-policy">30 Days Replacement</span>
						<a class="detail fk-replace-policy data-policy-type 30_day_replacement
						 applicable-policy" style="margin-right:180px;">?</a> 
						<a class="cart-remove-item fk-inline-block fk-uppercase" title="Remove Item">
							<?php
												echo $this->Html->link(
												'Remove',
												array('controller'=>'carts','action' => 'delete',$cartId),
												array('confirm' => 'Are you sure?')
													);
												?>
						</a>
						</div>
						<div class="unitExt tmargin2"> 
						
						</div> 
						</td> 
					</tr> 
					</tbody>
					</table>
					</td> 
					<td class="cell price-cell lborder"> 
					<div class="carty-price line">
					<!-- Printing all delivery details here --> 
					<div class=" fk-font-14 price">Rs. <?php 
					$summ=$summ + $row1['rent_prices'];
					echo $row1['rent_prices'];?></div>
					</div> 
					</td> 
					<td class="cell delivery-cell lborder">
					<div class="fk-fontlight"> <strong class="fk-font-14 offer-color">Free</strong> </div>
					<p class="fk-font-11 fk-fontlight tmargin5">Delivered in 2-3 business days.</p>
					</td> 
					<td class="cell subtotal-cell fk-font-14 fk-bold price lborder">
					<?php echo $row1['rent_prices'];?>
					</td>
					</tr>


						
		<?php
			}
			?>
				
				</tbody>
				</table>
				</div>
			</div>
			<div>
			
			<span style="float:right;margin-right:30px;margin-top:20px;">TOTAL AMOUNT:<?php echo $summ; ?></span>
			<span>
			<br>
			<span style="margin-top:50px;">
			<?php echo $this->Html->link('CHECKOUT',array('controller'=>'checkouts','action' => 'show'),
			array('style'=>'float:right;padding:5px;background-color:#ee3a39;color:#fff;'));?>
			</span>
			
			</span>
			</div>
				
				<?php }
					else
					{echo "No Books in Cart";}

			?>			
			
			
			