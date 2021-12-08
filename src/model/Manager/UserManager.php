<?php
namespace App\Manager;

class UserManager extends AbstractManager 
{
    public function __construct()
    {
        parent::connect();
    }

    public function findAll()
    {
        return $this::getResults(
            "App\\Entity\\User",
            "SELECT * FROM user"
        );
    }

    public function findOneById($id)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\User",
            "SELECT * FROM user WHERE id = :id",
            [
                ":id" => $id
            ]
        );
    }

    public function findByUsernameOrEmail($username, $email)
    {
        return $this::getOneOrNullResult(
            "App\\Entity\\User",
            "SELECT * FROM user WHERE mail = :email OR pseudo = :username",
            [
                ":username" => $username,
                ":email"    => $email
            ]
        );
    }

    public function insertUser($username, $email, $hash)
    {
        return $this::executeQuery(
            "INSERT INTO user (pseudo, mail, pass) VALUES (:u, :e, :p)",
            [
                ":u" => $username,
                ":e" => $email,
                ":p" => $hash
            ]
        );
    }
}