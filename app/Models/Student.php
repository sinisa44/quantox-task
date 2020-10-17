<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * @param string $table;
     */
    protected $table = 'students';

    /**
     * @param array $fillable
     */
    protected $fillable = [
        'name',
        'csm',
        'csmb'
    ];

    /**
     * Eloquent relationship method
     * 
     * @retrun object
     */
    public function boards() {
        return $this->hasMany( 'App\Models\Board' );
    }
}