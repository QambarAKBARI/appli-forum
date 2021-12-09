<?php


$categories = $response["data"]["categories"];

echo "Bienvenue dans votre forum !!<br>";
    //    var_dump($sujets);
?>
<h1>Nos categorie :</h1>
<table>

    <?php
    foreach($categories as $categorie){
        // var_dump($sujet);
        ?>
        <tr>
            <th>
            <a href="?ctrl=sujet&action=sujet&id=<?= $categorie->getId() ?>"><?= $categorie->getNom_categorie() ?>
            </th>
        </tr>
        <?php
    }
    ?>
</table>
