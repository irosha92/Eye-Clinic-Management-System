<?php
class Validate{
	private $_passed=false,
			$_errors=array(),
			$_db=null;

	public function __construct(){
		$this->_db=DB::getInstance();
	}

	public function check($source, $items=array()){
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				if(isset($source[$item])){
					$value=$source[$item];
				}
				if ($rule=='required'&&empty($value)) {
					$this->addError($item,"{$item} is required");
				}else if(!empty($value)){
					switch ($rule) {
						case 'min':
							if (strlen($value)<$rule_value) {
								$this->addError($item,"{$item} must be minimum of {$rule_value} characters.");
							}
							break;
						case 'max':
							if (strlen($value)>$rule_value) {
								$this->addError($item,"{$item} must be maximum of {$rule_value} characters.");
							}
							break;
						case 'matches':
							if ($value!=$source[$rule_value]) {
								$this->addError($item,"{$rule_value} must match {$item}");
							}
							break;
						case 'unique':
							$check=$this->_db->get($rule_value, array($item, '=', $value));
							if ($check->count()) {
								$this->addError($item,"{$item} already exsits.");
							}
							break;
					}
				}
			}
		}

		if (empty($this->_errors)) {
			$this->_passed=true;
		}

		return $this;
	}

	private function addError($item,$error){
		$this->_errors[$item]=$error;
	}

	public function errors(){
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}