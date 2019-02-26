<?php
// $user = false;

$user = array(
    'username' => 'Patrick',
    'premium' => true,
);

if( !$user || !$user['premium'] ){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>GameList</title>
    </head>
    <body>
        Page Concours
    </body>
</html>
