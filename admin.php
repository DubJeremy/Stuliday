<?php require 'nav.php'; ?>
<?php

if (!empty($_SESSION)) 
{
    $admin_id = $_SESSION['id'];
    $sqlAdmin = "SELECT * FROM users WHERE id = '{$admin_id}' AND name_role_id = '1'";

    $resultAdmin = $connect->query($sqlAdmin);

    if ($admin = $resultAdmin->fetch(PDO::FETCH_ASSOC)) 
    {
        $sqlUsers = "SELECT u.*, r.name_role FROM users AS u
        LEFT JOIN `role` AS r ON u.name_role_id = r.id
        WHERE u.id != '{$admin_id}'";

        $users = $connect->query($sqlUsers)->fetchAll(PDO::FETCH_ASSOC);

        $sqlBiens = "SELECT b.*, c.name_category, u.username FROM biens AS b 
        LEFT JOIN categories AS c ON b.category = c.id
        LEFT JOIN users AS u ON u.id = b.author";

        $biens = $connect->query($sqlBiens)->fetchAll(PDO::FETCH_ASSOC);
        //-----------------------------------------------------------------
        if (!empty($_POST['name_category']))
        {
            $category = htmlspecialchars($_POST['name_category']);

            try
            {
                $sqlCategories = "SELECT * FROM categories WHERE name_category = '{$category}'";
                $resultCategories = $connect->query($sqlCategories);
                $countCategories = $resultCategories->fetchColumn();

                if (!$countCategories)
                {
                    $sth = $connect->prepare("INSERT INTO categories (name_category)
                    VALUES
                    (:name_category)");

                    $sth->bindValue(':name_category', $category);

                    $sth->execute();

                    echo "Votre catégorie à bien été ajouté!";
                } else {
                    echo "Cette catégorie existe déjà.";
                    unset($_POST);
                }
                
            } catch (PDOException $error)
            {
                echo 'Erreur: ' . $error->getMessage();
            }
        }
?>

    <section id="admin">
        <form action="#" method="POST">
            <label for="categories">Nouvelle Catégorie</label>
            <input type="text" name="name_category" required>
            <button type="submit" name="category_submit">
                Ajouter
            </button>
        </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <th><?php echo $user['id'] ?></th>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['name_role'] ?></td>
                            <td>Supprimer</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
                        <th>titre</th>
                        <th>prix</th>
                        <th>Adresse</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($biens as $bien) {
                    ?>
                        <tr>
                            <th><?php echo $bien['id'] ?></th>
                            <td><?php echo $bien['username'] ?></td>
                            <td><?php echo $bien['name_category'] ?></td>
                            <td><?php echo $bien['title'] ?></td>
                            <td><?php echo $bien['price'] ?>€/nuit</td>
                            <td><?php echo $bien['adresse'] ?></td>
                            <td><a href="editpropertyad.php?id=<?php echo $bien['id']; ?>">
                            modifier
                            </a></td>
                            <td>Supprimer</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

<?php
    } else {
        echo "Cette page n'existe pas";
        echo "<a href='index.php'>Retourner à la page d'accueil</a>";
    }
} else {

    echo "Cette page n'existe pas";
    echo "<a href='index.php'>Retourner à la page d'accueil</a>";
}
?>
