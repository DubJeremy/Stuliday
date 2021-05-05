<?php require 'nav.php' ?>
<?php

$sqlCategory = 'SELECT * FROM categories';

$categories = $connect->query($sqlCategory)->fetchAll();

if (isset($_POST['ad_submit']) && !empty($_POST['adresse']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['category'])) {

    $adress = strip_tags($_POST['adresse']);
    $title = strip_tags($_POST['title']);
    $description = strip_tags($_POST['description']);
    $price = intval(strip_tags($_POST['price']));
    $category = strip_tags($_POST['category']);
    $user_id = $_SESSION['id'];

    if (is_int($price) && $price > 0) {

        try {
            $sth = $connect->prepare("INSERT INTO biens
            (adresse, title, description, price, author, category)
            VALUES
            (:adresse, :title,:description,:price, :author, :category)");
            $sth->bindValue(':adresse', $adress);
            $sth->bindValue(':title', $title);
            $sth->bindValue(':description', $description);
            $sth->bindValue(':price', $price);
            $sth->bindValue(':author', $user_id);
            $sth->bindValue(':category', $category);

            $sth->execute();

            echo "Votre article a bien été ajouté";

            header('Location: profil.php');
        } catch (PDOException $error) {
            echo 'Erreur: ' . $error->getMessage();
        }
    }
}
?>

    <body>
        <section id="login_sigin">
            <div>
                <h2>
                        Nouvelle annonce
                </h2>
                <form action="#" method="POST">
                    <div>
                        <label for="InputAdress">Adresse du bien</label>
                        <input type="text" id="InputAdress" name="adresse" required>
                    </div>
                    <div>
                        <label for="InputTitle">Titre de l'annonce</label>
                        <input type="text" id="Inuputtitle" maxlength="60" name="title" required>
                    </div>
                    <div>
                        <label for="InputDescription">Description</label>
                        <textarea id="InputDescription" rows="3" name="description" required></textarea>
                    </div>
                    <div>
                        <label for="InputPrice">Prix /nuit</label>
                        <input type="number" min="1" max="999999" id="InputPrice" placeholder="Prix de votre bien /nuit en €" name="price" required>
                    </div>
                    <div>
                        <label for="InputCategory">Catégorie</label>
                        <select name="category" required>
                            <option value="" disabled selected>
                                Select your option
                            </option>
                            <?php
                            foreach ($categories as $category) {
                            ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo $category['name_category']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label id="btnpicture" for="picture">Choisissez une photo de votre bien</label>
                        <input type="file"
                            id="picture" name="picture"
                            accept="image/png, image/jpeg">
                    </div>
                    <div>
                        <button type="submit" name="ad_submit">
                            Publier
                        </button> 
                    </div>
                </form>
            </div>
        </section>
    </body>
