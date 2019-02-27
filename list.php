<?php
$games = [
    [
        'id' => 1,
        'name' => 'Rocket League',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'type' => 'Sport',
    ],
    [
        'id' => 2,
        'name' => 'Star Citizen',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'type' => 'RPG',
    ],
    [
        'id' => 3,
        'name' => 'Counter Strike : Global offensive',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'type' => 'Action',
    ],
    [
        'id' => 4,
        'name' => 'The Elder Scrolls Online',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'type' => 'MMORPG',
    ],
];
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste - GameList</title>

        <style>
            table img{
                height: 100px;
            }

            tr.white{
                background-color: #ecf0f1;
            }
            tr.grey{
                background-color: #bdc3c7;
            }
        </style>
    </head>
    <body>

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

        <?php  ?>

    </body>
</html>
