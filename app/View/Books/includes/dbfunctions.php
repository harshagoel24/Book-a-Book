<?php

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPWD","");
define("DB","bookabook");


class DB_FUNCTIONS {
 
	public function __construct() {
		$conn = mysql_connect(DBHOST,DBUSER,DBPWD);
		$db_select = mysql_select_db(DB,$conn);		
	}
 
 /*	
	public function getResults($table) 
	{
	    $data = array();
		$query = mysql_query("SELECT * FROM $table") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if($num_rows>0) {
        	while($row=mysql_fetch_assoc($query))
				$data[]=$row;
		}
	    return $data;		
    }
	
	public function allProducts()
	{
		$query = mysql_query("SELECT * FROM book");	
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
	public function getproductPhoto($id)
	{
		$photo = mysql_result(mysql_query("SELECT photo FROM tbl_productphotos where ProductID = $id limit 0,1"),0);	
				
		return $photo;
	}
	
	public function _getAllProductPhotos($id)
	{
		$photo = mysql_query("SELECT photo FROM tbl_productphotos where ProductID = $id limit 0,5");	
		while($row=mysql_fetch_assoc($photo))
		$data[]=$row;	
		
		return $data;
	}
	
	    Undefined variable: data [APP\View\Books\includes\dbfunctions.php, line 59]

    Warning (2): Invalid argument supplied for foreach() [APP\View\Books\categories\author.php, line 5]





	
	public function getProductDetails($id)
	{
		$query = mysql_query("SELECT * FROM tbl_products where ProductID = $id");	
		while($row=mysql_fetch_assoc($query))
		$data=$row;
		
		return $data;
	
	}
	*/
	
	public function getAuthor()
	{
		$query = mysql_query("SELECT DISTINCT(author) from books");
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
	public function getGenre()
	{
		$query = mysql_query("SELECT DISTINCT(category_id) from books");
		while($row=mysql_fetch_assoc($query))
		$data[]=$row;
		
		return $data;
	}
	
}
?>