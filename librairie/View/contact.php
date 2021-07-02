<?php

if (isset($_POST['ajax'])){
    $mail = $_POST['mail'];
    $subject = $_POST['subject'];

    $err = [];
    if (!empty($mail)){
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $content = "$mail\n\r";
            $content .= $_POST['content'];
            $err = \Controller\MailController::sendMailTo("fcarisey6@gmail.com", $subject, $content, htmlspecialchars($content));
        }else
            $err['mail'] = "L'adresse mail n'est pas valide !";
    }else
        $err['mail'] = "l'adresse mail est obligatoire !";
        

    echo json_encode($err);
    die;
}

?>

<div id="contact">
    <form>
        <div>
            <label>
                Adresse mail:
                <input required id="mail" type="mail" name="mail" placeholder="Votre adresse mail">
            </label>
            <div>
                <label>
                    Objet:
                    <input required id="subject" type="text" name="subject" placeholder="Objet">
                </label>
                <textarea id="content" name="content"></textarea>
            </div>
        </div>
        <button type="button" id="contact-submit">Envoyer</button>
    </form>
    <div id="errors">
        
    </div>
</div>
