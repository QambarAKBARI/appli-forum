<?php
namespace App\Manager;

class MessageManager extends AbstractManager {
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Message",
            "SELECT id, text, date_creation, user_id, sujet_id FROM message"
        );
    }


    public function findAllMessagesByTopic($id)
    {
        return $this::getResults(
            "App\\Entity\\Message",
            "SELECT id, text,date_creation, sujet_id, user_id FROM message
            Where sujet_id = :id",
            [
                ":id" => $id
            ]
        ); 
    }


    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Sujet",
            "SELECT titre, s.id, c.id AS id FROM sujet s
            INNER JOIN categorie c ON c.id  = s.categorie_id 
            WHERE c.id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function insertTheMassage($text, $user_id, $sujet_id ){

        return $this->executeQuery(
            "INSERT INTO message (text, user_id, sujet_id) VALUES (:t, :u, :s)",
            [
                ":t" => $text,
                ":u" => $user_id,
                ":s" => $sujet_id
            ]
        );
    }
}