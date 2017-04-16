<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookabook";

$con=mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);
if(isset($_POST['name1']))
{
$name=trim($_POST['name1']);

$query2=mysql_query("SELECT DISTINCT(author) FROM books WHERE author LIKE '%$name%'");
echo "<ul>";
while($query3=mysql_fetch_array($query2))
{
?>

<li onclick='fill("<?php echo $query3['author']; ?>")'><?php echo $query3['author']; ?></li>
<?php
}
}
?>
</ul>