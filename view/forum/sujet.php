<?php

use App\Service\Session;

$sujet = $response["data"]["sujet"];
$categorie_id = $response["data"]["categorie_id"];


$user = Session::get("user");

$lock = null;



?>
<h1>Nos Sujets :</h1>
<div class="sujet-item">
<?php
foreach($sujet as $suj){
    ?>
    <h2><a href="?ctrl=message&action=message&id=<?= $suj->getId() ?>"><?= $suj->getTitre() ?></a></h2>
    <p><?= $suj->getDate_creation() ?></p>
    <p>Créé par : <?= $suj->getUser() ?></p>
    <form action="">
        <button type="submit">
            <?= $lock ?>
        </button>
    </form>
    <?php
    if($suj->getVerouillage() == "ok"){
         $lock = "<i class='fas fa-lock'></i>";
    }elseif($suj->getVerouillage() == "non"){
         $lock = "<i class='fas fa-lock-open'></i>";
    }
}
?>
</div>


<form action="?ctrl=sujet&action=addSujet&id=<?= $categorie_id?>" method="post">
    <textarea name="sujet" id="default" cols="30" rows="10">
    </textarea>
    <input type="submit" value="Envoyer">
</form>
