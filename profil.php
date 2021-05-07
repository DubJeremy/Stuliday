<?php $page = 'Profil';
require 'nav.php' ?>
<?php

if (!empty($_SESSION['id'])) 
{

    $user_id = $_SESSION['id'];

    $sqlUser = "SELECT * FROM users WHERE id = '{$user_id}'";

    $resultUser = $connect->query($sqlUser);

    if ($user = $resultUser->fetch(PDO::FETCH_ASSOC)) 
    {
        $sqlBiens = "SELECT b.*, c.name_category, u.username
        FROM biens AS b
        LEFT JOIN users AS u ON b.author = u.id 
        LEFT JOIN categories AS c ON b.category = c.id
        WHERE b.author = {$user_id}";

        $biens = $connect->query($sqlBiens)->fetchAll(PDO::FETCH_ASSOC);
?>


    <body>
        <section id="profil">
            <h2>
                Bonjour <?php echo $user['username'];?>! 
                <?php
            
                if ($user['name_role_id'] == 1) 
                {
                    echo '<a href="admin.php">Page Admin</a>';
                }   
                ?>
            </h2>
            <h3>Vos annonces:</h3>
            <div class="sheetrow">
            <?php
            foreach ($biens as $bien)
            {
            ?>
                <div class="aptsheet">
                    <div class="image">
                        <?php if (is_null($bien['image']) || empty($bien['image']))
                            {
                        echo "<img src='assets/images/noimage.jpg' alt='product_image'/> ";
                        } else {
                        ?>
                            <img src="assets/images/<?php echo $bien['image']; ?>" alt='<?php echo $bien['name_category']; ?>' />
                        <?php
                        }
                        ?>
                    </div>
                    <h3>
                        <?php echo $bien['name_category']; ?>
                        <form action="delete.php" method="POST" class="supp_ad">
                            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                            <input type="hidden" name="id" value="<?php echo $bien['id'] ?>">
                            <input type="hidden" name="table" value="biens">
                            <input type="submit" value="Supprimer" name="delete">
                        </form>
                    </h3>
                    <p class="prix">
                        <?php echo $bien['price']; ?>€/nuit
                    </p>
                    <p>
                            <?php echo $bien['adresse']; ?>
                    </p>
                    <div>         
                        <a href="propertyad.php?id=<?php echo $bien['id']; ?>">
                            annonce
                        </a>
                        <a href="editpropertyad.php?id=<?php echo $bien['id']; ?>">
                            modifier
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
            <div id="btnajoutannonce">
                <a href="newad.php">Ajouter une annonce</a>
            </div>
    <?php
    }
    ?>
        </section>

        <script src="assets/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>  
    </body>
</html>

<?php
}
?>