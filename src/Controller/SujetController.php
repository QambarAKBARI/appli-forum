<?php

namespace App\Controller;

use App\Entity\Sujet;
use App\Manager\SujetManager;
use App\Manager\MessageManager;
use App\Service\Session;
use App\Service\Form;

class SujetController extends AbstractController {

        public function index(){
            $smanager = new SujetManager;
            $sujets = $smanager->findAll();

            return $this->render("forum/home.php", [
                "sujets" => $sujets
            ]);
        }


        public function sujet($id){
            $smanager = new SujetManager;
            $sujet = $smanager->findAllTopicsByCategorie($id);

            return $this->render("forum/sujet.php", [
                "sujet" => $sujet,
                "categorie_id" => $id
            ]);
        }


        public function addSujet($id){
            $userId = Session::get("user")->getId();
            
            
            if(Form::isSubmitted()){
                $sujet = Form::getData("sujet", "text");
                if($sujet){
                    $manager = new SujetManager;
                    if($manager->insertTheTopic($sujet, $userId, $id)){
                        $this->addFlash("success", "Votre sujet a bien été ajouté !!");
                        $this->redirect("?ctrl=sujet&action=sujet&id=$id");
                    }else $this->addFlash("error", "Problème de connexion de BDD !!!"); 
                }else $this->addFlash("notice", "Veuillez écrire votre sujet !!");

            }else{ 
                $this->addFlash("notice", "Veuillez Valider votre sujet !!");
                return $this->render("forum/sujet.php");
            }
        
            return $this->render("forum/sujet.php");

        }

        public function verrouiller($id){

            $manager = new SujetManager;

            if($manager->updateTopic($id)){
                $this->addFlash("success", "Votre sujet est bien verrouillé maintenant !!!");
                $this->redirect("?ctrl=sujet&action=sujet&id=$id");
            }else{
                $this->addFlash("error", "Erreur BDD !!!");
                $this->redirect("?ctrl=sujet&action=sujet");
            }
            return $this->render("forum/sujet.php");
        }

        public function ouvrir($id){

            $manager = new SujetManager;

            if($manager->updateTopicToNo($id)){
                $this->addFlash("success", "Votre sujet est bien ouvert maintenant !!!");
                $this->redirect("?ctrl=sujet&action=sujet&id=$id");
            }else{
                $this->addFlash("error", "Erreur BDD !!!");
                $this->redirect("?ctrl=sujet&action=sujet");
            }
            return $this->render("forum/sujet.php");
        }
    }