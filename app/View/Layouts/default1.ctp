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


?>
<!DOCTYPE html>
<html>
<head>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('cake.generic');
		
		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		
		<div id="content">
			<div style="text-align:right;">
			<?php if($logged_in): ?>
				WELCOME <?php echo $current_user['username']; ?>.<?php echo $this->Html->link('LOGOUT',array('controller' => 'users','action' => 'logout')); ?>
			<?php else: ?>
				<?php echo $this->Html->link('LOGIN',array('controller' => 'users','action' => 'login')); ?>	<?php echo $this->Html->link('REGISTER',array('controller' => 'users','action' => 'add')); ?>
			<?php endif; ?>	
			</div>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
