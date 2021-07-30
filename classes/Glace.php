<?php
require_once('ProduitPerissable.php');

class Glace extends ProduitPerissable
{
    private string $parfum;
    private int $tempConservation;

    public function __construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $dlc, $parfum, $tempConservation)
    {
        parent::__construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $dlc,);
        $this->setParfum($parfum);
        $this->setTempConservation($tempConservation);
    }

    public function getParfum()
    {
        return $this->parfum;
    }

    public function setParfum($leParfum)
    {
        $this->parfum = $leParfum;
    }

    public function getTempConservation()
    {
        return $this->tempConservation;
    }

    public function setTempConservation($leTempConservation)
    {
        $this->tempConservation = $leTempConservation;
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
            '<br>Parfum: ' . $this->parfum .
            '<br>Temps de conservation: ' . $this->tempConservation . '<br>' . '<br>';
    }
}
