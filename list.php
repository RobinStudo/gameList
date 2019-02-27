<?php
require_once './component/app.php';

$pageTitle = 'Liste';

require_once './component/header.php';
?>

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
                <td><?php echo $game['type']; ?></td>
                <td>
                    <a href="show.php">Voir plus de détail</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<?php
require_once './component/footer.php';
?>
