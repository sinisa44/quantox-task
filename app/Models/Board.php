<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board Extends Model {

    public static $grades;

    public function student() {
        return $this->belongsTo( 'App\Models\Student' );
    }

    public static function set_grades( $grades = array() ) {
        self::$grades = $grades;
    }

    public function get_grades() {
        return self::$grades;
    }

}