<?php require 'nav.php' ?>
<?php

$id = $_GET['id'];

$sqlBiens = "SELECT b.*, u.username, c.name_category, u.email FROM biens AS b 
LEFT JOIN users AS u ON b.author = u.id 
LEFT JOIN categories AS c ON b.category = c.id WHERE b.id = {$id} ";

$bien = $connect->query($sqlBiens)->fetch(PDO::FETCH_ASSOC);


?>
    <body>
            <section id='productsheet'>
                <img src="assets/images/apt1.jpg" alt="appartment">
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