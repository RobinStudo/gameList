<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/function.php';

session_start();

$types = [
    [ 'id' => 1, 'name' => 'Action', 'trigger' => true ],
    [ 'id' => 2, 'name' => 'Aventure', 'trigger' => false ],
    [ 'id' => 3, 'name' => 'Sport', 'trigger' => false ],
    [ 'id' => 4, 'name' => 'RPG', 'trigger' => false ],
    [ 'id' => 5, 'name' => 'MMORPG', 'trigger' => false ],
    [ 'id' => 6, 'name' => 'Horreur', 'trigger' => true ],
];

$games = [
    [
        'id' => 1,
        'name' => 'Rocket League',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'description' => 'Loremm.',
        'editor' => 'Psyonix',
        'developer' => 'Psyonix',
        'type' => 3,
        'releaseDate' => '2012-07-12',
        'pressRate' => 19,
        'playerRate' => 15,
    ],
    [
        'id' => 98,
        'name' => 'Star Citizen',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'description' => 'Lorem ipsum dolor sit amet, conadipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'editor' => 'Robert Space Industries',
        'developer' => 'Robert Space Industries',
        'type' => 4,
        'releaseDate' => '2025-07-12',
        'pressRate' => 18,
        'playerRate' => 15,
    ],
    [
        'id' => 3,
        'name' => 'Counter Strike : Global offensive',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'description' => 'Loremipsumdolorsitamet,consecteturadipisicingelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'editor' => 'Vavle',
        'developer' => 'Valve',
        'type' => 1,
        'releaseDate' => '2011-07-12',
        'pressRate' => 12,
        'playerRate' => 15,
    ],
    [
        'id' => 4,
        'name' => 'The Elder Scrolls Online',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'editor' => 'IdSoftware',
        'developer' => 'IdSoftware',
        'type' => 5,
        'releaseDate' => '2013-07-12',
        'pressRate' => 13,
        'playerRate' => 9,
    ],
    [
        'id' => 5,
        'name' => 'Amnesia',
        'poster' => 'https://rocketleague.media.zestyio.com/rl_cross-play_asset_rl_1920.309bf22bd29c2e411e9dd8eb07575bb1.jpg',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'editor' => 'IdSoftware',
        'developer' => 'IdSoftware',
        'type' => 6,
        'releaseDate' => '2013-07-12',
        'pressRate' => 18,
        'playerRate' => 19,
    ],
];

$gameComments = [
    [
        'gameId' => 1,
        'comments' => [
            [
                'id' => 1,
                'username' => 'Bobo',
                'message' => 'Bonjour, ce jeu est super !!',
                'postedAt' => '2019-01-12 13:24:00',
            ],
            [
                'id' => 2,
                'username' => 'Baba',
                'message' => 'Bonjour, ce jeu est nul !!',
                'postedAt' => '2019-02-05 11:24:00',
            ],
        ]
    ],
    [
        'gameId' => 3,
        'comments' => [
            [
                'id' => 3,
                'username' => 'Pipo',
                'message' => 'Bonjour, ce jeu est moyen !!',
                'postedAt' => '2019-01-12 13:24:00',
            ],
            [
                'id' => 4,
                'username' => 'Jean-Paul',
                'message' => 'Bonjour, ce jeu est parfait !!',
                'postedAt' => '2019-02-05 11:24:00',
            ],
        ]
    ],
];

$users = [
    [
        'username' => 'Jean-Paul II Gauthier',
        'email' => 'toto@tata.com',
        'password' => '$2y$10$uIXoaAciUtozsSRWU2Y.FeTz4wERZdfYmuAVKryk7eAv1JGio/EyW',
        'premium' => true,
    ],
];

if( !empty( $_SESSION['auth'] ) && $_SESSION['auth'] === true ){
    $user = $_SESSION['user'];
}else{
    $user = false;
}
