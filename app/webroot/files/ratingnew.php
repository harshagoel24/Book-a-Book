<?php
 error_reporting(E_ALL ^ E_DEPRECATED);
/*
 *  Simple Rating System using CSS, JQuery, AJAX, PHP, MySQL
 *  Downloaded from Devzone.co.in
 */
$bookid= $_POST['bookid']; 
$userid = $_POST['userid']; // here I am taking IP as UniqueID but you can have user_id from Database or SESSION
$review= $_POST['review'];
$servername = "localhost"; // Server details
$username = "root";
$password = "";
$dbname = "bookabook";
 
$con=mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);



 
if (isset($_POST['rate']) && !empty($_POST['rate'])) {
 
    $rate = mysql_real_escape_string($_POST['rate']);
// check if user has already rated
    $sql = "SELECT * FROM `rating` WHERE `user_id`= '$userid' AND `book_id` = '$bookid'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $sql4 = "UPDATE `rating` SET `rate` = '$rate'  WHERE `user_id`= '$userid' AND `book_id` = '$bookid'";
		mysql_query($sql4);
    } else {
 
        $sql8 = "INSERT INTO `rating` ( `rate`, `user_id`, `book_id`) VALUES ('$rate', '$userid','$bookid')";
        mysql_query($sql8);
    }
	
	$sql6="select sum(rate) AS sume, count(rate) AS counte from rating where `book_id` = '$bookid'";
	$result6 = mysql_query($sql6);
    $row6= mysql_fetch_array($result6, MYSQL_ASSOC);
	$sum = $row6['sume'];
	$count = $row6['counte'];
	$rating = $sum/$count;
	$sql7 = "UPDATE `books` SET `rating` = '$rating'  WHERE `id` = '$bookid'";
	mysql_query($sql7);
}


?>