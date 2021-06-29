<?php
    namespace Model;
    Class Order{
        private $id,$user_id,$product_id_list;
        public function __construct($id = null,$user_id = null,$product_id_list = null){
        $this->setId($id)->setUserId($user_id)->setProductIdlist($product_id_list);
    }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getId(){
            return $this->id;
        }

        public function setUserId($user_id){
            $this->user_id = $user_id;
            return $this;
        }
        public function getUserId(){
            return $this->user_id;
        }

        public function setProductIdlist($product_id_list){
            $this->product_id_list = $product_id_list;
            return $this;
        }
        public function getProductIdlist(){
            return $this->product_id_list;
        }

        public static function format($data){
        $objs = [];
        if ($data != NULL)
        {
        foreach($data as $d){
        
            $id = \Controller\ControllerController::keyExist('id', $d);
            $user_id = \Controller\ControllerController::keyExist('user_id', $d);
            $product_id_list = \Controller\ControllerController::keyExist('product_id_list', $d);
            $order = new self($id,$user_id,$product_id_list);
            array_push($objs, $order);
        }
        }
        return (empty($objs)) ? null : $objs; 
    }
    }