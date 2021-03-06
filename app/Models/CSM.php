<?php

namespace App\Models;

use App\Interfaces\iBoard;

class CSM extends Board implements iBoard {

    /**
     * Calculate if sum of grades are equal or higher of 7
     * 
     * @return bool
     */
    public static function calculate_grades() {
        $res = array_sum( self::get_grades() ) / count( self::get_grades() );

        if( $res >= 7 ) {
            return true;
        } else {
            return false;
        }
    }

}