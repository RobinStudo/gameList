<?php
require_once './component/app.php';

if( !empty( $_GET['query'] ) ){
    $query = htmlspecialchars( $_GET['query'] );
    $items = searchGames( $query );
}else{
    $items = $games;
}

$pageTitle = 'Liste';
require_once './component/header.php';
?>

<form method="get" class="search-engine">
    <input type="search" name="query" placeholder="Rechercher...">
    <button type="submit">
        <i class="fas fa-search"></i>
    </button>
</form>


<?php if( count( $items ) > 0 ){ ?>
<p>Il y a <?php echo count( $items ); ?> jeu(x)</p>

<table>
    <thead>
        <tr>
            <th>Affiche</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Description</th>
            <th>Lien</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach( $items as $key => $game ){ ?>
            <tr class="<?php echo ( $key % 2 ) ? 'white' : 'grey' ?>">
                <td>
                    <img src="<?php echo $game['poster']; ?>" alt="Affiche du jeu">
                </td>
                <td>
                    <strong><?php echo $game['name']; ?></strong>
                </td>
                <td><?php echo getGameType( $game['type'] ); ?></td>
                <td>
                    <?php echo truncText( $game['description'] ); ?>
                </td>
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
