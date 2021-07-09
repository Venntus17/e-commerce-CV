<?php

namespace Controller;

class ViewController{
    public static function process(){
        $page = (isset($_GET['page'])) ? $_GET['page'] : 'home';
        self::userPermission($page);
        self::searchParse();

        $home = null;
        $products = null;
        $contact = null;
        $account = null;
        $login = null;
        switch($page){
            case 'home': $home="active";break;
            case 'products': $products="active";break;
            case 'contact': $contact="active";break;
            case 'account': $account="active";break;
            case 'login': $login="active";break;
        }

        if (!isset($_POST['ajax']))
            require_once("librairie/View/template/header.php");

        switch($page){
            case 'home': require_once("librairie/View/home.php");break;
            case 'contact': require_once("librairie/View/contact.php");break;
            case 'products': require_once("librairie/View/products.php");break;
            case 'product': require_once("librairie/View/product.php");break;
        }

        if (!isset($_POST['ajax']))
            require_once("librairie/View/template/footer.php");
    }

    public static function userPermission($page){
        $basic = ['home', 'product', 'contact', 'login', 'search', 'products'];
        
        $allow = false;
        if (!in_array($page, $basic)){
            if (isset($_SESSION['id']));
        }else
            $allow = true;

        if ($allow)
            return true;
        else{
            require_once("error/401.html");
            die;
        }
    }

    public static function redirect($location){
        header("Location: $location", true);
        die;
    }

    private static function searchParse(){
        if (isset($_GET['s'])){
            $s = strchr($_SERVER['REQUEST_URI'], "?s=");
            if ($s){
                $s = str_replace('?s=', '', $s);
                self::redirect("/search/$s");
            }
        }
    }
}

?>
