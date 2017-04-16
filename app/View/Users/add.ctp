
		<div style="width:375px;margin:0 auto;">
		<h2 style="margin:35px 0 20px 135px;color:#000;">
		<i>Register</i></h2>
		<ul id="su">

        <?php
		echo $this->Form->create('User');
		echo '<li>';
		echo $this->Form->input('username',array('class'=>'inp'));
		echo '</li>';
		echo '<li>';
		echo $this->Form->input('address',
		array('type'=>'textarea','class'=>'inp','maxlength'=>'255','cols'=>'30','rows'=>'6','style'=>
		'padding:5px;width: 306px; height: 60px;'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->input('email_id',array('type'=>'text','class'=>'inp'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->input('password',array('class'=>'inp'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->input('password_confirmation',array('type' => 'password','class'=>'inp'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->input('phn_no',array('class'=>'inp'));
        echo '</li>';
		echo '<li>';
		echo $this->Form->end('Register',array('id'=>'subut'));
		echo '</li>';
		?>

		</ul>
		</div>
		