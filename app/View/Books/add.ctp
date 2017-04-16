<div class="center_content">
	<div class="prod_box_big">
      
		<div class="center_prod_box_big">
		<div>
		<h2 style="margin:0;padding-left:20px;margin-top:30px;color:#000;"><i>Add a Book</i></h2>
		<form method="post">
			<ul id="su">
			<li><input type="text" class="inp" placeholder="Book Name" name="nam"></input></li>
			<li><input type="text" class="inp" placeholder="Book's MRP"  name="mrps" ></input></li>
			<li><input type="text" class="inp" placeholder="Book's Rent Price"  name="rent_price" ></input></li>
			<li><input type="submit" name="sub" value="Add Book"></input></li>
			</ul>
		</form>
		</div>
		</div>
		</div>
</div>

<?php




if(isset($_POST['sub'])){
	$urlname=$_POST['nam'];
	$mrp=$_POST['mrps'];
	$rent=$_POST['rent_price'];
	$sel=$current_user['id'];
include_once('simple_html_dom.php');	
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookabook";

$con=mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$con);
//echo "Connected to Localhost!".'<br>';

function rem_prp($arg) {    
    $cnt=0;
    $arg_arr=explode(' ',$arg);
    $arr = array("of", "and", "for","in","a");
    foreach($arg_arr as $new)
    {
        if(in_array($new,$arr))
        {
            $arg_arr[$cnt]=$new;
        }
        else
        {
            $new=ucwords($new);
            $arg_arr[$cnt]=$new;          
           //$url1 = str_replace(' ', '_', $url1);
        }
        $cnt++;
        }
    $arg=implode(" ",$arg_arr);
    return($arg);
   }

$html=new simple_html_dom();

$url='https://en.wikipedia.org/wiki/';
$url1=$urlname;                      //!!!!!  ENTER NAME OF BOOK HERE  !!!!!!


//echo $name;
$url1=rem_prp($url1);
$name=$url1;
$url1 = str_replace(' ', '_', $name);
$url2=$url.$url1;
//echo $url2;
$html=file_get_html($url2);
$cnt=0;
$for_img=$html;
$isbn=0;
//$genre=10;
foreach ($html->find('table.infobox tr')as $row)
{
	if($cnt==0)
	{
		
		
		
      }
		
		elseif($cnt>0)
		{
			
			//$pl=$row->plaintext;
			$kuch=$row->plaintext;

            $here=explode(' ',$kuch,3);
			
//		    echo "this[".$here[1]."]=>".$here[2].'<br>';
			//echo "this[2]=>".$here[2].'<br>';
			
			
			if($here[1]=='Author')
			{
				$author=$here[2];
			    	 }
			
			
			
			elseif($here[1]=='ISBN')
			{
				$isbn=$here[2];
					 }
					 
			elseif($here[1]=='Genre' || $here[1]=='Subject')
			{
				$genre=$here[2];
				//echo $genre;
			}			
			 
		}
		
		
		$cnt++;
		
		
}
$cnt=0;

$html=file_get_html($url2);

foreach($html->find('p') as $para)
{
	$n_word=str_word_count($para->plaintext);
	
	if($n_word>10 && $cnt==0)
	{
		$cnt++;
		$short=$para->plaintext;
	}
	
	elseif($n_word>10 && $cnt==1)
	{
		$cnt++;
		$summ=$para->plaintext;
	
     }
	}

$summ = str_replace("'"," ",$summ);
$short = str_replace("'"," ",$short);

$html=file_get_html($url2);

foreach($html->find('img')as $img)
{
	$kill=$img->src;
	if (preg_match('/(\.jpg)$/i', $kill))
		{
		$killer=$kill;
		$jj=".jpg";
      } 
	elseif (preg_match('/(\.jpeg)$/i', $kill))
		{
		$killer=$kill;
		$jj=".jpeg";
      }
 	}

$bas="https:";
$killer=$bas.$killer;
$img_name= "img/".$name.$jj;
copy($killer, $img_name);

$gen = explode(' ',$genre);
$cid=0;



foreach($gen as $var)
{
if($cid==0)
{	
$var="%".$var."%";

$sql1="Select id from categories where name like '$var'";
$result=mysql_query($sql1);
$row=mysql_fetch_assoc($result);	
$cid=$row['id'];
}

}





$sql = "INSERT INTO Books (name,author,isbn,short_des,summary,user_id,cover_pic,category_id,mrp,rent_prices)
        VALUES ('$name','$author','$isbn','$short','$summ','$sel','$killer','$cid','$mrp','$rent')";	

if(mysql_query($sql))
echo $name." added successfully to database";
$nul=" ";
$user_check = "select * from `books` where user_id ='$sel'";
$quer_user=mysql_query($user_check);
$n=mysql_num_rows($quer_user);
if($n > 0){
	$sqlupd = "UPDATE `bookabook`.`users` SET `is_seller` = '1' WHERE `users`.`id` = '$sel'";
	mysql_query($sqlupd);
}else if($n == 0){	
	$sqlupd = "UPDATE `bookabook`.`users` SET `is_seller` = '0' WHERE `users`.`id` = '$sel'";
	mysql_query($sqlupd);
}

$html->clear(); 
unset($html);

}

?>
