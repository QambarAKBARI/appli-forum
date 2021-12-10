<?php

$categories = $response["data"]["categories"];

?>
<h1>Nos Categories :</h1>
<div class="sujet-item">
<?php
foreach($categories as $categorie){
    ?>
    <h2><?= $categorie->getNom_categorie() ?></h2>
    <?php
}
?>
</div>