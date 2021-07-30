<?php
require_once('../classes/Achat.php');
require_once('../dto/DTOProduit.php');

session_start();

$idProduit = $_GET['idProd'] ?? null; //si $get existe il récupère idprod, sinon il devient null, pour éviter les messages d'erreurs disant que la variable est non définie
$qtProduit = $_GET['qte'] ?? null;

if ($idProduit && $qtProduit) {
    if (!isset($_SESSION['panier'])) {
        $ligne = new Ligne(DTOProduit::selectById($idProduit), $qtProduit);
        $_SESSION['panier'] = new Achat($ligne);
    } else {
        $_SESSION['panier']->ajouteLigne(DTOProduit::selectById($idProduit), $qtProduit);
    }
}
?>

<head>
    <meta charset="utf-8">
    <title>Panier</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once('header.php');
    ?>
    <div class="container text-center">
        <h1 class="my-5text-uppercase ">Panier</h1>
        <table class="table table-dark table-hover ">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tabLignes = $_SESSION['panier']->getLignes();
                
                foreach ($tabLignes as $key => $ligne) {
                ?>
                <tr>
                    <th scope="row"><?= $ligne->getProduit()->getNom(); ?></th>
                    <td><?= $ligne->getProduit()->getPrixUnitaire(); ?></td>
                    <td><?= $ligne->getQte(); ?></td>
                    <td><?= $ligne->getMontant().' €'; ?></td>
                    <form action="panier.php" method="POST">
                        <td>
                            <input type="submit" name="delete" class="btn btn-outline-light my-1" value="X">
                            <input type="hidden" name="key" value="<?= $key; ?>">
                        </td>
                    </form>
                </tr>
                <?php
                }

                if(isset($_POST['delete'])) {
                    $_SESSION['panier']->supprimeLigne($_POST['key']);
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total Panier</td>
                    <td><?= $_SESSION['panier']->getMontant().' €'; ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>