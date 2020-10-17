<?php

require_once __DIR__ . '../../bootstrap/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create( 'students', function( $table ){
    $table->increments( 'id' );
    $table->string( 'name', 255 )->nullable( false );
    $table->int( 'csm' )->nullable();
    $table->int( 'csmb' )->nullable();
});

Capsule::schema()->create( 'boards', function( $table ) {
    $table->increments( 'id' );
    $table->integer( 'student_id' )->refreneces( 'id' )->on( 'students' );
    $table->integer( 'grade' );
    $table->enum( 'type', ['CSM', 'CSMB'] )->nullable( false );
} );

