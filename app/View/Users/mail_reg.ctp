<?php
	echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
?>
<?php 
$dbhostname="localhost";
$dbuname="root";
$dbpwd="";
$dbname="bookabook";
$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
mysql_select_db($dbname,$con);
$quer="select * from `users` where `id`='$nam'";
$querexec=mysql_query($quer);
$row=mysql_fetch_assoc($querexec);

$mail_id=$row['email_id'];
$name=$row['username'];
/**
 * This example shows making an SMTP connection with authentication.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that

date_default_timezone_set('Etc/UTC');
require 'PHP/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';             //********************************
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "minorproject3052@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "bush3052";
//Set who the message is to be sent from
$mail->setFrom('minorproject3052@gmail.com', 'BOOKaBOOK');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($mail_id,$name);  /////////   GIVE [TO] EMAIL ADDRESS HERE****************
//Set the subject line
$mail->SMTPSecure = 'tls'; 
$mail->Subject = 'REGISTRATION SUCCESSFUL @ BOOKaBOOK';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = 'CONGRATULATIONS<br>Your Registration to this Site, Book a Book has been successful...';

//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'CONGRATULATIONS Your Registration to this Site, Book a Book has been successful...';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
ob_end_clean();

echo "mail Sent";
	
 ?>
 

	<script type="text/javascript">
function fill1(Value)
{
$('#names').val(Value);
$('#display2').hide();
}

	
function fill(Value)
{
$('#name1').val(Value);
$('#display1').hide();
}



$(document).ready(function(){
	

	$("#names").keyup(function(){
	
var names = $('#names').val();
if(names=="")
{
$("#display2").html("");
}
else
{
$.ajax({
type: "POST",
url: "http://localhost/book-a-book/app/webroot/files/interestajax.php",
data: "names="+names,
success: function(html){
$("#display2").html(html).show();
}
});
}
});
	

	$("#name1").keyup(function(){
		
var name1 = $('#name1').val();
if(name1=="")
{
$("#display1").html("");
}
else
{
$.ajax({
type: "POST",
url: "http://localhost/book-a-book/app/webroot/files/interestajax1.php",
data: "name1="+name1,
success: function(html){
$("#display1").html(html).show();
}
});
}
});
});
</script>
	


<?php
$val='';
if(isset($_POST['submit']))
{
if(!empty($_POST['name']))
{
$val=$_POST['name'];
}
else
{
$val='';
}
}
$val1='';
if(isset($_POST['submit']))
{
if(!empty($_POST['name1']))
{
$val1=$_POST['name1'];
}
else
{
$val1='';
}
}
?>
<form method="post" action="http://localhost/book-a-book/books/index">

<div id="search">Favorite Genre : <input type="text" name="names" id="names" autocomplete="off"
value="<?php echo $val;?>"></input>
<div id="display2"></div></div>
<div>Favorite Author : <input type="text" name="name1" id="name1" autocomplete="off"
value="<?php echo $val1;?>"></input>
<div id="display1"></div></div>
<input type="hidden" name="idss" value="<?php echo $nam;?>"></input>
<input type="submit" name="suu" id="submit" value="submit"> </input>


</form>


 
 
 