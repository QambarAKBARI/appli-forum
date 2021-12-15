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
    if($sessionUser == mb_strtolower($suj->getUser()) || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN"){
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
    <p>Sujet : <?= ($suj->getVerouillage() == "yes") ? "fermée" : "ouvert" ?></p>
    <a href="?ctrl=sujet&action=<?= $action ?>&id=<?= $suj->getId() ?>"><?= $action ?></a>
    <?php
    if($sessionUser == mb_strtolower($suj->getUser()) || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN"){
        ?>
        <a href="?ctrl=sujet&action=<?= $action ?>&id=<?= $suj->getId() ?>">Editer</a>
        <a href="?ctrl=sujet&action=deleteSujet&id=<?= $suj->getId() ?>">Supprimer</a>
    <?php
    }
}
?>
</div>


<form action="?ctrl=sujet&action=addSujet&id=<?= $categorie_id?>" method="post">
    <label for="titre">Titre</label>
    <input type="text" name="sujet">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <label for="message"></label>
    <textarea name="message" id="default" cols="30" rows="10" required>
    </textarea>
    
    <input type="submit" value="Envoyer">
</form>
