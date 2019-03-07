<?php
require_once './component/app.php';

$check = false;

if( !empty( $_POST['password'] ) ){
    $password = htmlspecialchars( $_POST['password'] );

    if( strlen( $password ) > 6 ){
        $hash = password_hash( $password, PASSWORD_DEFAULT );
        $success = 'Mot de passe modifié';
    }
}else if( !empty( $_GET['token'] ) ){
    $token = htmlspecialchars( $_GET['token'] );

    $findedUser = getUser( $token, 'resetToken' );

    if( $findedUser && $findedUser['resetTokenExpire'] > time() ){
        $check = true;
    }
}



$pageTitle = 'Réinitialisation';
require_once './component/header.php';
?>

<?php if( $check ){ ?>

<form method="post">
    <input type="password" name="password">
    <input type="submit" value="Modifier">
</form>

<?php }else if( isset( $success ) ){ ?>
    <?php echo $success . ' - ' . $hash; ?>
<?php }else{ ?>
    <p>N'essaie pas de tricher, merci, bisous <3</p>
<?php
}

require_once './component/footer.php';
?>
