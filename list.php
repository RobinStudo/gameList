<?php
require_once './component/app.php';

$pageTitle = 'Liste';

require_once './component/header.php';
?>
<?php if( count( $games ) > 0 ){ ?>
<p>Il y a <?php echo count( $games ); ?> jeu(x)</p>

<table>
    <thead>
        <tr>
            <th>Affiche</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Lien</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach( $games as $key => $game ){ ?>
            <tr class="<?php echo ( $key % 2 ) ? 'white' : 'grey' ?>">
                <td>
                    <img src="<?php echo $game['poster']; ?>" alt="Affiche du jeu">
                </td>
                <td>
                    <strong><?php echo $game['name']; ?></strong>
                </td>
                <td><?php echo getGameType( $game['type'] ); ?></td>
                <td>
                    <a href="show.php">Voir plus de détail</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<?php }else{ ?>
    <p>Aucun jeu disponible</p>
<?php } ?>


<?php
require_once './component/footer.php';
?>
