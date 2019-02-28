<?php
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
    $cleanQuery = strtolower( $query );
    
    foreach( $games as $game ){
        $cleanName = strtolower( $game['name'] );
        if( $cleanQuery == $cleanName ){
            $results[] = $game;
        }
    }

    return $results;
}
