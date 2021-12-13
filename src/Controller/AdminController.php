<?php
namespace App\Controller;

use App\Entity\Categorie;
use App\Service\Form;
use App\Service\Session;
use App\Manager\CategorieManager;
use App\Manager\SujetManager;
use App\Manager\MessageManager;
use App\Manager\UserManager;

class AdminController extends AbstractController
{
    //?ctrl=admin&action=index
    public function index()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        $cmanager = new CategorieManager();

        $categories = $cmanager->findAll();

        return $this->render("admin/home.php", [
            "categories" => $categories
        ]);
    }

    public function addCategorie(){        
        
        if(Form::isSubmitted()){
            $categorie = Form::getData("categorie", "text");
            if($categorie){
                $manager = new CategorieManager;
                if($manager->insertThaCategory($categorie)){
                    $this->addFlash("success", "Votre categorie a bien été ajouté !!");
                    $this->redirect("?ctrl=admin");
                }else $this->addFlash("error", "Problème de connexion de BDD !!!"); 
            }else $this->addFlash("notice", "Veuillez écrire votre sujet !!");

        }else $this->addFlash("notice", "Veuillez Valider votre sujet !!");
        return $this->render("admin/index.php");

    }


    public function addAdmin($id){

        $manager = new UserManager;

        if($manager->addAdmin($id)){
            $this->addFlash("success", "Cet utilisateur est devenu Admin maintenant !!!");
            $this->redirect("?ctrl=forum&action=users");
        }else{
            $this->addFlash("error", "Erreur BDD !!!");
            $this->redirect("?ctrl=forum&action=index");
        }
    }

    public function banUser($id){

        $manager = new UserManager;
        if(Session::get("user")->getRole() !== "SUPER_ADMIN"){

            if($manager->banUser($id)){
                $this->addFlash("success", "Cet utilisateur a été banni !!!");
                $this->redirect("?ctrl=forum&action=users");
            }else{
                $this->addFlash("error", "Erreur BDD !!!");
                $this->redirect("?ctrl=forum&action=index");
            }
        }else{
            $this->addFlash("error", "Vous ne pouvez pas bannir SUPER_ADMIN");
            $this->redirect("?ctrl=forum&action=users");
        } 

    }

    public function banAdmin($id){

        $manager = new UserManager;
        if(!Session::get("user")->getRole() == "SUPER_ADMIN"){
            if($manager->banAdmin($id)){
                $this->addFlash("success", "Cet Admin devient un membre !!!");
                $this->redirect("?ctrl=forum&action=users");
            }else{
                $this->addFlash("error", "Erreur BDD !!!");
                $this->redirect("?ctrl=forum&action=index");
            }
        }else{
            $this->addFlash("error", "Vous ne pouvez pas bannir SUPER_ADMIN");
            $this->redirect("?ctrl=forum&action=users");
        } 

    }




}