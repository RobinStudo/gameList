<?php
require_once './component/app.php';

require_once './component/header.php';
?>

<div class="user-area">
    <?php if( $user ){ ?>
        Bienvenue <?php echo $user['username']; ?>
        <a href="#">Déconnexion</a>
    <?php }else{ ?>
        <a href="#">Connexion</a> -
        <a href="#">Inscription</a>
    <?php } ?>
</div>

<?php
require_once './component/footer.php';
?>
