<?php
require_once './component/app.php';

$game = $games[1];
$averageRate = ( $game['pressRate'] + $game['playerRate'] ) / 2;

$pageTitle = $game['name'];

require_once './component/header.php';
?>

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

<?php
require_once './component/footer.php';
?>
