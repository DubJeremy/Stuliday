<?php $page ="singin";
require 'nav.php' ?>
<?php
if (!empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['password2_signup']) && !empty($_POST['username_signup']) &&  isset($_POST['submit_signup'])) 
{
    $email = htmlspecialchars($_POST['email_signup']);
    $password1 = htmlspecialchars($_POST['password1_signup']);
    $password2 = htmlspecialchars($_POST['password2_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    try {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
            $resultMail = $connect->query($sqlMail);
            $countMail = $resultMail->fetchColumn();
            if (!$countMail) {
                $sqlUsername = "SELECT * FROM users WHERE username = '{$username}'";
                $resultUsername = $connect->query($sqlUsername);
                $countUsername = $resultUsername->fetchColumn();
                if (!$countUsername) {
                    if ($password1 === $password2) {
                        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                        $sth = $connect->prepare("INSERT INTO users (email,username,password) VALUES (:email,:username,:password)");
                        $sth->bindValue(':email', $email);
                        $sth->bindValue(':username', $username);
                        $sth->bindValue(':password', $hashedPassword);
                        $sth->execute();
                        echo "L'utilisateur a bien été enregistré !";
                        header('Location: login.php');
                    } else {
                        echo "Les mots de passe ne sont pas concordants.";
                        unset($_POST);
                    }
                } else {
                    echo " Ce nom d'utilisateur existe déja";
                    unset($_POST);
                }
            } else {
                echo "Un compte existe déja pour cette adresse mail";
                unset($_POST);
            }
        } else {
            echo "L'adresse email saisie n'est pas valide";
            unset($_POST);
        }
    } catch (PDOException $error) 
    {
        echo 'Error: ' . $error->getMessage();
    }
}



?>
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
                        <div>
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