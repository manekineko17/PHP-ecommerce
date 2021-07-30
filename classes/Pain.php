<?php
require_once('ProduitPerissable.php');

class Pain extends ProduitPerissable
{
    private int $poids;

    public function __construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $dlc, $poids)
    {
        parent::__construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $dlc);
        $this->setPoids($poids);
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function setPoids($lePoids)
    {
        $this->poids = $lePoids;
    }

    public function __toString()
    {
        return  '<br> Nom: ' . $this->nom .
            '<br>Libelle: ' . $this->libelle .
            '<br>Description: ' . $this->description .
            '<br>Marque: ' . $this->marque .
            '<br>Prix Unitaire: ' . $this->prixUnitaire .
            '<br>Quantité stock: ' . $this->qteStock .
            '<br>Référence produit: ' . $this->refProd .
            '<br>Dlc: ' . $this->dlc->format('d-m-Y') .
            '<br>Poids: ' . $this->poids . '<br>';
    }
}
