<?php
namespace App\Manager;

class CategorieManager extends AbstractManager 
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\Categorie",
            "SELECT * FROM categorie"
        );
    }

    public function findAllTopicsByCategorie($id)
    {
        return $this::getResults(
            "App\\Entity\\Categorie",
            "SELECT titre, s.id AS suj, c.id AS id FROM sujet s
            INNER JOIN categorie c ON c.id = s.categorie_id
            Where id = :id",
            [
                ":id" => $id
            ]
        ); 
    }


    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\Categorie",
            "SELECT * FROM categorie WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }
}