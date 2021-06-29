<?php
    namespace Controller;
    Class VendorOrderController extends ControllerController{
        protected static $table_name = "VendorOrder";
        protected static $model_class = \Model\VendorOrder::class;
        protected static $database = "fraxel";
    }