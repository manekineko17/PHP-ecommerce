<?php
require_once('Produit.php');

abstract class ProduitPerissable extends Produit
{
    protected DateTime $dlc;

    public function __construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $dlc)
    {
        parent::__construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg);
        $this->setdlc($dlc);
    }

    protected function getDlc()
    {
        return $this->dlc;
    }

    protected function setDlc($ladlc)
    {
        $this->dlc = $ladlc;
    }
}
