<style>
abc li:hover{
	background-color:#868383
}
</style>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookabook";

$con=mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query2=mysql_query("SELECT * FROM books AS `Book` WHERE name LIKE '%$name%' GROUP BY `Book`.`name`");
?>

<ul id="abc" >
<?php
while($query3=mysql_fetch_array($query2))
{
?>

<li style="padding:3px;border-bottom:1px dashed #D3D3D3;" onclick='fillin("<?php echo $query3['name']; ?>")'><?php echo $query3['name']; ?></li>
<?php
}
}
?>
</ul>

