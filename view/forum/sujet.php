<?php


$sujet = $response["data"]["sujet"];
$categorie_id = $response["data"]["categorie_id"];

var_dump($categorie_id);

?>
<h1>Nos Sujets :</h1>
<ul>
<?php
foreach($sujet as $suj){
    ?>
    <li><a href="?ctrl=message&action=message&id=<?= $suj->getId() ?>"><?= $suj->getTitre() ?></a></li>
    <?php
}
?>
</ul>


<form action="?ctrl=sujet&action=addSujet&id=<?= $categorie_id?>" method="post">
    <textarea name="sujet" id="" cols="30" rows="10">
    </textarea>
    <input type="submit" value="Envoyer">
</form>
