<?php
class CartsController extends AppController {
	public $helpers = array('Html', 'Form');
	
	
	public function show() {
	$bookId = $this->Session->read('book_id');
	$this->set('books',$bookId);
	$userId=$this->Auth->user();
	
	$this->Cart->save( 
    array(
        'books_id' => $bookId,
        'users_id' => $userId['id']
        )
    );
	$this->redirect(array('controller' => 'books','action' => 'index'));
	}
	
	public function delete($id) {
    if ($this->request->is('post')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Cart->delete($id)) {
        
    } else {
        $this->Session->setFlash(
            __('The book with id: %s could not be deleted.', h($id))
        );
    }
	$userId=$this->Auth->user();
    return $this->redirect(array('controller'=>'books','action' => 'viewcart'));
}


}