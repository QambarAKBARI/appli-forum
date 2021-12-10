<?php

use App\Service\Session;

$sujet = $response["data"]["sujet"];
$categorie_id = $response["data"]["categorie_id"];


$user = Session::get("user");


?>
<h1>Nos Sujets :</h1>
<div class="sujet-item">
<?php
foreach($sujet as $suj){
    $Action = "?ctrl=sujet&action=verrouiller&id=<?= $suj->getId()";
    ?>
    <h2><a href="?ctrl=message&action=message&id=<?= $suj->getId() ?>"><?= $suj->getTitre() ?></a></h2>
    <p><?= $suj->getDate_creation() ?></p>
    <p>Créé par : <?= $suj->getUser() ?></p>
    <a href="?ctrl=sujet&action=verrouiller&id=<?= $suj->getId() ?>">Verouiller</a>
    <?php
}
?>
</div>


<form action="?ctrl=sujet&action=addSujet&id=<?= $categorie_id?>" method="post">
    <textarea name="sujet" id="default" cols="30" rows="10" required>
    </textarea>
    <input type="submit" value="Envoyer">
</form>
