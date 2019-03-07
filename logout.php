<?php
session_start();

$_SESSION = [];
session_destroy();

setcookie( 'userLogin', null, time() + 10 );

header('Location: index.php');
exit();
