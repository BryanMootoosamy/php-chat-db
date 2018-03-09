<?php
    $userLogin = null;
    $passwordLogin = null;
    $userVerif = null;
    $verifUser = null;
    $verifPassword = null;
    // pas oublier de sanitiser
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['log'])) {
        $username = attribution($_POST['email']);
        $userLogin = filter_var($username, FILTER_SANITIZE_EMAIL);
        $passwordRaw = attribution($_POST['password']);
        $passwordLogin = filter_var($passwordRaw, FILTER_SANITIZE_STRING);
        $verifU = $db->query("select email,username, password from users where email = '$userLogin'");
        $userVerif = $verifU->fetch();
        $verifUser = attribution($userVerif['email']);
        $verifPassword = attribution($userVerif['password']);
        if ($userLogin == $verifUser && password_verify($passwordLogin, $verifPassword) == true){
            $_SESSION['user'] = $userVerif['username'];
            $db->exec("update users set user_state = 2 where username = '".$_SESSION['user']."'");
        } else {$falseCo = true;}
    }
    elseif (isset($_POST['usernameSet']) && isset($_POST['passwordSet']) && isset($_POST['passwordConfirm']) && isset($_POST['mail']) && isset($_POST['sign'])){
        $username = attribution($_POST['usernameSet']);
        $userLogin = filter_var($username, FILTER_SANITIZE_STRING);
        $passwordRaw = attribution($_POST['passwordSet']);
        $passwordLogin = filter_var($passwordRaw, FILTER_SANITIZE_STRING);
        $passwordHide = password_hash($passwordLogin, PASSWORD_DEFAULT);
        $email = attribution($_POST['mail']);
        $mail = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $existenceUser = $db->query("select username from users where username = '".$userLogin."'");
        $existenceMail = $db->query("select email from users where email = '".$mail."'");
        $existUser = $existenceUser -> fetch();
        $existMail = $existenceMail -> fetch();
        if ( $_POST['passwordSet'] == $_POST['passwordConfirm'] && $_POST['usernameSet'] != $existUser['username'] && $_POST['mail'] != $existMail) {
            $db->exec("insert into users (username, email, password) values ('$userLogin', '$mail', '$passwordHide')");
        } else {$error = true;}
    }
?>
