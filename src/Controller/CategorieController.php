<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Manager\CategorieManager;

class CategorieController extends AbstractController {

        public function Categorie(){
            $cmanager = new CategorieManager;
            $categories = $cmanager->findAll();

            return $this->render("forum/home.php", [
                "categories" => $categories
            ]);
        }
        public function Categories(){
            $cmanager = new CategorieManager;
            $categories = $cmanager->findAll();

            return $this->render("forum/categorie.php", [
                "categories" => $categories
            ]);
        }

    }