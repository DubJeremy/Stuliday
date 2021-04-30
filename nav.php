<?php require 'inc/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>Stuliday</title>
    </head>
    <body>
        <header>
            <nav id="nav">
                <h1><span>S</span>tuliday</h1>
                <div>
                    <ul>
                        <li>
                            <a href="index.php">Acceuil</a>
                        </li>
                        <li>
                            <a href="property.php">Biens</a>
                            <ul>
                                <li>
                                    <a href="">Catégorie 1</a>
                                </li>
                                <li>
                                    <a href="">Catégorie 2</a>
                                </li>
                                <li>
                                    <a href="">Catégorie 3</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        if (empty($_SESSION)) {
                        ?>
                            <li>
                                <p>
                                <a href="signin.php">Inscription</a>  / <a href="login.php">Connexion</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li>
                                <a href="profil.php"><i class="far fa-user-circle"></i></a>
                            </li>
                            <li>
                                <a class="deco" href="?logout">Se déconnecter</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <i id="burger" class="fas fa-bars"></i>
                </div>
            </nav>






        <script src="assets/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>  
    </body>
</html>