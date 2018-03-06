<?php
    // pas oublier de sanitiser
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['log'])) {
        $username = attribution('username');
        $userLogin = filter_var($username, FILTER_SANITIZE_STRING);
        $passwordRaw = attribution('password');
        $passwordLogin = filter_var($passwordRaw, FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['usernameSet']) && isset($_POST['passwordSet']) && isset($_POST['passwordConfirm']) && isset($_POST['mail']) && $_POST['passwordSet'] == $_POST['passwordConfirm'] && isset($_POST['sign'])){
        $username = attribution('usernameSet');
        $userLogin = filter_var($username, FILTER_SANITIZE_STRING);
        $passwordRaw = attribution('passwordSet');
        $passwordLogin = filter_var($passwordRaw, FILTER_SANITIZE_STRING);
        $email = attribution('mail');
        $mail = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $db->exec("insert into users (username, email, password) values ('$userLogin', '$mail', '$passwordLogin')");
    }
?>
