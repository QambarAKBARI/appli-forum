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