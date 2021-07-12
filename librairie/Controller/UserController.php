<?php
    namespace Controller;
    Class UserController extends ControllerController{
        protected static $table_name = "User";
        protected static $model_class = \Model\User::class;
        protected static $database = "fraxel";

        public static function login(){
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $err = [];

            $mail_parse = false;
            if (!empty($mail)){
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $mail_parse = true;
                }else
                    $err['mail'] = "L'adresse mail n'est pas valide !";
            }else
                $err['mail'] = "L'adresse mail est obligatoire !";

            $password_parse = false;
            if (!empty($password)){
                if (strlen($password) >= 8){
                    $password_parse = true;
                }else
                    $err['password'] = "Le mot de passe doit contenire au moins 8 charactères !";
            }else
                $err['password'] = "Le mot de passe est obligatoire !";

            if ($mail_parse && $password_parse){
                $user = \Controller\UserController::SELECT(\Database::SELECT_ALL, ['mail'=>$mail], 1);
                if ($user != null){
                    $user = $user[0];
                    if (password_verify($password, '$2y$10$'.$user->getPassword())){
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['username'] = $user->getUsername();
                        $_SESSION['mail'] = $user->getMail();
                        $_SESSION['password'] = $user->getPassword();
                        $_SESSION['role'] = $user->getRole();
                        $_SESSION['mail_verified'] = $user->getMailVerified();
                        $_SESSION['cart_id'] = $user->getCartId();

                        return true;
                    }else
                        $err['error'] = "Ce compte n'existe pas !";
                }else
                    $err['error'] = "Ce compte n'existe pas ! ";
            }

            return $err;
        }

        public static function register(){
            $username = $_POST['username'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $conf_password = $_POST['conf_password'];

            $username_parse = false;
            if (!empty($username)){
                $username_parse = true;
            }else
                $err['username'] = "Le nom d'utilsateur est obligatoire !";

            $mail_parse = false;
            if (!empty($mail)){
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $mail_parse = true;
                }else
                    $err['mail'] = "L'adresse mail n'est pas valide !";
            }else
                $err['mail'] = "L'adresse mail est obligatoire !";

            $password_parse = false;
            if (!empty($password)){
                if (strlen($password) >= 8){
                    $password_parse = true;
                }else
                    $err['password'] = "Le mot de passe doit contenire au moins 8 charactères !";
            }else
                $err['password'] = "Le mot de passe est obligatoire !";

            $conf_password_parse = false;
            if (!empty($conf_password)){
                if (strlen($conf_password) >= 8){
                    if ($conf_password == $password){
                        $conf_password_parse = true;
                    }else
                        $err['conf_password'] = "Les mot de passe doivent être identiques !";
                }else
                    $err['conf_password'] = "Le mot de passe de confirmation doit contenire au moins 8 charactères !";
            }else
                $err['conf_password'] = "Le mot de passe de confirmation est obligatoire !";

            if ($username_parse && $mail_parse && $password_parse && $conf_password_parse){
                $user = \Controller\UserController::SELECT(['id'], ['mail'=>$mail, 'OR'=>\Database::WHERE_KEY, 'username'=>$username], 1);
                if ($user == null){
                    \Controller\UserController::INSERT([
                        'username' => $username,
                        'mail' => $mail,
                        'password' => str_replace('$2y$10$', '', password_hash($password, PASSWORD_DEFAULT)),
                        'role' => "member",
                        'mail_verified' => 0,
                        'cart_id' => -1
                    ]);

                    return true;
                }else
                    $err['error'] = "L'utilisateur existe déjà !";
            }

            return $err;
        }
    }