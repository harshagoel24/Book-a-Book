<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookabook";

$con=mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);
if(isset($_POST['names']))
{
$name=trim($_POST['names']);
$query2=mysql_query("SELECT DISTINCT(name) FROM categories WHERE name LIKE '%$name%'");
echo "<ul>";
while($query3=mysql_fetch_array($query2))
{
?>

<li onclick='fill1("<?php echo $query3['name'];?>")'><?php echo $query3['name'];?></li>
<?php
}
}
?>
</ul>
