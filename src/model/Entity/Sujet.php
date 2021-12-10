<?php

namespace App\Entity;

class Sujet extends AbstractEntity{
    
    private $id;
    private $titre;
    private $verouillage;
    private $date_creation;
    protected $categorie;
    protected $user;




    /**
     * Get the value of user_id
     */ 
    public function getUser()
    {
        return ucfirst($this->user);
    }

    /**
     * Get the value of categorie_id
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Get the value of date_creation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Get the value of verouillage
     */ 
    public function getVerouillage()
    {
        return $this->verouillage;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}
