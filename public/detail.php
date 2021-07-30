<?php 
require_once('../dto/DTOProduit.php');
?>

<head>
    <meta charset="utf-8">
    <title>Détail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap');
    </style>
</head>

<body>
    <?php
    require_once('header.php');
    ?>
    <div class="container text-center ">
        <div class="container">
            <h1 class="my-5 text-uppercase">Détail du produit</h1>
            <?php
            $idProduit = $_GET['idProd'] ?? null;
            $produit = DTOProduit::selectById($idProduit);
            ?>
            <div class="card bg-light mb-3 mx-auto" style="width: 18rem;">
                <img src="<?= $produit->getUrlImg() ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $produit->getNom(); ?></h5>
                    <h5 class="card-title"><?= $produit->getPrixUnitaire().' €'; ?></h5>
                    <p class="card-text"><?= $produit->getDescription(); ?></p>
                    <form action="panier.php" method="GET" name="form" class="card text-white bg-dark mb-3 mx-auto" style="width: 18rem;">   
                        <div class="ligne">
                            <div class="qty">
                                <label for="qte">Quantité</label>
                                <input class="qty-line" type="number" id="qte" name="qte" min="1" value="1">
                            </div>
                        </div>
                        <div class="ligne2">
                            <input class="panier" type="image" src="img/shopping-cart-add-button-3.png" alt="Submit">
                            <input type="hidden" value="<?= $produit->getId(); ?>" name="idProd">
                        </div>
                    </form>
                </div>
            </div>
            <a href="index.php" class="btn btn-dark">Précédent</a>
        </div>
    </div>
</body>