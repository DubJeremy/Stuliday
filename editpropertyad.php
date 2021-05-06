<?php $page ="editpropertyad";
require 'nav.php'; ?>
<?php

$id = $_GET['id'];

$sqlBiens = "SELECT b.*, u.username, c.name_category FROM biens AS b
LEFT JOIN users AS u ON b.author = u.id
LEFT JOIN categories AS c ON b.category = c.id
WHERE b.id = {$id}";

$biens = $connect->query($sqlBiens)->fetch(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------
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
            $sth = $connect->prepare("UPDATE biens as b
            SET
            adresse=:adresse, title=:title, description=:description, price=:price, category=:category
            WHERE b.id = :id");

            $sth->bindValue(':adresse', $adress);
            $sth->bindValue(':title', $title);
            $sth->bindValue(':description', $description);
            $sth->bindValue(':price', $price);
            $sth->bindValue(':category', $category);
            $sth->bindValue(':id', $id);

            $sth->execute();

            echo "Votre article a bien été modifié";

            header('Location: property.php?id=' . $id);

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
                        Modification
                </h2>
                <form action="#" method="POST">
                    <div>
                        <label for="InputAdress">Adresse du bien</label>
                        <input type="text" id="InputAdress" name="adresse" value='<?php echo $biens['adresse']; ?>' required>
                    </div>
                    <div>
                        <label for="InputTitle">Titre de l'annonce</label>
                        <input type="text" id="Inuputtitle" maxlength="60" name="title" value="<?php echo $biens['title']; ?>" required>
                    </div>
                    <div>
                        <label for="InputDescription">Description</label>
                        <textarea id="InputDescription" rows="3" name="description" required><?php echo $biens['description']; ?></textarea>
                    </div>
                    <div>
                        <label for="InputPrice">Prix /nuit</label>
                        <input type="number" min="1" max="999999" id="InputPrice" placeholder="Prix de votre bien /nuit en €" name="price" value="<?php echo $biens['price']; ?>"" required>
                    </div>
                    <div>
                        <label for="InputCategory">Catégorie</label>
                        <select name="category" required>
                            <?php
                            foreach ($categories as $category) {
                                
                            ?>
                                <option <?php echo $category['id'] === $biens['category'] ? 'selected' : ''; ?> value="<?php echo $category['id']; ?>">
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
