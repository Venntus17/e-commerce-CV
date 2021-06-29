<?php
    namespace Model;
    Class Cart{
        private $id,$product_id_list;
        public function __construct($id = null,$product_id_list = null){
        $this->setId($id)->setProductIdlist($product_id_list);
    }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getId(){
            return $this->id;
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
            $product_id_list = \Controller\ControllerController::keyExist('product_id_list', $d);
            $cart = new self($id,$product_id_list);
            array_push($objs, $cart);
        }
        }
        return (empty($objs)) ? null : $objs; 
    }
    }