<?php
namespace App\Controller;

use App\Service\Form;
use App\Service\Session;
use App\Manager\UserManager;
use App\Manager\CategorieManager;

class SecurityController extends AbstractController
{

    public function index()
    {
        $cmanager = new CategorieManager;
        $categories = $cmanager->findAll();

        return $this->render("security/home.php", [
            "categories" => $categories
        ]);
    }


    public function login()
    {
        if(Form::isSubmitted()){
            $credentials = Form::getData("credentials", "text");
            $password = Form::getData("password", "text");

            if($credentials && $password){
                $manager = new UserManager();
                if(($user = $manager->findByUsernameOrEmail($credentials, $credentials))
                    && password_verify($password, $user->getPass())){
                    if($user->getStatus() !== "ban"){
                        Session::set("user", $user);
                        $this->addFlash("success", "Bienvenue ".$user->getPseudo());
                        return $this->redirect("?ctrl=forum&action=index");
                    }else{
                        $this->addFlash("error", "Vous êtes banni de forum !!");
                        return $this->redirect("?ctrl=security&action=register");
                    }
                }
                else $this->addFlash("error", "Mauvais identifiants ou mot de passe, réessayez !");
            }
            else $this->addFlash("error", "Tous les champs doivent être remplis !");
        }
        return $this->render("security/login.php");
    }

    public function logout()
    {
        if(!$this->isGranted("ROLE_USER") && !$this->isGranted("ROLE_ADMIN") && !$this->isGranted("SUPER_ADMIN")) return false;
        
        Session::remove("user");
        $this->addFlash("success", "A bientôt !");
        return $this->redirect("?ctrl=security&action=login");
    }

    public function register()
    {
        if(Form::isSubmitted()){

            $username = Form::getData("username", "regex", [
                "options" => [
                    "regexp" => "/^[A-Za-z0-9]{4,50}$/"
                ]
            ]);
            $email = Form::getData("email", "email");
            $pass1 = Form::getData("pass1", "regex", [
                "options" => [
                    "regexp" => "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/"
                ]
            ]);
            $pass2 = Form::getData("pass2");

            if($username && $email && $pass1){
                if($pass1 === $pass2){

                    $manager = new UserManager();

                    if(!$manager->findByUsernameOrEmail($username, $email)){

                        $hash = password_hash($pass1, PASSWORD_ARGON2ID);

                        if($manager->insertUser($username, $email, $hash)){
                            $this->addFlash("success", "CA Y EST !!! T'es inscrit !!!");
                            return $this->redirect("?ctrl=security&action=login");
                        }
                        else $this->addFlash("error", "erreur de BDD");
                    }
                    else $this->addFlash("error", "Un utilisateur possède déjà cet email ou ce pseudo...");
                }
                else $this->addFlash("error", "pas les mm mots de passe");
            }
            else $this->addFlash("error", "passe pas les filtres");
        }
        
        return $this->render("security/register.php");
    }

}