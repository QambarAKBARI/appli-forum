<?php

use App\Service\Session;

$message = $response["data"]["message"];
$topic_id = $response["data"]["sujet_id"];

$role = Session::get("user")->getRole();
$sessionUser = Session::get("user")->getPseudo();

$lock = null;

$formAction = "?ctrl=message&action=addMessage&id=$topic_id";


?>
<h1>les messages :</h1>
<div class="sujet-item">
<?php
foreach($message as $message){
    ?>
    <h3>Auteur : <?=$message->getUser() ?></h3>
    <p>Date de creation : <?= $message->getDateCreation() ?></p>
    <p><?= $message->getText() ?></p>
    <?php
    if($sessionUser == mb_strtolower($message->getUser()) || $role == "ROLE_ADMIN" || $role == "SUPER_ADMIN"){
        ?>
        <a href="?ctrl=sujet&action=editeMessage&id=<?= $message->getId() ?>">Editer</a>
        <a href="?ctrl=message&action=deleteMessage&id=<?= $message->getId() ?>">Supprimer</a>
    <?php
    }

    /*if($message->getSujet()->getVerouillage() == "yes"){
        $lock = "fermee";
    }else{
        $lock = "ouvert";
    }*/
}
?>
</div>
<form class="<?= $lock ?>" action="<?= $formAction ?>" method="post">
    <label for="message">Votre message : </label>
    <textarea name="message" id="default" cols="30" rows="10" required>
    </textarea>
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <input type="submit" value="Envoyer">
</form>

