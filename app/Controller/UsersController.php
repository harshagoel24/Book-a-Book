<?php
	class UsersController extends AppController {
	public $title_for_layout = 'arrrrrrr';
	public $name = 'Users';
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

	
	public function login(){
		if ($this->request->is('post')) {
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Your username or password was incorrect');
			}
		}		
	}
	
	public function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	public function add(){
        if ($this->request->is('post')) {
				
            if($this->User->save($this->request->data)){
				
                $this->Session->setFlash('The user has been saved');
				$id=$this->request->data['User']['username'];
				$dbhostname="localhost";
				$dbuname="root";
				$dbpwd="";
				$dbname="bookabook";
				$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
				mysql_select_db($dbname,$con);
				$quer="select * from `users` where `username`='$id'";
				$querexec=mysql_query($quer);
				$row=mysql_fetch_assoc($querexec);
				$idd=$row['id'];

                return $this->redirect(array('controller' => 'users','action'=>'mail_reg',$idd));
            }
            $this->Session->setFlash('The user cannot be saved');
        }
    }
	
	public function facebook(){
		if ($this->request->is('post')){
			if($this->User->save($this->request->data)){
			    $this->Session->setFlash('The user has been saved');
				
				$id=$this->request->data['User']['username'];
				$dbhostname="localhost";
				$dbuname="root";
				$dbpwd="";
				$dbname="bookabook";
				$con=mysql_connect($dbhostname,$dbuname,$dbpwd);
				mysql_select_db($dbname,$con);
				$quer="select * from `users` where `username`='$id'";
				$querexec=mysql_query($quer);
				$row=mysql_fetch_assoc($querexec);
				$idd=$row['id'];
				
				include 'recoo.php';
				get_fb_books($idd);
				
                return $this->redirect(array('controller' => 'books','action'=>'index'));
			}
		}
			
		}
	

    public function views($id=NULL){
        $this->User->ids = $id;
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
		App::import('Controller', 'Books');
		$BooksController = new BooksController;
				
		$this->set('books', $BooksController->Book->find('all',array('conditions' => array('Book.user_id'=>$id))));
        $this->set('user', $this->User->findById($id));
		if ($this->request->is('post')){
		$phn=$this->request->data['User']['phn_no'];		
		$address=$this->request->data['User']['address'];		
		if($this->User->updateAll(array('phn_no' => $phn,'address'=>"'$address'"),array('id' => $id)))
		return $this->redirect(array('controller' => 'users','action' => 'views',$id));
		}
		
    }
	
	
	
	public function mail_reg($id=NULL){
		
		if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
		
		$this->set('nam',$id);
		
	//	include "http://localhost/book-a-book/app/webroot/files/mail_reg.php"
	}
    
}