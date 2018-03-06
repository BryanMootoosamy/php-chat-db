<?php
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
        <?php require "login.php"; ?>
        <?php require "conversation.php"; ?>
    </body>
</html>
