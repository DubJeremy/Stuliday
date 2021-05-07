<?php $page ="propertyad";
require 'nav.php' ?>
<?php

$id = $_GET['id'];

$sqlBiens = "SELECT b.*, u.username, c.name_category, u.email FROM biens AS b 
LEFT JOIN users AS u ON b.author = u.id 
LEFT JOIN categories AS c ON b.category = c.id WHERE b.id = {$id} ";

$bien = $connect->query($sqlBiens)->fetch(PDO::FETCH_ASSOC);


?>
    <body>
            <section id='productsheet'>
                <div id="img">
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
                <h2><?php echo $bien['name_category']; ?></h2>
                <p class='prix'>
                    <?php echo $bien['price']; ?> €/nuit
                </p>
                <h4>
                    <?php echo $bien['title']; ?>
                </h4>
                <p>
                    <?php echo $bien['description']; ?>
                </p>
                <p class='adress'>
                    <?php echo $bien['adresse']; ?>
                </p>
                <a href="mailto: <?php echo $bien['email'] ?>">Contactez <?php echo $bien['username']; ?></a>        
            </section>

        <script src="assets/lib/jquery-3.6.0.min.js"></script>
        <script src="assets/js/script.js"></script>  
    </body>
</html>