<?php

namespace App\Entity;

class User extends AbstractEntity
{

    private $id;
    private $mail;
    private $pseudo;
    private $pass;
    private $date_inscription;
    private $role;




    /**
     * Get the value of date_inscription
     */ 
    public function getDate_inscription()
    {
        return $this->date_inscription;
    }


    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }


    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }






    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    public function __toString()
    {
        return $this->pseudo;
    }
}