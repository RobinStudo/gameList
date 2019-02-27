<?php
require_once './component/app.php';

if( !$user || !$user['premium'] ){
    header('Location: index.php');
}

$pageTitle = 'Concours';

require_once './component/header.php';
?>

<h2>Concours</h2>

<div class="contest">
    <?php for( $i = 0; $i < 10; $i++ ){ ?>
        <a href="contest.php" class="contest-box">
            <?php echo $i + 1; ?>
        </a>
    <?php } ?>
</div>

<?php
require_once './component/footer.php';
?>
