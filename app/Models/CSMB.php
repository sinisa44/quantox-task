<?php

namespace App\Models;

use App\Interfaces\iBoard;

class CSMB extends Board implements iBoard{


    public static function calculate_grades( ) {
        // return self::remove_min( self::$grades );
        return self::check_grades( self::remove_min( self::$grades ) );
    }

    private static function remove_min( $grades ) {
        
        if( ! count( $grades ) < 2 ) {
            sort( $grades );
            array_shift( $grades );
        }

        return $grades;
    }

    private static function check_grades( $grades ) {
        if( max( $grades ) > 8 ) {
            return true;
        } else {
            return false;
        }
    }
}