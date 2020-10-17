<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board Extends Model {

    /**
     * param grades, $grades array
     */
    public static $grades;

    /**
     * Getter for grades
     * 
     * @return array
     */
    public function get_grades()
    {
        return self::$grades;
    }

    /**
     * Setter for grades
     * 
     * @param array, $grades
     */
    public static function set_grades($grades = array())
    {
        self::$grades = $grades;
    }

    /**
     * Eloquent relationship method
     * 
     * @return object
     */
    public function student() {
        return $this->belongsTo( 'App\Models\Student' );
    }

  

    

}