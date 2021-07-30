<?php
require_once('Produit.php');

class Ligne
{
    public function __construct(
        private Produit $produit,
        private int $quantite
    ) {
    }

    public function getProduit()
    {
        return $this->produit;
    }

    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    public function getQte()
    {
        return $this->quantite;
    }

    public function setQte($quantite)
    {
        $this->quantite = $quantite;
    }

    public function getMontant() //prix de la ligne
    {
        return $this->produit->getPrixUnitaire() * $this->quantite;
    }

    public function __toString()
    {
        return  'Produit: ' . $this->produit .
            '<br>Quantité: ' . $this->quantite .
            '<br>Prix total: ' . $this->getMontant() . '<br>';
    }
}
