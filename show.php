<?php
$game = array(
    'name' => 'Rocket League',
    'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'editor' => 'Psyonix',
    'developer' => 'Psyonix',
    'type' => 'Sport',
    'releaseDate' => '2012-07-12',
    'pressRate' => 19,
    'playerRate' => 15,
);

$averageRate = ( $game['pressRate'] + $game['playerRate'] ) / 2;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <meta charset="utf-8">
        <title><?php echo $game['name']; ?> - GameList</title>

        <style media="screen">
            body{
                margin: 0;
            }
            h1{
                color: white;
            }
            .banner{
                background-size: cover;
                min-height: 300px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            input[name="hideTrigger"]{
                display: none;
            }

            input[name="hideTrigger"]:checked + .trigger-warning__overlay{
                display: none;
            }

            .trigger-warning__overlay{
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.7);
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .trigger-warning{
                background-color: red;
                color: white;
                text-align: center;
                margin: 20px;
                padding: 10px;
                flex-grow: 1;
                position: relative;
            }
            label[for="hideTrigger"]{
                position: absolute;
                right: 8px;
                top: 5px;
                color: white;
                font-size: 1.8rem;
            }

            .rate i{
                color: yellow;
                font-size: 3rem;
            }

            .progress{
                width: 300px;
                height: 20px;
                border: 1px solid black;
                border-radius: 5px;
                overflow: hidden;
            }

            .progress-bar{
                height: 100%;
                background-color: blue;
            }
        </style>
    </head>
    <body>
        <div class="banner" style="background-image:url('<?php echo $game['poster']; ?>');">
            <h1><?php echo $game['name']; ?></h1>
        </div>

        <?php if( $game['type'] == 'Horreur' || $game['type'] == 'Adulte' ){ ?>
            <input type="checkbox" name="hideTrigger" id="hideTrigger">
            <div class="trigger-warning__overlay">
                <div class="trigger-warning">
                    <label for="hideTrigger">
                        <i class="fas fa-times"></i>
                    </label>
                    Le contenu de ce jeu est réservé à un public averti
                </div>
            </div>
        <?php } ?>

        <p><?php echo $game['description']; ?></p>

        <span class="date"><?php echo $game['releaseDate']; ?></span>

        <div class="rate">
            <?php
            if( $averageRate < 5 ){
                echo '<i class="fas fa-sad-cry"></i>';
                $bgColor = 'red';
            }elseif( $averageRate < 10 ){
                echo '<i class="fas fa-meh"></i>';
                $bgColor = 'orange';
            }elseif( $averageRate < 15 ){
                echo '<i class="fas fa-smile-beam"></i>';
                $bgColor = 'yellow';
            }else{
                echo '<i class="fas fa-grin-stars"></i>';
                $bgColor = 'green';
            }

            $progress = $averageRate * 5;
            ?>

            <div class="progress">
                <div class="progress-bar" style="width: <?php echo $progress; ?>%; background-color: <?php echo $bgColor; ?>;">
                </div>
            </div>

            <?php echo $averageRate; ?>
        </div>
    </body>
</html>
