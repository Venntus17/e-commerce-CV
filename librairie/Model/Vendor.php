<?php
    namespace Model;
    Class Vendor{
        private $id,$first_name,$last_name,$tel,$contact_mail;
        public function __construct($id = null,$first_name = null,$last_name = null,$tel = null,$contact_mail = null){
        $this->setId($id)->setFirstName($first_name)->setLastName($last_name)->setTel($tel)->setContactMail($contact_mail);
    }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getId(){
            return $this->id;
        }

        public function setFirstName($first_name){
            $this->first_name = $first_name;
            return $this;
        }
        public function getFirstName(){
            return $this->first_name;
        }

        public function setLastName($last_name){
            $this->last_name = $last_name;
            return $this;
        }
        public function getLastName(){
            return $this->last_name;
        }

        public function setTel($tel){
            $this->tel = $tel;
            return $this;
        }
        public function getTel(){
            return $this->tel;
        }

        public function setContactMail($contact_mail){
            $this->contact_mail = $contact_mail;
            return $this;
        }
        public function getContactMail(){
            return $this->contact_mail;
        }

        public static function format($data){
        $objs = [];
        if ($data != NULL)
        {
        foreach($data as $d){
        
            $id = \Controller\ControllerController::keyExist('id', $d);
            $first_name = \Controller\ControllerController::keyExist('first_name', $d);
            $last_name = \Controller\ControllerController::keyExist('last_name', $d);
            $tel = \Controller\ControllerController::keyExist('tel', $d);
            $contact_mail = \Controller\ControllerController::keyExist('contact_mail', $d);
            $vendor = new self($id,$first_name,$last_name,$tel,$contact_mail);
            array_push($objs, $vendor);
        }
        }
        return (empty($objs)) ? null : $objs; 
    }
    }