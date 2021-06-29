<?php
    namespace Model;
    Class VendorOrder{
        private $id,$vendor_id,$product_id_list;
        public function __construct($id = null,$vendor_id = null,$product_id_list = null){
        $this->setId($id)->setVendorId($vendor_id)->setProductIdlist($product_id_list);
    }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getId(){
            return $this->id;
        }

        public function setVendorId($vendor_id){
            $this->vendor_id = $vendor_id;
            return $this;
        }
        public function getVendorId(){
            return $this->vendor_id;
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
            $vendor_id = \Controller\ControllerController::keyExist('vendor_id', $d);
            $product_id_list = \Controller\ControllerController::keyExist('product_id_list', $d);
            $vendororder = new self($id,$vendor_id,$product_id_list);
            array_push($objs, $vendororder);
        }
        }
        return (empty($objs)) ? null : $objs; 
    }
    }