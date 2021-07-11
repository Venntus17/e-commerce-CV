<?php
    namespace Model;
    Class User{
        private $id,$username,$mail,$password,$role,$mail_verified,$cart_id;
        public function __construct($id = null,$username = null,$mail = null,$password = null,$role = null,$vendor_id = null,$mail_verified = null,$cart_id = null){
        $this->setId($id)->setUsername($username)->setMail($mail)->setPassword($password)->setRole($role)->setMailVerified($mail_verified)->setCartId($cart_id);
    }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getId(){
            return $this->id;
        }

        public function setUsername($username){
            $this->username = $username;
            return $this;
        }
        public function getUsername(){
            return $this->username;
        }

        public function setMail($mail){
            $this->mail = $mail;
            return $this;
        }
        public function getMail(){
            return $this->mail;
        }

        public function setPassword($password){
            $this->password = $password;
            return $this;
        }
        public function getPassword(){
            return $this->password;
        }

        public function setRole($role){
            $this->role = $role;
            return $this;
        }
        public function getRole(){
            return $this->role;
        }

        public function setMailVerified($mail_verified){
            $this->mail_verified = $mail_verified;
            return $this;
        }
        public function getMailVerified(){
            return $this->mail_verified;
        }

        public function setCartId($cart_id){
            $this->cart_id = $cart_id;
            return $this;
        }
        public function getCartId(){
            return $this->cart_id;
        }

        public static function format($data){
        $objs = [];
        if ($data != NULL)
        {
        foreach($data as $d){
        
            $id = \Controller\ControllerController::keyExist('id', $d);
            $username = \Controller\ControllerController::keyExist('username', $d);
            $mail = \Controller\ControllerController::keyExist('mail', $d);
            $password = \Controller\ControllerController::keyExist('password', $d);
            $role = \Controller\ControllerController::keyExist('role', $d);
            $mail_verified = \Controller\ControllerController::keyExist('mail_verified', $d);
            $cart_id = \Controller\ControllerController::keyExist('cart_id', $d);
            $user = new self($id,$username,$mail,$password,$role,$mail_verified,$cart_id);
            array_push($objs, $user);
        }
        }
        return (empty($objs)) ? null : $objs; 
    }
    }