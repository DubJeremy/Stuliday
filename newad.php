<?php require 'nav.php' ?>
    <body>
        <section id="login_sigin">
            <div>
                <h2>
                        Nouvelle annonce
                </h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="InputName">Adresse du bien</label>
                        <input type="text" class="form-control" id="InputName" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="InputName">Titre de l'annonce</label>
                        <input type="text" class="form-control" id="InputName" name="product_name" required>
                    </div>
                    <div>
                        <label for="InputDescription">Description</label>
                        <textarea id="InputDescription" rows="3" name="home_description" required></textarea>
                    </div>
                    <div>
                        <label for="InputPrice">Prix /nuit</label>
                        <input type="number" min="1" max="999999" class="form-control" id="InputPrice" placeholder="Prix de votre bien /nuit en €" name="product_price" required>
                    </div>
                    <div class="form-group">
                        <label for="InputCategory">Catégorie</label>
                        <select class="form-control" name="product_category" required>
                        </select>
                    </div>
                    <div>
                        <label id="btnpicture" for="picture">Choisissez une photo de votre bien</label>
                        <input type="file"
                            id="picture" name="picture"
                            accept="image/png, image/jpeg">
                    </div>
                    <div>
                        <button type="submit" name="product_submit">
                            Publier
                        </button> 
                    </div>
                </form>
            </div>
        </section>
    </body>
