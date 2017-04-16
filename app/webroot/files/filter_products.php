<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();

$genrecheck = $_REQUEST['genrecheck'];
$authorcheck = $_REQUEST['authorcheck'];
//$authorcheck="chetan bhagat";
//$ccheck = $_REQUEST['ccheck'];
$price_range = $_REQUEST['price_range'];
$sort = $_REQUEST['sort'];
if($sort == 1){
	$order="DESC";
}else if($sort == 2){
	$order="ASC";
}

$WHERE = array(); $inner = $w = '';

if(!empty($price_range)) {
	$data3 = explode('-',$price_range);
	$WHERE[] = "(books.rent_prices between $data3[0] and $data3[1])";
}

if(!empty($genrecheck)) {		
	if(strstr($genrecheck,',')) {
		$data1 = explode(',',$genrecheck);
		$garray = array();
		foreach($data1 as $c) {
			$garray[] = "category_id = $c";
		}
		$WHERE[] = '('.implode(' OR ',$garray).')';
	
	} else {
		$WHERE[] = '(category_id = \''.$genrecheck.'\')';
	}
	
	
}

/*if(!empty($ccheck)) {
	if(strstr($ccheck,',')) {
		$data2 = explode(',',$ccheck);
		$carray = array();
		foreach($data2 as $c) {
			$carray[] = "t1.Color = $c";
		}
		$WHERE[] = '('.implode(' OR ',$carray).')';
	} else {
		$WHERE[] = '(t1.Color = '.$ccheck.')';
	}
}
*/
if(!empty($authorcheck)) {
	if(strstr($authorcheck,',')) {
		$data3 = explode(',',$authorcheck);
		$aarray = array();
		foreach($data3 as $c) {
			$aarray[] = "author = '$c'";
		}
		$WHERE[] = '('.implode(' OR ',$aarray).')';
	} else {
		$WHERE[] = '(author = \''.$authorcheck.'\')';
	}
	
	//$inner = 'INNER JOIN tbl_productsizes AS t2 ON t1.ProductID = t2.ProductID';
}
//echo $WHERE[1];
	$w = implode(' AND ',$WHERE);
	echo "<br>";
	
	if(!empty($w)) $w = 'where '.$w;
	//echo $w;
	//$w1 = "where genre='romance'";
	//echo "SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w";
	//$query = mysql_query("SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w");
	//$sql= "SELECT * FROM  `book` $w ";
	//echo $sql;
	//$query = mysql_query($sql);
	$query = mysql_query("SELECT `Book`.`name`, `Book`.`author`, `Book`.`mrp`, `Book`.`short_des`, `Book`.`summary`, `Book`.`rent_prices`, `Book`.`times_rented`, `Book`.`isbn`, `Book`.`cover_pic`, `Book`.`user_id`,
	`Book`.`id`, `Book`.`category_id` FROM `bookabook`.`books` AS `Book` $w  GROUP BY `Book`.`name` order by rent_prices $order");
	//$query = mysql_query("SELECT *  FROM  `book` where author='chetan bhagat'");
	//echo $query;
	//echo mysql_num_rows($query);
	
	
	if(mysql_num_rows($query)>0) {	?>
		<ul class="product_list">
	<?php	while($book = mysql_fetch_assoc($query)) {
		//	$productPhoto = $db->getproductPhoto($pro['ProductID']);
		$id=$book['id'];
		$url1="http://localhost/book-a-book/books/view/";
		$url=$url1.$id;
		?>
		
		<!------------------------------------------------------------------------------------------------------------------------------------------------->	
				<li>
					
					<a  href="<?php echo $url; ?>" class="product_imagelink">
							<img  src="<?php echo $book['cover_pic']?>" height="150px" width="90px"  title="<?php echo $book['name'];?>" class="product_image"></img>
						</a>
						<br>
						<span class="product_name">
						<a href="<?php echo $url; ?>"><b><?php echo $book['name'];?></b></a></span><br>
							<span style="font-size:12px;color:#350;"><i>by <?php echo $book['author']; ?></i></span><br>
						<span class="product_price">
							<b>Rent:</b><?php echo $book['rent_prices'];?> 
						</span>
					
				</li>
	

		<!------------------------------------------------------------------------------------------------------------------------------------------------->
		
			
		<?php
		}
			?>
		</ul>
	<?php
	
		}
	
	else {
		?>
        <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No Results with this filter</h2></div>
        <?php	
	}
?>