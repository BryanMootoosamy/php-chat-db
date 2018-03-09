<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=thanatchat', 'root', 'ananas');
    } catch (Exception $e) {
        echo "Erreur: $e".$e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="10">
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>
        <?php
            $recupMsg = $db->query("select users.username, messages.user_id, messages.id, messages.messages from messages inner join users on messages.user_id = users.id order by messages.id asc");
            $recup = $recupMsg->fetchAll();
            for($i = 0; $i < count($recup); $i++){
                echo "<p>".$recup[$i]['username']." a écrit:</p><br/>";
                echo "<p>".$recup[$i]['messages']."</p>";
            }
        ?>
    </body>
</html>
