<?php
/*
 ORM ( Object Relational Mapping )

 Forma de convertir los datos para guardarlos o sacarlos de
 su archivo contenedor
*/

//===================================================================

  //Model to pack up
function model_to_package( $arrayToPackage, $lineSeparator ) {
  //Es como se guardará la información, su orden

  $maxFields = count( $arrayToPackage );
  $pack = "";
  $i = 0;

  foreach( $arrayToPackage as $key => $value ) {
    $i++;
	
	if ( $i == $maxFields ) {
	  $pack .= $value;
	}
	else{
	  $pack .= $value . $lineSeparator;
	}
  }

  return $pack;
}


//PACK UP TO CREATE
function package_to_create( $arrayToPackage, $lineSeparator, $arraySeparator ) { 

  $data = model_to_package( $arrayToPackage, $lineSeparator );
  $data .= $arraySeparator . "\n";

  return $data;
}


//PACK UP TO UPDATE
function package_to_update( $arrayToPackage, $lineSeparator ) {

  $data = "\n";
  $data .= model_to_package( $arrayToPackage, $lineSeparator ); 

  return $data;
}


//DECODE
function decode( $filename, $arraySeparator ) {

  $data = file_get_contents( $filename );
  $array = explode( $arraySeparator , $data );
    
  return $array;
}
