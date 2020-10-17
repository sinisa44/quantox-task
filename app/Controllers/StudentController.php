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
            $grades[] = $board->grade;
        }

        Board::set_grades( $grades );

        $student =$this->update( $id, CSM::calculate_grades(), CSMB::calculate_grades() );


        return $student;
    }
    
    private function update( $student_id, $csm, $csmb ) {
        $student = Student::findOrFail( $student_id );

        try {
            $student->update( [
                'csm'  => $csm,
                'csmb' => $csmb
            ] );
        } catch ( \PDOException $e ) {
            return \json_encode( ['error' => $e] );
        }

        return $student;
    }

    public static function csm( $grades ) {
      
    }

    public function csmb( $grades ) {

    }

    private function get_grades( $grade  ) {
        return $grade;
    }
}