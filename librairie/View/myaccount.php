<?php

$subpage = (\Controller\ControllerController::keyExist('subpage', $_GET)) ? \Controller\ControllerController::keyExist('subpage', $_GET) : "home";


if (isset($_POST['ajax'])){
    $type = $_POST['type'];

    switch($subpage){
        case 'settings': require_once("librairie/View/template/myaccount/settings.php");break;
        default: require_once("librairie/View/template/myaccount/default.php");break;
    }

    die;
}else{
    $settings = null;
    $home = null;
    switch($subpage){
        case 'settings': $settings = "class='active'";break;
        default: $home = "class='active'";break;
    }
}

?>

<div id="myaccount">
    <div>
        <ul>
            <li><a href="/myaccount" <?=$home?>>Mon compte</a></li>
            <li><a href="/myaccount/settings" <?=$settings?>>Paramètres</a></li>
            <li><a href="/logout">Deconnexion</a></li>
        </ul>
    </div>
    <div>
        <?php
            switch($subpage){
                case 'settings': require_once("librairie/View/template/myaccount/settings.php");break;
                default: require_once("librairie/View/template/myaccount/default.php");break;
            }
        ?>
    </div>
</div>