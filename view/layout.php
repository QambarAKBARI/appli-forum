<?php

use App\Service\Session;


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/Dq7WiJWtLLyrXb9putdP3/1umwTmzIvhuu9EW7gHYSVtCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title></title>
    <script>
      tinymce.init({
        selector: 'textarea#default'
      });
    </script>
</head>
<body>
    <header>
        <nav>
            <?php
                if($user = Session::get("user")){
                    if($user->getRole() == "ROLE_ADMIN"){
                        ?>
                        <a href="?ctrl=admin">Administration</a>
                        <?php
                    }
                    ?>
                    
                    <a href="?ctrl=forum&action=index">Acceuil</a>
                    <span><?= $user->getPseudo() ?></span>
                    <a href="?ctrl=categorie&action=categories">Categories</a>
                    <a href="?ctrl=security&action=logout">Déconnexion</a>
                    <?php
                }
                else{
                    ?>
                    <a href="?ctrl=security&action=index">Acceuil</a>
                    <a href="?ctrl=security&action=login">Connexion</a>
                    <a href="?ctrl=security&action=register">Inscription</a>
                    <?php
                }
            ?>
        </nav>
        <?php
            if($message = Session::get("message")){
                ?>
                <p id="message" class='<?= $message['type'] ?>'>
                    <?= $message['msg'] ?> 
                </p>
                <?php
                Session::remove("message");
            }
        ?>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>
    
</body>
</html>