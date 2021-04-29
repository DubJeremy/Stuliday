<?php require 'nav.php' ?>
    <body>
            <section id="login_sigin">
                <div>
                    <h2>
                        Connexion
                    </h2>
                    <form
                    action="#"
                    method="POST">
                    <div>
                        <label for="InputEmail1">Adresse mail</label>
                        <input type="email"
                        name="email_login" required>
                    </div>
                    <div>
                        <label for="InputPassword1">Entrez votre mot de passe</label>
                        <input type="password" name="password_login" required>
                    </div>
                    <div>
                        <button type="submit" name="submit_login" value="connexion">
                            Se connecter
                        </button>
                    </div>
                </form>
                <div class="already">
                    <p>
                        Vous ne possédez pas de compte ? <a href="signin.php">Inscrivez-vous ici </a>
                    </p>
                </div>
            </section>

        <script src="assets/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>  
    </body>
</html>