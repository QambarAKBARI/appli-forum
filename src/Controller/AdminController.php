<?php
namespace App\Controller;

use App\Entity\Categorie;
use App\Service\Form;
use App\Service\Session;
use App\Manager\CategorieManager;
use App\Manager\SujetManager;
use App\Manager\MessageManager;

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


}