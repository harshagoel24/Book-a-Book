<?php
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
?>	
	<div class="filter">
					<form name="frm_filter" id="frm_filter" method="post" action="">
			<div class="spangenrecls">
			<h3> Genre </h3>
			<br>
			<?php include 'categories/genre.php';  ?>
			<br>
			</div>

			<div>
			<h3> Author </h3>
			<br>
			<?php include 'categories/author.php';  ?>
			<br>
			</div>
			<!--<input type="radio" name="sort" value="0" >Popular</input>
				<input type="radio" name="sort" value="1" >High Price</input>
				<input type="radio" name="sort" value="2" >Low Price</input>
			</form>	-->	
	</div>
	
	<div class="products_view">
		<div class="sort_by">
			<ul class="sort_by_ul">
			<form method="post" action="">
				
				<li><input type="radio" name="sort" value="1" >High Price</input></li>
				<li><input type="radio" name="sort" value="2" >Low Price</input></li>
			</form>
			</ul>
		</div>  
		<br></br>
	<div id="productContainer" style="height:auto;padding-bottom:20px;margin-top:20px">
		<br>
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
	  
		  <?php endforeach; ?>
		</ul>
	</div>
	</div>	
	<?php include 'filter.php';?>