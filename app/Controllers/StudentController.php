<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\CSM;
use App\Models\CSMB;
use App\Models\Board;


class StundentController {
    private $grades;

    
    public function show( $id ) {
        $boards = Student::findOrFail( $id )->boards;

        $grades = array();

        foreach( $boards as $board){
            $grades[] = $board->grade ;
        }

 
        Board::set_grades( $grades );

       $csm = CSM::calculate_grades();
       $csmb = CSMB::calculate_grades();

        return $csmb;
    }


    public static function csm( $grades ) {
      
    }

    public function csmb( $grades ) {

    }

    private function get_grades( $grade  ) {
        return $grade;
    }
}