<?php
require_once './component/app.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    if(
        !empty( $_POST['username'] ) &&
        !empty( $_POST['email'] ) &&
        !empty( $_POST['password'] )
    ){
        $username = htmlspecialchars( $_POST['username'] );
        $email = htmlspecialchars( $_POST['email'] );
        $password = htmlspecialchars( $_POST['password'] );

        if( checkMail( $email ) && checkPassword( $password ) ){

            $newUser = [
                'username' => $username,
                'email' => $email,
                'password' => password_hash( $password, PASSWORD_DEFAULT ),
            ];

            $users[] = $newUser;
            login( $newUser );
            header('Location: index.php');
        }else{
            $error = 'Veuillez saisir des données valides';
        }
    }else{
        $error = 'Tous les champs doivent être remplis';
    }
}

$pageTitle = 'Inscription';
require_once './component/header.php';
?>

<?php if( !empty( $error ) ){ ?>
    <p><?php echo $error; ?></p>
<?php } ?>

<form method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Mot de passe">

    <input type="submit" value="Valider">
</form>

<?php
require_once './component/footer.php';
?>
