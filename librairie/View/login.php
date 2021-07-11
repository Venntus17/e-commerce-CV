<?php

if (isset($_POST['type'])){
    $type = $_POST['type'];
    if ($type == "signin"){
        $err = \Controller\UserController::login();
    }else{
        $err = \Controller\UserController::register();
    }

    echo json_encode($err);
    die;
}

?>

<div id="login">
    <form id="signin">
        <label>
            Adresse mail:
            <input require name="mail" id="signin_mail" type="mail">
        </label>
        <label>
            Mot de passe:
            <input required autocomplete="current-password" name="password" id="signin_password" type="password">
        </label>
        <input type="hidden" name="type" value="signin">
        <button type="button">Se connecter</button>
    </form>
    <form id="signup">
        <label>
            Nom d'utilisateur:
            <input required autocomplete="username" name="username" id="signup_username" type="text">
        </label>
        <label>
            Adresse mail:
            <input required name="mail" id="signup_mail" type="text">
        </label>
        <label>
            Mot de passe:
            <input required autocomplete="new-password" name="password" id="signup_password" type="password">
        </label>
        <label>
            Comfirmez le mot de passe:
            <input required autocomplete="new-password" name="conf_password" id="signup_conf_password" type="password">
        </label>
        <input type="hidden" name="type" value="signup">
        <button type="button">S'inscrire</button>
    </form>
</div>
