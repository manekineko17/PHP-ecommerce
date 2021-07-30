<?php
require_once('Ligne.php');

class Achat //panier
{
    private array $tabLignes; //tableau panier
    private float $montant;

    public function __construct($ligne)
    {
        $this->tabLignes[] = $ligne;
    }

    public function __destruct()
    {
        $this->calculMontant();
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getLigne($index)
    {
        return $this->tabLignes[$index]; //retourne une ligne grace à son index
    }

    public function getLignes()
    {
        return $this->tabLignes; //retourne toutes les lignes du tableau
    }

    public function ajouteLigne($produit, $qte)
    {
        $ligne = new Ligne($produit, $qte);
        array_push($this->tabLignes, $ligne); //ajout de ligne(s) au tableau
    }

    public function modifieLigne($index, $newQte)
    {
        $this->tabLignes[$index]->setQte($newQte);
        //setQte provenant de la classe Ligne
        //maj de la quantité de la ligne choisie
    }

    public function supprimeLigne($index)
    {
        unset($this->tabLignes[$index]); //supprime une ligne grace à son index
    }

    private function calculMontant()
    {
        $this->montant = 0; //initialise total à 0
        //as line : représente chaque élément de mon tableau
        foreach ($this->tabLignes as $ligne) {
            //getPrix provient de la classe Ligne
            $this->montant += $ligne->getMontant(); //total cumulé de chaque ligne(s)
        }
    }

    public function setMontant($leMontant) //modifie le montant
    {
        $this->montant = $leMontant;
    }

    public function __toString()
    {
        $phrase = 'panier :';

        foreach ($this->tabLignes as $ligne) {
            $phrase = $phrase . ' ' . ' <br> Nom produit: ' . $ligne->getProduit()->getNom() . ' <br> Quantité :' . $ligne->getQte() . ' <br> Total :' . $ligne->getMontant() . '<br> ';
        }
        return  $phrase;
    }
}
