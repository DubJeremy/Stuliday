<?php require 'nav.php' ?>
<?php
$alert = false;

if (!empty($_POST['email_login']) && !empty($_POST['password_login']) && isset($_POST['submit_login'])) {
    $email = htmlspecialchars($_POST['email_login']);
    $password = htmlspecialchars($_POST['password_login']);
    try {
        $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
        $resultMail = $connect->query($sqlMail);
        $user = $resultMail->fetch(PDO::FETCH_ASSOC);
        // var_dump($user);
        if ($user) {
            $dbpassword = $user['password'];
            if (password_verify($password, $dbpassword)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $alert = true;
                $type = 'success';
                $message = "Vous êtes désormais connectés";
                unset($_POST);
                header('Location: profile.php');
            } else {
                $alert = true;
                $type = 'danger';
                $message = "Le mot de passe est erroné";
                unset($_POST);
            }
        } else {
            $alert = true;
            $type = 'warning';
            $message = "Ce compte n'existe pas";
            unset($_POST);
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>
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