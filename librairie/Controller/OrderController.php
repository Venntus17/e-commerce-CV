<?php
    namespace Controller;
    Class OrderController extends ControllerController{
        protected static $table_name = "Order";
        protected static $model_class = \Model\Order::class;
        protected static $database = "fraxel";
    }