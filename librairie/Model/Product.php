<?php
    namespace Model;
    Class Product{
        private $id,$name,$icon,$price,$file,$view,$description;
        public function __construct($id = null,$name = null,$icon = null,$price = null,$file = null,$view = null,$description = null){
        $this->setId($id)->setName($name)->setIcon($icon)->setPrice($price)->setFile($file)->setView($view)->setDescription($description);
    }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        public function getId(){
            return $this->id;
        }

        public function setName($name){
            $this->name = $name;
            return $this;
        }
        public function getName(){
            return $this->name;
        }

        public function setIcon($icon){
            $this->icon = $icon;
            return $this;
        }
        public function getIcon(){
            return $this->icon;
        }

        public function setPrice($price){
            $this->price = $price;
            return $this;
        }
        public function getPrice(){
            return $this->price;
        }

        public function setFile($file){
            $this->file = $file;
            return $this;
        }
        public function getFile(){
            return $this->file;
        }

        public function setView($view){
            $this->view = $view;
            return $this;
        }
        public function getView(){
            return $this->view;
        }

        public function setDescription($description){
            $this->description = $description;
            return $this;
        }
        public function getDescription(){
            return $this->description;
        }

        public static function format($data){
        $objs = [];
        if ($data != NULL)
        {
        foreach($data as $d){
        
            $id = \Controller\ControllerController::keyExist('id', $d);
            $name = \Controller\ControllerController::keyExist('name', $d);
            $icon = \Controller\ControllerController::keyExist('icon', $d);
            $price = \Controller\ControllerController::keyExist('price', $d);
            $file = \Controller\ControllerController::keyExist('file', $d);
            $view = \Controller\ControllerController::keyExist('view', $d);
            $description = \Controller\ControllerController::keyExist('description', $d);
            $product = new self($id,$name,$icon,$price,$file,$view,$description);
            array_push($objs, $product);
        }
        }
        return (empty($objs)) ? null : $objs; 
    }
    }