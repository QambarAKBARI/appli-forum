<?php

$categories = $response["data"]["categories"];

echo "Bienvenue dans votre forum !!<br>",
        "Veuillez vous inscrire pour pouvoir consulter notre forum !!";

        ?>
        <h1>Nos Sujets :</h1>
        <ul>
        <?php
        foreach($categories as $categorie){
            ?>
            <li><?= $categorie->getNom_categorie() ?></li>
            <?php
        }
        ?>
        </ul>