<?php $page = 'property';
require 'nav.php'; ?>
<?php

$sqlBiens = "SELECT b.*, c.name_category FROM biens AS b LEFT JOIN categories AS c ON b.category = c.id";

$biens = $connect->query($sqlBiens)->fetchAll(PDO::FETCH_ASSOC);
?>

        <body>
            <section id="products">
                <h2>
                    Annonces
                </h2>
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
                        </h3>
                        <p class="prix">
                            <?php echo $bien['price']; ?>€/nuit
                        </p>
                        <h4>
                            <?php echo $bien['title']; ?>
                        </h4>         
                        <a href="propertyad.php?id=<?php echo $bien['id']; ?>">
                            annonce
                        </a>            
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
       
        <script src="assets/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>  
    </body>
</html>