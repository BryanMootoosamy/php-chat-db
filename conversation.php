<?php
    session_name($userLogin);
    session_start();
    if (isset($_POST['logout'])) {
        session_destroy();
    }
?>
<form class="message" action="index.php" method="post">
    <!-- messages -->
    <textarea name="message" rows="8" cols="80" placeholder="Tapez votre message ici." maxlength="500"></textarea>
    <button type="send" name="sendMessage">Envoyer</button>
</form>
<form class="logout" action="index.php" method="post">
    <button type="send" name="logout">Se déconnecter</button>
</form>
