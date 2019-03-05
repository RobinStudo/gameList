<?php
require_once './component/app.php';

ini_set( 'upload_max_filesize', '4M' );

$game = getGame( $_GET['id'] );
if( $game === false ){
    // FLASH MESSAGE
    header('Location: list.php');
}

if( !empty( $_POST['url'] ) ){
    $url = htmlspecialchars( $_POST['url'] );

    if( filter_var( $url, FILTER_VALIDATE_URL ) ){
        $content = file_get_contents( $url );

        $pos = strrpos( $url, '.' );
        $ext = substr( $url, $pos );
        $prefix = 'gid_' . $game['id'] . '_image_';
        $name = uniqid( $prefix ) . $ext;

        file_put_contents( 'data/imported/' . $name, $content );
        logUploadPicture( $game['id'], $name );

        // $file = fopen( 'data/imported/' . $name, 'w' );
        // fwrite( $file, $content );
        // fclose( $file );
    }

}else if( isset( $_FILES['document'] ) && $_FILES['document']['error'] == 0 ){
    if( $_FILES['document']['size'] <= 4000000 ){

        $allowTypes = [ 'image/jpeg', 'image/png' ];
        if( in_array( $_FILES['document']['type'], $allowTypes ) ){

            $tmp = $_FILES['document']['tmp_name'];
            $originalName = $_FILES['document']['name'];

            $ext = pathinfo( $originalName, PATHINFO_EXTENSION );
            $prefix = 'gid_' . $game['id'] . '_image_';
            $name = uniqid( $prefix ) . '.' . $ext;
            move_uploaded_file( $tmp, 'data/' . $name );

            logUploadPicture( $game['id'], $name );

            // FLASH MESSAGE
            header('Location: show.php?id=' . $game['id'] );
        }else{
            $error = 'Le format du fichier est inccorect';
        }

    }else{
        $error = 'Le fichier est trop volumineux';
    }
}else{
    $error = 'Une erreur inconnue est survenue, bisous !';
}

$pageTitle = 'Charger une image';

require_once './component/header.php';
?>
<h2>Ajouter un visuel</h2>

<?php if( !empty( $error ) ){ ?>
    <p><?php echo $error; ?></p>
<?php } ?>

<form method="post" enctype="multipart/form-data">
    <label for="uploadFile">Ajouter un fichier</label>
    <input type="file" name="document" id="uploadFile">

    <input type="url" name="url" placeholder="Saisir une URL">

    <input type="submit" value="Envoyer">
</form>

<?php
require_once './component/footer.php';
?>
