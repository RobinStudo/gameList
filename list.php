<?php
require_once './component/app.php';

if( !empty( $_GET['query'] ) ){
    $query = htmlspecialchars( $_GET['query'] );
    $items = searchGames( $query );
}else{
    $items = $games;
}

$itemPerPage = 2;
$counterItem = count( $items );
$totalPage = ceil( $counterItem / $itemPerPage );

if( !empty( $_GET['page'] ) ){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$offset = ( $page - 1 ) * $itemPerPage;
$items = array_slice( $items, $offset, $itemPerPage );

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
                    <a href="show.php?id=<?php echo $game['id']; ?>">Voir plus de détail</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<?php if( $page > 1 ){ ?>
    <a href="list.php?page=<?php echo $page - 1; ?>">
        <i class="fas fa-arrow-left"></i>
    </a>
<?php } ?>

<?php for( $i = 1; $i <= $totalPage; $i++ ){ ?>
    <?php if( $i != $page ){ ?>
        <?php if( $i <= 3 ){ ?>
            <a href="list.php?page=<?php echo $i ?>"><?php echo $i ?></a>

            <?php if( $i == 3 && $page > 6 ){ ?>
                ...
            <?php } ?>
        <?php }else if( $i > ( $totalPage - 3 ) ){ ?>
            <?php if( $i == ( $totalPage - 2 ) && $page < ( $totalPage - 5 ) ){ ?>
                ...
            <?php } ?>

            <a href="list.php?page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php }else if( $i > ( $page - 3 ) && $i < ( $page + 3 ) ){ ?>
            <a href="list.php?page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php } ?>

    <?php }else{ ?>
        <strong><?php echo $i; ?></strong>
    <?php } ?>
<?php } ?>

<?php if( $page < $totalPage ){ ?>
    <a href="list.php?page=<?php echo $page + 1; ?>">
        <i class="fas fa-arrow-right"></i>
    </a>
<?php } ?>


<?php }else{ ?>
    <p>Aucun jeu disponible</p>
<?php } ?>


<?php
require_once './component/footer.php';
?>
