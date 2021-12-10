<?php


$categories = $response["data"]["categories"];

echo "Bienvenue dans votre forum !!<br>";
?>
<h1>Nos categorie :</h1>
<div class="sujet-item">

    <?php
    foreach($categories as $categorie){
        ?>
            <h1>
            <a href="?ctrl=sujet&action=sujet&id=<?= $categorie->getId() ?>"><?= $categorie->getNom_categorie() ?>
            </h1>
        <?php
    }
    ?>
</div>
