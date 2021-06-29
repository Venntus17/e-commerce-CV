<?php
    namespace Controller;
    Class CartController extends ControllerController{
        protected static $table_name = "Cart";
        protected static $model_class = \Model\Cart::class;
        protected static $database = "fraxel";
    }