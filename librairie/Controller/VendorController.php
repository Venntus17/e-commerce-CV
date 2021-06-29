<?php
    namespace Controller;
    Class VendorController extends ControllerController{
        protected static $table_name = "Vendor";
        protected static $model_class = \Model\Vendor::class;
        protected static $database = "fraxel";
    }