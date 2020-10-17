<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $table = 'students';

    protected $fillable = [
        'name',
        'csm',
        'csmb'
    ];

    public function boards() {
        return $this->hasMany( 'App\Models\Board' );
    }
}