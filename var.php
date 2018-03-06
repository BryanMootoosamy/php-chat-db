<?php
    $userLogin = null;
    $passwordLogin = null;
    $userVerif = null;
    // pas oublier de sanitiser
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['log'])) {
        $username = attribution('username');
        $userLogin = filter_var($username, FILTER_SANITIZE_STRING);
        $passwordRaw = attribution('password');
        $passwordLogin = filter_var($passwordRaw, FILTER_SANITIZE_STRING);
        $verifU = $db->query("select username, password from users where username = '$userLogin'");
        $userVerif = $verifU->fetch();
    }
    if (isset($_POST['usernameSet']) && isset($_POST['passwordSet']) && isset($_POST['passwordConfirm']) && isset($_POST['mail']) && $_POST['passwordSet'] == $_POST['passwordConfirm'] && isset($_POST['sign'])){
        $username = attribution('usernameSet');
        $userLogin = filter_var($username, FILTER_SANITIZE_STRING);
        $passwordRaw = attribution('passwordSet');
        $passwordLogin = filter_var($passwordRaw, FILTER_SANITIZE_STRING);
        $passwordHide = password_hash($passwordLogin, PASSWORD_DEFAULT);
        $email = attribution('mail');
        $mail = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $db->exec("insert into users (username, email, password) values ('$userLogin', '$mail', '$passwordHide')");
    }
?>
