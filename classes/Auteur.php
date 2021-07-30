<?php

class Auteur
{
    private int $id;
    private string $nom;
    private string $prenom;

    public function __construct($id, $nom, $prenom)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($leId)
    {
        $this->id = $leId;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($leNom)
    {
        $this->nom = $leNom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($lePrenom)
    {
        $this->prenom = $lePrenom;
    }

    public function __toString()
    {
        return "L'auteur est " . $this->nom . " " . $this->prenom . ".<br>";
    }
}
