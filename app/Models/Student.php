<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    public function boards() {
        return $this->hasMany( 'App\Models\Board' );
    }
}