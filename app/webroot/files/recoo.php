<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookabook";
$nn=$_POST['uid'];
include_once('simple_html_dom.php');
$con=mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);
//$uid=1;//*******************************GIVE UID HERE*******************************
function get_fb_books()
{
$uid=$_POST['uid'];    //************************************** GIVE UID HERE********************************
$sql1 = "SELECT facebook_books from `users` WHERE id='$uid' AND facebook_books IS NOT NULL";
$result1=mysql_query($sql1);
echo mysql_num_rows($result1);
if(mysql_num_rows($result1)>0)
{
    echo "yes<br>";
$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
//echo $row1['book'];
$array= $row1['facebook_books'];
$arraybook= explode("," , "$array");
$html=new simple_html_dom();
$url='https://en.wikipedia.org/wiki/';

$genre=array();
$author=array();
$cnt=0;    
$sem=0;
foreach ($arraybook as $sad)
{
    echo $sad.'<br>';
$sad = str_replace(' ', '_', $sad);
$url2=$url.$sad;    
$html=file_get_html($url2);

foreach ($html->find('table.infobox tr')as $row)
{
    if($cnt==0)
    {
        }
		elseif($cnt>0)
        {
            $kuch=$row->plaintext;

            $here=explode(' ',$kuch,3);
            
            
            if($here[1]=='Author')
            {
                //echo "PAGAL_auth".'<br>';
                array_push($author,$here[2]);
                     }
            elseif($here[1]=='Genre' || $here[1]=='Subject')
            {
                if(!$sem)
                {//echo "PAGAL_gen".'<br>';
                array_push($genre,$here[2]);
                $sem++;
                }
                //echo $genre;
            }            
             
        }
        $cnt++;
        }
$sem=0;
}
//echo $author;
foreach($author as $auth)
{
	$sql3= "select * from author_cnt where uid='$uid' AND author='$auth'";
	$result3=mysql_query($sql3);
	if(mysql_num_rows($result3)>0)
	{
		$sql4="UPDATE author_cnt SET auth_cnt=auth_cnt+1 WHERE uid='$uid' AND author='$auth'";
		mysql_query($sql4);
	}
	else{
    $sql = "INSERT INTO author_cnt (uid,author,auth_cnt)
        VALUES ('$uid','$auth',1)";    
    mysql_query($sql);
	}
}

foreach($genre as $gen)
{
		$sql5= "select * from genre_cnt where uid='$uid' AND genre='$gen'";
	$result5=mysql_query($sql5);
	if(mysql_num_rows($result5)>0)
	{
		$sql6="UPDATE genre_cnt SET gen_cnt=gen_cnt+1 WHERE uid='$uid' AND genre='$gen'";
		mysql_query($sql6);
	}
	else{
    $sql1 = "INSERT INTO genre_cnt (uid,genre,gen_cnt)
        VALUES ('$uid','$gen',1)";    
mysql_query($sql1);
	}
}


}


}

function get_interest_books()
{  
    $uid=$_POST['uid'];
	echo "harsha";
    $result9 = mysql_query("select * from users where id='$uid'");
	$row9 = mysql_fetch_array($result9, MYSQL_ASSOC);
	$user_genre= $row9['interest_genre'];
	$user_author= $row9['interest_author'];
	$result11 = mysql_query("select * from books where author like '%$user_author%' order by rating DESC");
		while($row11 = mysql_fetch_array($result11, MYSQL_ASSOC))
	{
		
		echo $row11['name']." ";
		echo $row11['author']." ";
		echo $row11['id'].'<br>';
	}

}

function recommend_by_author()
{
	$uid=$_POST['uid'];
	$count=3;
echo "<h2>according to author </h2>";
echo "<br>";
$uid=1;
$result7=mysql_query("select * from author_cnt where uid='$uid' order by auth_cnt DESC");
/*$cnt_aut=0;
//
while($row7 = mysql_fetch_array($result7, MYSQL_ASSOC))
{
	$cnt_aut++;
}

$result7=mysql_query("select * from author_cnt where uid='$uid' order by auth_cnt DESC");
*/
while($row7 = mysql_fetch_array($result7, MYSQL_ASSOC) )
{
	$aut = $row7['author'];
	$aut1=explode(' ',$aut);
	
	//echo $aut1[0];
	$aut=$aut1[0]; 
	$aut='%'.$aut.'%';
	$result8 = mysql_query("select * from books where author like '$aut' order by name DESC");
	?>
	<ul class="product_list">
	<?php
	while($book = mysql_fetch_array($result8, MYSQL_ASSOC))
	{  
		$id=$book['id'];
		$url1="http://localhost/book-a-book/books/view/";
		$url=$url1.$id;

		?><li>
					
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
					
				</li><?php
	}
	?>
	</ul>
	<?php
	
}
}

function recommend_by_genre($uid)
{	//$uid=1;
	//$uid=$_POST['uid'];
	echo $uid;
		//$count=3;
echo "<br>";
		echo "<h2>according to genre </h2>";
echo "<br>";
$result_00=mysql_query("select genre from genre_cnt where uid='$uid' order by gen_cnt desc");

while($row_00 = mysql_fetch_array($result_00, MYSQL_ASSOC))
{
	//echo $row_00['genre'];
	$genre_temp=$row_00['genre'];
	$result_100=mysql_query("select id from categories where name='$genre_temp';");
	$row_11=mysql_fetch_array($result_100, MYSQL_ASSOC);
	$genre_temp_1=$row_11['id'];
	$result_101=mysql_query("select * from books where category_id='$genre_temp_1' order by rating");
	
	?>
	<ul class="product_list">
	<?php
	while($book = mysql_fetch_array($result_101, MYSQL_ASSOC))
	

	{  
		$id=$book['id'];
		$url1="http://localhost/book-a-book/books/view/";
		$url=$url1.$id;

		?><li>
					
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
					
				</li><?php
	}
?> </ul><?php
}
}


recommend_by_author();
recommend_by_genre($nn);


?>



















