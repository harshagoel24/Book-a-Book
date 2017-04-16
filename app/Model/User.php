<?php

class User extends AppModel{
	
	public $name = 'User';
	
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A username is required'
            ),
			'unique' => array(
				'rule' => 'isUnique',
                'message' => 'This username is already taken'
			)
        ),
		'phn_no' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A phn_no is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A password is required'
            ),
			'Match Passwords' => array(
				'rule' => 'matchPasswords',
				'message' => 'Your passwords do not match'
			)
        ),
		'password_confirmation' => array(
			'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A confirmed password is required'
			)   
		)
	
	);
	
	public function matchPasswords($data){
		if($data['password'] == $this->data['User']['password_confirmation']){
			return true;
		}
		$this->invalidate('password_confirmation','Your passwords do not match');
		return false;
	}
	
	public function beforeSave(){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}
	
}

?>