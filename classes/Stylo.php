<?php
require_once('Produit.php');

class Stylo extends Produit
{
    public function __construct(
        $id,
        $nom,
        $libelle,
        $description,
        $marque,
        $prixUnitaire,
        $qteStock,
        $refProd,
        $urlImg,
        private string $couleur,
        private string $typeMine
    ) {
        parent::__construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg);
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function getTypeMine()
    {
        return $this->typeMine;
    }

    public function setTypeMine($typeMine)
    {
        $this->typeMine = $typeMine;
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
            '<br>Couleur: ' . $this->couleur .
            '<br>Type de mine: ' . $this->typeMine . '<br>' . '<br>';
    }
}
