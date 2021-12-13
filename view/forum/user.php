<?php
use App\Service\Session;

$users = $response["data"]["users"];

$role = Session::get("user")->getRole();
?>
<h1>Nos users :</h1>
<div class="sujet-item">
<?php
foreach($users as $user){
    ?>
    <h2>Pseudo : <?= ucfirst($user) ?></h2>
    <h3>Role : <?= $user->getRole() ? $user->getRole() : "Membre"  ?></h3>
    <h4>Depuis : <?= $user->getDate_inscription() ?></h4>
    <?php
    if($role == "ROLE_ADMIN"){
        ?>
        <a href="?ctrl=admin&action=banUser&id=<?= $user->getId() ?>">Bannir</a><br>
        <a href="?ctrl=admin&action=addAdmin&id=<?= $user->getId() ?>">Faire Admin</a>
        <?php
    }
    if($role == "SUPER_ADMIN"){
        ?>
        <a href="?ctrl=admin&action=banUser&id=<?= $user->getId() ?>">Bannir</a><br>
        <a href="?ctrl=admin&action=addAdmin&id=<?= $user->getId() ?>">Faire Admin</a><br>
        <a href="?ctrl=admin&action=banAdmin&id=<?= $user->getId() ?>">Bannir Admin</a><br>
        <?php
    
    }
    

    
}
?>
</div>