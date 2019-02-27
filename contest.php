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

        <style>
            .contest{
                display: flex;
                flex-wrap: wrap;
            }

            .contest-box{
                width: 200px;
                height: 200px;
                background-color: blue;
                margin: 20px;
                color: white;
                font-size: 4rem;
                display: flex;
                justify-content: center;
                align-items: center;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <h2>Concours</h2>

        <div class="contest">
            <?php for( $i = 0; $i < 10; $i++ ){ ?>
                <a href="contest.php" class="contest-box">
                    <?php echo $i + 1; ?>
                </a>
            <?php } ?>
        </div>
    </body>
</html>
