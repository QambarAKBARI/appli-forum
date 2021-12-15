<?php
namespace App\Manager;

class SujetManager extends AbstractManager {
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Sujet",
            "SELECT id, titre, verouillage, date_creation, categorie_id, user_id FROM sujet"
        );
    }


    public function findAllTopicsByCategorie($id)
    {
        return $this::getResults(
            "App\\Entity\\Sujet",
            "SELECT id, titre,date_creation,verouillage , categorie_id, user_id FROM sujet
            Where categorie_id = :id",
            [
                ":id" => $id
            ]
        ); 
    }


    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Sujet",
            "SELECT id, titre, verouillage, date_creation, categorie_id, user_id FROM sujet 
            WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function insertTheTopic($sujet, $user_id, $categorie_id ){

         $this->executeQuery(
            "INSERT INTO sujet (titre, user_id, categorie_id) VALUES (:t, :u, :s)",
            [
                ":t" => $sujet,
                ":u" => $user_id,
                ":s" => $categorie_id
            ]
        );
        return $this::getLastInsertId();
    }

    public function updateTopic($id){

        return $this::executeQuery(
            "UPDATE sujet 
            SET verouillage = :y
            WHERE id = :id",
            [
                ":id" => $id,
                ":y" => "yes",
            ]
        );
    }

    public function updateTopicToNo($id){

        return $this::executeQuery(
            "UPDATE sujet 
            SET verouillage = :y
            WHERE id = :id",
            [
                ":id" => $id,
                ":y" => "non",
            ]
        );
    }

    public function deleteTopic($id){
        return $this::executeQuery(
            "DELETE FROM sujet WHERE id = :id",
            [
                ':id' => $id 
            ]
        );
    }
}