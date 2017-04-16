<?php
$dbhostname="localhost";
				$dbuname="root";
				$dbpwd="";
				$dbname="bookabook";
				$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
				mysql_select_db($dbname,$con);
				
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
if(!empty($_POST['name']))
{
$name=$_POST['name'];
$query3=mysql_query("SELECT * FROM books AS `Book` WHERE name LIKE '%$name%' GROUP BY `Book`.`name`");
?>
<ul class="product_list">
<?php while($book=mysql_fetch_array($query3))
{
	$id=$book['id'];
		$url1="http://localhost/book-a-book/books/view/";
		$url=$url1.$id;?>				
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
	
<?php
} ?>
</ul>
<?php
}
else
{
echo "No Results";
}
}
?>
