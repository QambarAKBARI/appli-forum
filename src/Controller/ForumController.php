<?php
namespace App\Controller;

use App\Manager\ForumManager;
use App\Manager\CategorieManager;
use App\Manager\MessageManager;

class ForumController extends AbstractController
{
    //?ctrl=store&action=index
    public function index($id)
    {
        $cmanager = new CategorieManager;
        $categories = $cmanager->findAll();

        return $this->render("forum/home.php", [
            "categories" => $categories
        ]);
    }

    public function message($id){
        $mmanager = new MessageManager;
        $messages = $mmanager->findAllMessagesByTopic($id);

        return $this->render("forum/message.php", [
            "messages" => $messages
        ]);
    }


}