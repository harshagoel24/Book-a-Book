<?php
class CheckoutsController extends AppController {
	public $helpers = array('Html', 'Form');
	
	
	public function show() {
	
	}
	
	public function invoice() {
		
		
	$this->redirect(array('controller' => 'books','action' => 'index'));
	}
}
