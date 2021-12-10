<?php

$categories = $response["data"]["categories"];

echo "Bienvenue dans votre forum !!<br>",
        "Veuillez vous inscrire pour pouvoir consulter notre forum !!";

        ?>
        <h1>Nos Categories :</h1>
        <ul>
        <?php
        foreach($categories as $categorie){
            ?>
            <li><?= $categorie ?></li>
            <?php
        }
        ?>
        </ul>