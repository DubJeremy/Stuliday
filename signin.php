<?php require 'nav.php' ?>
    <body>
            <section id="login_sigin">
                <div>
                    <h2>
                            Inscription
                    </h2>
                    <form method="post" action="#">
                        <div>
                            <label for="InputEmail1">Adresse mail</label>
                            <input type="email"  id="InputEmail1" name="email_signup" required>
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que
                                ce soit.
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="InputUsername1">Nom d'utilisateur</label>
                            <input type="text" id="InputUsername1"
                            name="username_signup" required>
                            <small>
                                Choisissez un nom d'utilisateur, il doit être unique
                                !
                            </small>
                        </div>
                        <div>
                            <label for="InputPassword1">Choisissez un mot de passe</label>
                            <input type="password" name="password1_signup" required>
                        </div>
                        <div>
                            <label for="InputPassword2">Entrez votre mot de passe de nouveau</label>
                            <input type="password" name="password2_signup" required>
                        </div>
                        <div id="check">
                            <input type="checkbox">
                            <label for="Check1">Accepter les <a href="#">termes et conditions</a></label>
                        </div>
                        <div>
                            <button type="submit" name="submit_signup" value="inscription">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                    <div class="already">
                        <p>
                            Déja inscrits ? <a href="./login.php">
                            Connectez-vous ici </a>
                        </p>
                    </div>
                </div>
            </section>

        <script src="assets/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>  
    </body>
</html>