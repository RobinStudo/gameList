<?php
require_once './component/app.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    if(
        !empty( $_POST['email'] ) &&
        !empty( $_POST['password'] )
    ){
        $email = htmlspecialchars( $_POST['email'] );
        $password = htmlspecialchars( $_POST['password'] );

        if( $findUser = getUser( $email ) ){

            if( password_verify( $password, $findUser['password'] ) ){
                login( $findUser );
                header('Location: index.php');
            }

        }
    }

    $error = 'Erreur de connexion';
}

$pageTitle = 'Connexion';
require_once './component/header.php';
?>

<?php if( !empty( $error ) ){ ?>
    <p><?php echo $error; ?></p>
<?php } ?>

<form method="post">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Mot de passe">

    <input type="submit" value="Valider">
</form>

<?php
require_once './component/footer.php';
?>
