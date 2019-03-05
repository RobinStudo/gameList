<?php
use VRia\Utils\NoDiacritic;

function averageRate( $rates ){
    $average = array_sum( $rates ) / count( $rates );
    return round( $average );
}

function getGameType( $id ){
    global $types;
    foreach( $types as $type ){
        if( $type['id'] == $id ){
            return $type['name'];
        }
    }

    return 'Incoonu';
}

function isTriggerType( $id ){
    global $types;
    $ids = array_column( $types, 'id' );
    $index = array_search( $id, $ids );
    $type = $types[ $index ];

    if( $type['trigger'] === true ){
        return true;
    }
    return false;
}

function releaseDate( $date ){
    $gameTime = strtotime( $date );
    $spendTime = time() - $gameTime;

    if( $spendTime < 0 ){
        return false;
    }

    return $spendTime;
}

function truncText( $string ){
    if( strlen( $string ) < 40 ){
        return $string;
    }

    $trunc = substr( $string, 0, 40 ) ;
    $pos = strrpos( $trunc, ' ' );
    $out = substr( $trunc, 0, $pos );

    return $out . '...';
}

function searchGames( $query ){
    global $games;

    $results = array();
    $cleanQuery = strtolower( NoDiacritic::filter( $query ) );

    foreach( $games as $game ){
        $cleanName = strtolower( NoDiacritic::filter( $game['name'] ) );
        if( substr_count( $cleanName, $cleanQuery ) > 0 ){
            $results[] = $game;
            continue;
        }

        similar_text( $cleanName, $cleanQuery, $score );
        if( $score > 70 ){
            $results[] = $game;
        }
    }

    return $results;
}

function getGame( $id ){
    global $games;

    if( !is_numeric( $id ) ){
        return false;
    }

    foreach( $games as $game ){
        if( $game['id'] == $id ){
            return $game;
        }
    }

    return false;
}

function logShowView( $gid ){
    $log = '[' . date('Y-m-d H:i:s') . '] ';
    $log .= 'Visited game with id : ' . $gid . ' ';
    $log .= 'from IP : ' . $_SERVER['REMOTE_ADDR'];

    return writeLog( $log );
}

function logUploadPicture( $gid, $name ){
    $log = '[' . date('Y-m-d H:i:s') . '] ';
    $log .= 'Uploaded picture for game with id : ' . $gid . ' ';
    $log .= 'with name : ' . $name;

    return writeLog( $log );
}

function writeLog( $line ){
    if( filesize( 'log/access.log' ) > 100 ){
        $name = 'access-' . date('Y-m-d H:i:s') . '.log';
        rename( 'log/access.log', 'log/backup/' . $name );
    }

    $file = fopen( 'log/access.log', 'a+' );

    $line .= PHP_EOL;
    fputs( $file, $line );

    fclose( $file );
}

function displayBox( $start, $max ){
    echo '<a href="contest.php" class="contest-box">';
    echo $start + 1;
    echo '</a>';

    $start++;
    if( $start < $max ){
        displayBox( $start, $max );
    }
}
