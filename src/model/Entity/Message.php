<?php

namespace App\Entity;

class Message extends AbstractEntity{

    private $id;
    private $text;
    private $date_creation;
    protected $user;
    protected $sujet;

    /**
     * Get the value of sujet
     */ 
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->date_creation;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }
}