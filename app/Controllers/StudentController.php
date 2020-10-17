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

        foreach( $boards as $board ) {
            $this->grades[] = $board->grade;
        }

        Board::set_grades( $this->grades );

       return $this->update( $id, CSM::calculate_grades(), CSMB::calculate_grades() );
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

        return $this->student_results( $student, $csm, $csmb );
    }

    private function student_results( $student, $csm, $csmb ) {
        $student = Student::with( 'boards' )
                          ->findOrFail( $student->id );

        $result = [
            'student' => $student,
            'average' => $this->get_average()
        ];
    
        return \json_encode( $result );
    }

    private function get_average() {
        return array_sum( $this->grades ) / count( $this->grades );
    }


    
}