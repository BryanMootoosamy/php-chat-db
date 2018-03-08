<?php
    $last = $db->query("select messages from messages inner join users on messages.user_id = users.id where messages.id = (select MAX(id) from messages) and users.username = '".$_SESSION['user']."' ");
    $lastMessage = $last->fetch();
    if(isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['sendMessage']) && $_POST['message'] != $lastMessage['messages']){
        $messageRaw = attribution($_POST['message']);
        $message = filter_var($messageRaw, FILTER_SANITIZE_STRING);
        $db->exec("insert into messages (messages, user_id) values ('$message', (select ID from users where username = '".$_SESSION['user']."'))");
    }
?>

<section class="window">
    <div class="convo">
        <form class="message" action="index.php" method="post">
            <?php require "affichageMessage.php"; ?>
            <textarea name="message" rows="8" cols="80" placeholder="Tapez votre message ici." maxlength="500"></textarea>
            <button type="send" name="sendMessage">Envoyer</button>
        </form>
        <form class="logout" action="index.php" method="post">
            <button type="send" name="logout">Se déconnecter</button>
        </form>
    </div>
    <div class="users">
        <?php
            $online = $db->query("select username from users where user_state = 2 order by username asc");
            $onlineTab = $online->fetchAll();
            $offline = $db->query("select username from users where user_state = 1 order by username asc");
            $offlineTab = $offline->fetchAll();
            echo "<ul>";
            for ($a=0; $a < count($onlineTab); $a++) {
                echo "<li class='online'>".$onlineTab[$a]['username']."</li>";
            }
            echo "</ul>";
            echo "<br/>";
            echo "<ul>";
            for ($p=0; $p < count($offlineTab); $p++) {
                echo "<li class='offline'>".$offlineTab[$p]['username']."</li>";
            }
            echo "</ul>";
        ?>
    </div>
</section>
