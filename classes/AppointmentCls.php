<?php
class AppointmentCls{
    private $_db,
        $_data,
        $_sessionName;

    public function __construct($user=null){
        $this->_db=DB::getInstance();
        $this->_sessionName=Config::get('session/session_name');


    }

    public function create($fields=array()){
        if (!$this->_db->insert('appointment', $fields)) {
            throw new Exception('There was a problem creating an appointment.');

        }else{
            return true;
        }
    }

    public function find($user=null){
        if($user){
            $field=(is_numeric($user)) ? 'Patient_ID' : 'username';
            $data=$this->_db->get('appointment', array($field,'=', $user));
            if($data->count()){
                $this->_data=$data->first();
                return true;
            }
        }
        return false;
    }



    public function data(){
        return $this->_data;
    }

}

?>