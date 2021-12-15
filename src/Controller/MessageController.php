<?php

namespace App\Controller;

use App\Entity\Message;
use App\Manager\MessageManager;
use App\Manager\SujetManager;
use App\Service\Session;
use App\Service\Form;

class MessageController extends AbstractController {


        
        public function message($id){
            $mmanager = new MessageManager;
            $message = $mmanager->findAllMessagesByTopic($id);

            return $this->render("forum/message.php", [
                "message" => $message,
                "sujet_id" => $id
            ]);
        }


        public function addMessage($id){
            $userId = Session::get("user")->getId();
            
            if(Form::isSubmitted()){
                $text = Form::getData("message", "text");
                if($text){
                    $manager = new MessageManager;
                    $smanager = new SujetManager;
                    var_dump($manager);
                    var_dump($smanager);
                    die;
                    if($newMessage = $manager->insertTheMassage($text, $userId, $id)){

                        $this->addFlash("success", "Votre message a bien été envoyé !!");
                        $this->redirect("?ctrl=message&action=message&id=$id");
                    }else $this->addFlash("error", "Problème de connexion de BDD !!!"); 
                }else $this->addFlash("notice", "Veuillez écrire votre message !!");

            }else $this->addFlash("notice", "Veuillez Valider votre message !!");
            
            return $this->render("forum/message.php");

        }

        public function deleteMessage($id){
            $mmanager = new MessageManager();
            if($mmanager->deleteMessage($id)){
                $this->addFlash("success", "votre message a bien été supprimé !!");
                $this->redirect("?ctrl=message&action=message&id=$id");
            }else{
                $this->addFlash("error", "Problème de connexion de BDD !!!"); 
            }
        }
    }