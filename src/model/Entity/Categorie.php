<?php

namespace App\Entity;

class Categorie extends AbstractEntity{
    private $id;
    private $nom_categorie;


    /**
     * Get the value of nom_categorie
     */ 
    public function getNom_categorie()
    {
        return $this->nom_categorie;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}