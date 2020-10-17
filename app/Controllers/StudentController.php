<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\CSM;
use App\Models\CSMB;
use App\Models\Board;


class StundentController {
    /**
     * @param grades, $grades array
     */
    private $grades;

    /**
     * Display student 
     * 
     * @param int, $id student_id
     * 
     * @return void
     */
    public function show( $id ) {
        $boards = Student::findOrFail( $id )->boards;

        foreach( $boards as $board ) {
            $this->grades[] = $board->grade;
        }

        Board::set_grades( $this->grades );

       return $this->update( $id, CSM::calculate_grades(), CSMB::calculate_grades() );
    }


    /**
     * Update Students table
     * 
     * @param int, $student_id
     * @param bool, $csm,
     * @param bool, $csmb
     * 
     * @return void
     */
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


    /**
     * Display results for student
     * 
     * @param object $student,
     * @param bool $csm,
     * @param bool $csmb.
     * 
     * @return obj
     */
    private function student_results( $student, $csm, $csmb ) {
        $student = Student::with( 'boards' )
                          ->findOrFail( $student->id );

        $result = [
            'student' => $student,
            'average' => $this->get_average()
        ];
    
        return \json_encode( $result );
    }

    /**
     * Calculates average grade
     * 
     * @return int
     */
    private function get_average() {
        return array_sum( $this->grades ) / count( $this->grades );
    }
}