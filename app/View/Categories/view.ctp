<?php
$dbhostname="localhost";
$dbuname="root";
$dbpwd="";
$dbname="bookabook";
$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
mysql_select_db($dbname,$con);
$ids=$category['Category']['id'];
$sql1 = "select * from `books` where category_id ='$ids'";
	$res=mysql_query($sql1);
	$num=mysql_num_rows($res);

?>

<div class="center_content">
		<div class="center_title_bar"><?php echo $category['Category']['name']; ?></div>						
		
		<?php 	if($num>0)
				{
				while($row=mysql_fetch_assoc($res)){
				
		?>
	  <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title"><?php echo $this->Html->link($row['name'],
                    array('controller'=>'books','action' => 'view',$row['id'])
                ); ?></div>
          <div class="product_img"><?php echo $this->Html->link(
					$this->Html->image($row['cover_pic'], array('height' => '170','width' => '165','border' => '0')),
					array('controller'=>'books','action' => 'view',$row['id']),
					array('escape' => false)
				);
			?></div>
          <div class="prod_price"><span class="reduce"> <?php echo h($row['mrp']); ?> </span><span class="price"><?php echo $row['rent_prices']; ?></span></div>
        </div>
        <div class="bottom_prod_box"></div>
		<?php }
				}
				else
			{echo "No Boooks In This Category";}
		?>
	  </div>
	  
	  
</div>