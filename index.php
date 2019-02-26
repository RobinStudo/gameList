<?php
$user = false;

// $user = array(
//     'username' => 'Patrick',
//     'premium' => true,
// );

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>GameList</title>
    </head>
    <body>
        <div class="user-area">
            <?php if( $user ){ ?>
                Bienvenue <?php echo $user['username']; ?>
                <a href="#">Déconnexion</a>
            <?php }else{ ?>
                <a href="#">Connexion</a> -
                <a href="#">Inscription</a>
            <?php } ?>
        </div>


    </body>
</html>
