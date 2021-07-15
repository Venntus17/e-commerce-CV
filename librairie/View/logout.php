<?php

session_destroy();
$_SESSION = [];
\Controller\ViewController::redirect("/login");

?>