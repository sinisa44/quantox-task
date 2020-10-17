<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board Extends Model {
    public function student() {
        return $this->belongsTo( 'App\Models\Student' );
    }
}