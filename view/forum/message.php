<?php

use App\Service\Session;

$message = $response["data"]["message"];
$topic_id = $response["data"]["sujet_id"];

$lock = null;


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

    if($message->getSujet()->getVerouillage() == "yes"){
        $lock = "fermee";
    }else{
        $lock = "ouvert";
    }
}
?>
</div>
<form class="<?= $lock ?>" action="?ctrl=message&action=addMessage&id=<?= $topic_id?>" method="post">
    <textarea name="message" id="default" cols="30" rows="10" required>
    </textarea>
    <input type="submit" value="Envoyer">
</form>

