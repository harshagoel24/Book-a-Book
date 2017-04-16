<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>


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
?>


<!DOCTYPE html>
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<?php echo $this->Html->charset(); ?>
<title>Book-a-book:
<?php echo $this->fetch('title'); ?>
</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<!-- <link rel="stylesheet" type="text/css" href="stylebook.css" media="all" /> 
 <link rel="stylesheet" type="text/css" href="style.css" /> -->
<script type="text/javascript" src="js/boxOver.js"></script>
<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('css');
		
		echo $this->fetch('meta');
		echo $this->Html->css('stylebook');
		
		echo $this->fetch('css');
		echo $this->fetch('script');
?>
<style>
#loglot a{
	color:#FFF;
	
}
</style>
</head>

<body>

<div id="lay"></div>

	<div id="container">
		<div id="lastmenuwrapper" style="background-color:#000;height:40px;margin-bottom:40px;width:100%;position:fixed;z-index:999">
			<div id="lastmenu" style="width:980px;height:50px;margin:0 auto;">
					<div id="loglot" style="color:#FFF;width:300px;float:left;padding:7px">
					<?php if($logged_in): ?>
				WELCOME<span style="margin-left:10px;margin-right:10px"><?php echo $current_user['username'];?></span><?php echo $this->Html->link(
				'LOGOUT',array('controller' => 'users','action'=> 'logout'),array('style'=>'color:#FFF')); ?>
					
				<?php else: ?>
				
				<?php echo $this->Html->link('LOGIN',array('controller' => 'users','action' => 'login'),
				array('style'=>'color:#FFF')); ?>
				<?php echo $this->Html->link('REGISTER',array('controller' => 'users','action' => 'add')
				,array('style'=>'color:#FFF;margin-left:15px')); ?>
				
				<?php
				endif;?>	
					</div>
					<div style="float:right;width:405px;margin-top:3px;">
					<form method="post" action="http://localhost/book-a-book/books/searching">
					<input style="padding:5px;width:300px;;" type="text" name="name" placeholder="Search Books" id="name" autocomplete="off"
					value="<?php echo $val;?>">
					<input type="submit" name="submit" style="" id="submit" value="Search">
					</form>
					<div id="display" style="background-color:#FFF;position:absolute;z-index:9999;width:310px" ></div>
					</div>
			
			
			</div>
		</div>
		<div id="header">
			<?php //echo $this->Session->flash();?>
			<div id="header_left">
			<?php	echo $this->Html->link(
					$this->Html->image('logo_11.png',
					array('width'=>'296','height'=>'125')),
					array('controller' => 'books','action'=>'index'),
					array('escape' => false)
				);
			?>	
			</div>
			<div id="header_right">
				<!-- INCREMENTAL SEARCH -->
				
				<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
function fillin(Value)
{
$('#name').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "http://localhost/book-a-book/app/webroot/files/ajax.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
</script>
	
				<!-- INCREMENTAL SEARCH Ends-->
			
			
				
				
				<div>
				<?php echo $this->Html->image('menubar.png',array('height' => '3','width' => '617','border' => '0'));
				?></div>
				<div style="padding: 0px 5px 0px 5px;">
					<ul class="dropnav">
						<li>
						<?php echo $this->Html->link('HOME',array('controller' => 'books','action'=>'index'),
								array('class' => 'a1','style'=>'margin-right: 43px;'));	?>
						</li>
						<li>
						<?php echo $this->Html->link('BOOKSTORE',array('controller' => 'books','action'=>'bookstore'),
									array('class' => 'a1','style'=>'margin-right: 43px;'));	?>	
						</li>
						
						<li>
						<?php echo $this->Html->link('MY ACCOUNT',array('controller' => 'users','action'=>'views',$current_user['id']),
							array('class' => 'a1','style'=>'margin-right: 43px;'));?>
						</li>
						<li>
						<?php echo $this->Html->link('CONTACT US',array('controller' => 'books','action'=>'contact'),
							array('class' => 'a1','style'=>'margin-right: 43px;'));?>
							
						</li>						
					</ul>
				</div>
				<div>
				<?php echo $this->Html->image('menubar.png',array('height' => '3','width' => '617','border' => '0'));
				?>
				</div>
				
			</div>
		</div>
		
		<div id="main">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		
		</div>
		
	</div>
	
	<div id="footer">
		<div id="wrapfooter">
			<div class="footuls" style="width:530px;overflow:hidden;height:auto;margin:0 auto;">
			<ul>
				<li class="foot">PAGES</li>

				<li>
				<?php echo $this->Html->link('Home',array('controller' => 'books','action'=>'index'));	?>
				</li>
				<li>
				<?php echo $this->Html->link('Bookstore',array('controller' => 'books','action'=>'bookstore'));	?>
				</li>
				<li>
				<?php echo $this->Html->link('My Account',
				array('controller' => 'users','action'=>'views',$current_user['id']));	?>
				</li>
				<li>
				<?php echo $this->Html->link('Contact Us',array('controller' => 'books','action'=>'contact'));	?>
				</li>
			</ul>
			
			<ul>
				<li class="foot">HELP</li>
				<li><?php echo $this->Html->link('LOGIN',array('controller' => 'users','action' => 'login'),
				array('id'=>'butlog')); ?></li>
			</ul>
			<div id="conn" style="float: left;margin-top: 30px;  display: inline-block;width: 160px;height:69px;" >
				<h4 class="foot" style="padding:0;font-weight:normal;margin:0;padding-bottom: 10px;">STAY CONNECTED</h4>
				
				
				<a >
				
					<a href="http://localhost/book-a-book/users/facebook"><i style="margin-left:50px;background-position: -51px -5px;"></a>
						<em></em>
					</i>
				</a>
				
				
			</div>
			</div>
			<div id="last">
				<p style="margin: 0;  padding: 0;  border: 0;vertical-align: baseline;font-size: 12px;color: #bfbdb6;float: left;">
				DISCLAIMER - We collect personal information on this site</p>
				<p style="margin: 0;  padding: 0;  border: 0;vertical-align: baseline;font-size: 12px;color: #bfbdb6;float: right;">
				<span style="font-size: 16px;  font-family: Verdana;  font-weight: bold;">© </span>
				Copyright @2015 Bookabook.com (a Online Library). 
				</p>
			</div>
		</div>
		
		
	</div>

		<?php// echo $cakeVersion; ?>
		
</body>
</html>


