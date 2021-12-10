<?php

$categories = $response["data"]["categories"];



        ?>
        <div class="sujet-item">
            <h1>Bienvenue dans votre forum !!</h1>
            <h2>Veuillez vous inscrire pour pouvoir consulter notre forum  </h2>
        
            <h3>Nos Categories :</h1>
            
            <?php
            foreach($categories as $categorie){
                ?>
                <p><strong><?= $categorie ?></strong></p>
                <?php
            }
            ?>
            <a href="?ctrl=security&action=register">Découvrir</a>
        </div>