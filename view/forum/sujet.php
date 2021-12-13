<?php

use App\Service\Session;

$sujet = $response["data"]["sujet"];
$categorie_id = $response["data"]["categorie_id"];

$role = Session::get("user")->getRole();

$sessionUser = Session::get("user")->getPseudo();
$action = null;

?>
<h1>Nos Sujets :</h1>
<div class="sujet-item">
<?php
foreach($sujet as $suj){
    if($sessionUser == mb_strtolower($suj->getUser()) || $role == "ROLE_ADMIN"){
        if($suj->getVerouillage() == "yes"){
            $action = "ouvrir";
        }else{
            $action = "verrouiller";
        }
    }

    ?>
    <h2><a href="?ctrl=message&action=message&id=<?= $suj->getId() ?>"><?= $suj->getTitre() ?></a></h2>
    <p><?= $suj->getDate_creation() ?></p>
    <p>Créé par : <?= $suj->getUser() ?></p>
    <a href="?ctrl=sujet&action=<?= $action ?>&id=<?= $suj->getId() ?>"><?= $action ?></a>
    <?php

}
?>
</div>


<form action="?ctrl=sujet&action=addSujet&id=<?= $categorie_id?>" method="post">
    <textarea name="sujet" id="default" cols="30" rows="10" required>
    </textarea>
    <input type="submit" value="Envoyer">
</form>
