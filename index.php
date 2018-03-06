<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $db = new PDO('mysql:host=localhost;dbname=thanatchat', 'root', 'ananas');
} catch (Exception $e) {
    echo "Erreur: $e".$e->getMessage();
}
require "function.php";
require "var.php";


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/style.css">
        <meta charset="utf-8">
        <title>ThanaChat</title>
    </head>
    <body>
        <?php

            if ($userLogin != $userVerif['username'] || password_verify($passwordLogin, $userVerif['password'])== false && isset($_POST['log'])){
                require "login.php";
                echo "<p>Les informations données ne sont pas valides</p>";
            }
            elseif ((!isset($userLogin) || !isset($passwordLogin) || !isset($_POST['passwordConfirm']) || !isset($mail)) && isset($_POST['sign'])){
                require "login.php";
                echo "<p>Erreur: Mauvaises informations communiquées lors de l'inscription</p>";
            }
            elseif ($userLogin == null || $passwordLogin == null){
                require "login.php";
            }
            ?>
        <?php
            if ($userLogin == $userVerif['username'] && password_verify($passwordLogin, $userVerif['password'])== true && isset($_POST['log'])){
                require "conversation.php";
            }
        ?>
    </body>
</html>
