<section class="login" >
    <h1>Bienvenue sur ThanaTchat!</h1>
    <?php
    if (isset($error)) {
        if ($error == true) {
            echo "<p class = 'error'> Ce compte existe déjà !</p>";
        }
    }
    elseif (isset($logout)) {
        if ($logout == true) {
            echo "<p class = 'deco'>Vous vous êtes bien déconnecté ! A bientôt !</p>";
        }
    }
    elseif (isset($falseCo)) {
        if ($falseCo == true) {
            echo "<p class = 'error'>Vos informations de connexion sont incorrectes</p>";
        }
    }
    ?>
    <div class="title">
        <section class="signIn">
            <form class="in" action="index.php" method="post">
                <h2>Connectez-vous !</h2>
                <p>Adresse mail:</p><input type="email" name="email" value="">
                <p>Mot de passe:</p><input type="password" name="password" value=""><br/>
                <button type="send" name="log">Se connecter</button>
            </form>
        </section>
        <section class="signUp">
            <form class="up" action="index.php" method="post">
                <h2>Pas encore de compte ? Enregistrez-vous !</h2>
                <p>Nom d'utilisateur:</p><input type="text" name="usernameSet" value="">
                <p>Mot de passe:</p><input type="password" name="passwordSet" value="">
                <p>Confirmez votre mot de passe:</p><input type="password" name="passwordConfirm" value="">
                <p>E-mail:</p><input type="email" name="mail" value=""><br/>
                <button type="send" name="sign">S'enregistrer</button>
            </form>
        </section>
    </div>
</section>
