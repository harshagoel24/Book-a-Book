<?php
class BooksController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$dis="";
		$log=$this->Auth->user();
		$logid=$log['id'];
		$book=$this->Book->find('all',
		array(
		'conditions' => array( 
		'NOT' => array('is_rented' =>'1','user_id'=>$logid)),
		'limit'=>5,
		'group' => array('Book.name')));
		$this->set('books', $book);
		$this->Session->write('conference_id', $this->request->id);
	}
	
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid book'));
        }
		
        $book=$this->Book->findById($id);
        if (!$book) {
            throw new NotFoundException(__('Invalid book'));
        }
        $this->set('book', $book);
		$this->Session->write('book_id',$id);
	}
	
	
	public function add() {
	
	}

	public function viewcart(){
	
	}
	
	
	public function filter_products(){
	
	}
	
	public function searching(){
	
	}
	
	public function contact(){
	
	}
	
	public function bookstore() {
		$log=$this->Auth->user();
		$logid=$log['id'];
		$this->set('books', $this->Book->find('all',array(
		'conditions' => array( 
		'NOT' => array('is_rented' =>'1','user_id'=>$logid)),
		'group' => array(
		'Book.name'))));
		$this->Session->write('conference_id', $this->request->id);
	}
	



}