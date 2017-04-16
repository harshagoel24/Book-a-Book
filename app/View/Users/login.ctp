<?php 
echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');	
?>
<style>

#popup{
		position:fixed;
		left:0px;
		top: 110px;
		display:none;
		z-index:999;
		padding:10px;
		border-radius:10px;
		width:375px;
		margin:0 auto;
		overflow:hidden;
		height:auto;
		background-color:#FFF;
}
		
</style>


<script>

			
	$(document).ready(function()
	{
		
		
		var idss=$("#popup").attr("id");
			
				$("#lay").show();
				$("#popup").show();
				var winwidth = $(window).width();
				var left=(winwidth/2)-180;
				$("#popup").css("left",left);		
		
				$("#cross").click(function(){
			
				$("#lay").hide();
				$("#popup").hide();
			
			});
			
		$("#cross").click(function(){
			
				$("#lay").hide();
				$("#popup").hide();
			
			});
				
			
		});
</script>

<?php 

echo $this->Html->script('jquery-1.11.3.min');
	echo $this->fetch('script');
	
?>
		<div id="popup" style="width:375px;margin:0 auto;">
		<button style="float:right;color:#FFF;background-color:rgb(249, 100, 100);
		border:1px solid rgb(245, 55, 55);" id="cross">X</button>
		<h2 style="margin:35px 0 20px 145px;color:#000;"><i>Login</i></h2>
		<ul id="su">
			<?php
			echo $this->Form->create();
			echo '<li>';
			echo $this->Form->input('username',array('class'=>'inp'));
			echo '</li>';
			echo '<li>';
			echo $this->Form->input('password',array('class'=>'inp'));
			echo '</li>';
			echo '<li>';
			echo $this->Form->end('Login',array('id'=>'subut'));
			echo '</li>';
			?>
		</ul>
		</div>
		<div style="height:250px;"></div>
		