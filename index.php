<?php

use App\Controllers\StundentController;

require_once __DIR__ . '/bootstrap/app.php';

$student_id = 1;

$student = new StundentController();

//  $student->show( $student_id );
var_dump($student->show( $student_id ));