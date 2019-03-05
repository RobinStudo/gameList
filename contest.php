<?php
require_once './component/app.php';

if( !$user || !$user['premium'] ){
    // FLASH MESSAGE
    header('Location: index.php');
}

$pageTitle = 'Concours';

require_once './component/header.php';
?>

<h2>Concours</h2>

<div class="contest">
    <?php displayBox( 0, 10 ); ?>
</div>

<?php
require_once './component/footer.php';
?>
