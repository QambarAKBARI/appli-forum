<?php
use App\Service\Session;

$categories = $response["data"]["categories"];

echo "Bienvenue ".Session::get('user')->getPseudo()." : dans votre forum !!<br>";
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
<form action="?ctrl=admin&action=addCategorie" method="post">
    <textarea name="categorie" id="default" cols="30" rows="10" required>
    </textarea>
    <input type="submit" value="Envoyer">
</form>