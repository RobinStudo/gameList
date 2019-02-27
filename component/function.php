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
