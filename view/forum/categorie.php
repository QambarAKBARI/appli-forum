<?php

$categories = $response["data"]["categories"];

?>
<h1>Nos Categories :</h1>
<ul>
<?php
foreach($categories as $categorie){
    ?>
    <li><?= $categorie->getNom_categorie() ?></li>
    <?php
}
?>
</ul>