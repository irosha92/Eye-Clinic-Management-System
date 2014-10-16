<?php
class User{
	private $_db,
            //$_userTup,
			$_data,
			$_sessionName,
			$_isLoggedIn;

	public function __construct($user=null){
		$this->_db=DB::getInstance();
		$this->_sessionName=Config::get('session/session_name');
		if (!$user) {
			if (Session::exists($this->_sessionName)) {
				$user=Session::get($this->_sessionName);
				if ($this->find($user)) {
					$this->_isLoggedIn=true;
				} else {
					# code...
				}
				
			}
		} else {
			$this->find($user);
		}
		
	}

	public function create($fields=array()){
		if (!$this->_db->insert('reg_patient', $fields)) {
			throw new Exception('There was a problem creating an account.');
			
		}
	}

	public function find($user=null){
		if ($user) {
			$field=(is_numeric($user)) ? 'Patient_ID' : 'username';
			$data=$this->_db->get('reg_patient', array($field,'=', $user));
            //$this->_userTup = $data;
            if($data->count()){
				$this->_data=$data->first();
				return true;
			}
		}
		return false;
	}

    public function getUserID(){
        return $this->data()->Patient_ID;
    }

    public function getFullName(){
        return $this->data()->firstName." ".$this->data()->lastname;
    }

	public function login($username=null, $password=null){
		$user=$this->find($username);
		if ($user) {
			if ($this->data()->password==Hash::make($password, $this->data()->salt)) {
				Session::put($this->_sessionName, $this->data()->Patient_ID);
				return true;
			}
		}
		return false;
	}

	public function logout(){
		Session::delete($this->_sessionName);
	}

	public function data(){
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
}
?>