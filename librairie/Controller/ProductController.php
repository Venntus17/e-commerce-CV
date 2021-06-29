<?php
    namespace Controller;
    Class ProductController extends ControllerController{
        protected static $table_name = "Product";
        protected static $model_class = \Model\Product::class;
        protected static $database = "fraxel";
    }