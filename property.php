<?php require 'nav.php' ?>
<?php

$sqlBiens = "SELECT b.*, c.name_category FROM biens AS b LEFT JOIN categories AS c ON b.category = c.name_category";

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
                        <img src="assets/images/apt.jpg" alt="apartment">
                        <h3><?php echo $bien['category']; ?></h3>
                        <p>
                            <?php echo $bien['price']; ?>€/nuit
                        </p>
                        <p>
                            <?php echo $bien['description']; ?>
                        </p>         
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