<?php
abstract class Produit
{
    public function __construct(
        protected ?int $id,
        protected string $nom,
        protected string $libelle,
        protected string $description,
        protected string $marque,
        protected float $prixUnitaire,
        protected int $qteStock,
        protected ?int $refProd,
        protected string $urlImg
    ) {}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;
    }

    public function getQteStock()
    {
        return $this->qteStock;
    }

    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;
    }

    public function getRefProd()
    {
        return $this->refProd;
    }

    public function setRefProd($refProd)
    {
        $this->refProd = $refProd;
    }

    public function getUrlImg()
    {
        return $this->urlImg;
    }

    public function setUrlImg($urlImg)
    {
        $this->urlImg = $urlImg;
    }
}
