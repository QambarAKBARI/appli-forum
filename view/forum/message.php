<?php

use App\Service\Session;

$message = $response["data"]["message"];
$topic_id = $response["data"]["sujet_id"];

?>
<h1>les messages :</h1>

<?php
foreach($message as $message){
    ?>
    <h3><?=$message->getUser() ?></h3>
    <p><?= $message->getDateCreation() ?></p>
    <p><?= $message->getText() ?></p>
    <?php
}
?>
<form action="?ctrl=message&action=addMessage&id=<?= $topic_id?>" method="post">
    <textarea name="message" id="" cols="30" rows="10">
    </textarea>
    <input type="submit" value="Envoyer">
</form>

