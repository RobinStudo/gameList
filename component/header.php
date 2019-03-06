<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo ( isset( $pageTitle ) ) ? $pageTitle . ' - ' : ''; ?>
            GameList
        </title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php">Gamelist</a>
                <a href="list.php">Liste des jeux</a>
                <a href="contest.php">Concours</a>
            </nav>

            <div class="user-area">
                <?php if( $user ){ ?>
                    Bienvenue <?php echo $user['username']; ?>
                    <a href="logout.php">Déconnexion</a>
                <?php }else{ ?>
                    <a href="login.php">Connexion</a> -
                    <a href="register.php">Inscription</a>
                <?php } ?>
            </div>
        </header>
