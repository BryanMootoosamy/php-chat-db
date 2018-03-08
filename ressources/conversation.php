<?php
    $last = $db->query("select messages from messages inner join users on messages.user_id = users.id where messages.id = (select MAX(id) from messages) and users.username = '".$_SESSION['user']."' ");
    $lastMessage = $last->fetch();
    if(isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['sendMessage']) && $_POST['message'] != $lastMessage['messages']){
        $messageRaw = attribution($_POST['message']);
        $message = filter_var($messageRaw, FILTER_SANITIZE_STRING);
        $db->exec("insert into messages (messages, user_id) values ('$message', (select ID from users where username = '".$_SESSION['user']."'))");
    }
?>


<form class="message" action="index.php" method="post">
    <?php require "affichageMessage.php"; ?>
    <textarea name="message" rows="8" cols="80" placeholder="Tapez votre message ici." maxlength="500"></textarea>
    <button type="send" name="sendMessage">Envoyer</button>
</form>
<form class="logout" action="index.php" method="post">
    <button type="send" name="logout">Se déconnecter</button>
</form>
