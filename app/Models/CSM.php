<?php

namespace App\Models;

use App\Interfaces\iBoard;

class CSM extends Board implements iBoard {
    public static function calculate_grades() {
        $res = array_sum( self::get_grades() ) / count( self::get_grades() );

        if( $res >= 7 ) {
            return true;
        } else {
            return false;
        }
    }
}