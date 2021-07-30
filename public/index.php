<?php
require_once('../dto/DTOProduit.php');
$produits = DTOProduit::selectAll();
?>
​
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap');
        body{
            width: 100%;
            margin: 0 auto;
        }
        @media (max-width: 575.98px) 
        {
            a{
                text-decoration: none;
            }

            h5
            {
                font-size: 20px;  
                text-decoration: none;
                color: white; 
            }

            .price-nom
            {
                font-size: 30px;
            }
        }

        @media (max-width: 767.98px) 
        {
            a{
                text-decoration: none;
            }

            h5
            {
                font-size: 20px;
                text-decoration: none;
                color: white;   
            }

            .price-nom
            {
                font-size: 40px;
            }
            .test{
                color: green;
            }
        }

        @media (max-width: 991.98px) 
        {
            a{
                text-decoration: none;
            }

            h5
            {
                font-size: 15px; 
                text-decoration: none;
                color: white; 
            };

            .price-nom
            {
                font-size: 40px;
            }
        }

        @media (min-width: 992px) 
        {
            a{
                text-decoration: none;
            }
            
            h5
            {
              font-size: 16px;
              text-decoration: none;
              color: white;
            }

            .price-nom
            {
                font-size: 40px;
            }
        }
        .ligne{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .ligne2{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
        .panier{
            width: 10%;
            height: 10%;
        }
        .qty-line{
            width: 40%;
            margin-left: 10% ;
        }
        .qty{
            width: 50%;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
        }
        .link-savoir{
            width: 50%;
        }
    </style>
</head>
​
<body>
    <?php
        require_once('header.php');
    ?>
    <h1 class="my-5 text-uppercase text-center">Boutique Régionale</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($produits as $produit) {?>
                <div class="col-sm col-md col-lg">
                    <form action="panier.php" method="GET" name="form" class="card text-white bg-dark mb-3 mx-auto" style="width: 18rem;">
                    <a href="detail.php?idProd=<?= $produit->getId(); ?>"><img src="<?= $produit->getUrlImg() ?>" class="card-img-top" alt="..."></a>    
                        <div class="card-body">
                        <a href="detail.php?idProd=<?= $produit->getId(); ?>"><h5><?= $produit->getNom(); ?></h5></a>
                            <div class="ligne">
                                <div class="price-nom"><?= $produit->getPrixUnitaire() . ' €'; ?></div>
                                <div class="qty">
                                    <label for="qte">Quantité</label>
                                    <input class="qty-line" type="number" id="qte" name="qte" min="1" value="1">
                                </div>
                            </div>
                            <div class="ligne2">
                                <a class="link-savoir" href="detail.php?idProd=<?= $produit->getId(); ?>">En savoir +</a>
                                <input class="panier" type="image" src="img/shopping-cart-add-button-3.png" alt="Submit">
                                <input type="hidden" value="<?= $produit->getId(); ?>" name="idProd">
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>