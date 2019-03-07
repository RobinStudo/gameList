<?php
require_once './component/app.php';

if( !empty( $_POST['email'] ) ){
    $link = '';

    $email = htmlspecialchars( $_POST['email'] );
    $findedUser = getUser( $email );

    if( $findedUser ){
        $token = bin2hex( random_bytes( 20 ) );
        $expireToken = time() + 3600 * 24;

        $link = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/resetPassword.php?token=' . $token;
    }
}

$pageTitle = 'Demande de réinitialisation';
require_once './component/header.php';
?>

<?php if( isset( $link ) ){ ?>
    <p>Si votre adresse est présente dans notre base, vous allez recevoir un email</p>

    <?php var_dump( $link . ' - ' . $token . ' - ' . $expireToken ); ?>
<?php } ?>

<form method="post">
    <input type="email" name="email">
    <input type="submit" value="Demander">
</form>

<?php
require_once './component/footer.php';
?>
