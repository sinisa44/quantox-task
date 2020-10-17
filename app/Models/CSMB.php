<?php

namespace App\Models;

use App\Interfaces\iBoard;

class CSMB extends Board implements iBoard{

    /**
     * Calculate grade
     * 
     * @return void
     */
    public static function calculate_grades( ) {
        return self::check_grades( self::remove_min( self::$grades ) );
    }

    /**
     * Remove minimal value from array
     * 
     * @param array $grades
     * 
     * @retunr array
     */
    private static function remove_min( $grades ) {
        
        if( ! count( $grades ) < 2 ) {
            sort( $grades );
            array_shift( $grades );
        }

        return $grades;
    }

    /**
     * Check if grade is greater than 8
     * 
     * @param array $grades
     * 
     * @return bool
     */
    private static function check_grades( $grades ) {
        if( max( $grades ) > 8 ) {
            return true;
        } else {
            return false;
        }
    }
}