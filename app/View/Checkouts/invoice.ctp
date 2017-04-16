<?php
		$startdate = strtotime("Today");
$enddate = strtotime("+4 weeks",$startdate);
$date_of_issue=date("Y-m-d", $startdate);
$date_of_ret=date("Y-m-d", $enddate);
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
		if($num>0)
		{
		while($row=mysql_fetch_assoc($res)){
		$bid=$row['books_id'];
		$cartId=$row['id'];
		$res1=mysql_query("select * from `books` where id ='$bid'");
		$row1=mysql_fetch_assoc($res1);
		$uid=$row1['user_id'];
	
		$rp=$row1['rent_prices'];
		
		$sql5 = "INSERT INTO `rented_books` (`rented_price`, `date_of_ret`,
		`status`, `date_of_issue`, `user_id`, `book_id`,
		`renter_id`) VALUES ('$rp', '$date_of_ret','Rented', '$date_of_issue','$ids', '$bid', '$uid')";
	    mysql_query($sql5);
		
		$stat="Rented";
		$updaterent = "UPDATE `books` SET `is_rented` = 1 WHERE `id` = '$bid'";
		mysql_query($updaterent);
		}
		}


?>