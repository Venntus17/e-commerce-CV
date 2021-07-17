<?php

if (isset($_POST['ajax'])){
    $type = $_POST['type'];

    if ($type == "usrmail"){
        $err = \Controller\UserController::modifySettings();
    }

    echo json_encode($err);
    die;
}

?>

<div id="myaccount__settings">
    <form>
        <div>
            <label>
                Nom d'utilisateur:
                <input name="username" id="username" type="text" autocomplete="name" value="<?=$_SESSION['username']?>">
            </label>
            <label>
                Adresse mail:
                <input name="mail" id="mail" type="text" autocomplete="email" value="<?=$_SESSION['mail']?>">
            </label>
        </div>
        <div id="errors">

        </div>
        <button type="button">Sauvegarder</button>
    </form>
</div>