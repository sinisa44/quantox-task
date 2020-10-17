<?php

use App\Controllers\StundentController;

require_once __DIR__ . '/bootstrap/app.php';

$student_id = 1;

if( isset( $_GET['student'] ) ) 
    $student_id = $_GET['student'];

$student = new StundentController();

 echo $student->show( $student_id );
// var_dump($student->show( $student_id ));