<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <p>
            <?php
            if( isset( $_POST['message'] ) ){
                echo $_POST['message'];
            }
            ?>
        </p>

        <form method="post">
            <textarea name="message"></textarea>
            <input type="submit" value="Envoyer">
        </form>

    </body>
</html>
