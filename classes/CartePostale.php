<?php
require_once('Produit.php');
require_once('Auteur.php');

class CartePostale extends Produit
{
    private string $typeCP;
    private array $auteurs;

    public function __construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $typeCP, $auteurs)
    {
        parent::__construct($id, $nom, $libelle, $description, $marque, $prixUnitaire, $qteStock, $refProd, $urlImg, $auteurs);
        $this->setTypeCP($typeCP);
        $this->setAuteurs($auteurs);
    }

    public function getAuteurs()
    {
        return $this->auteurs;
    }

    public function setAuteurs($auteurs)
    {
        $this->auteurs = $auteurs;
    }

    public function getTypeCP()
    {
        return $this->typeCP;
    }

    public function setTypeCP($leTypeCP)
    {
        $this->typeCP = $leTypeCP;
    }

    public function __toString()
    {
        return  'Nom: ' . $this->nom .
            '<br>Libelle: ' . $this->libelle .
            '<br>Description: ' . $this->description .
            '<br>Marque: ' . $this->marque .
            '<br>Prix Unitaire: ' . $this->prixUnitaire .
            '<br>Quantité stock: ' . $this->qteStock .
            '<br>Référence produit: ' . $this->refProd .
            '<br>Type de carte postale: ' . $this->typeCP . '<br' .
            '<br>Le nombre d\'auteurs: ' . count($this->auteurs);
    }
}
