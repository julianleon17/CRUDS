<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php');
  include('../libraries/forms.php');
    
  $filename = "../clientes.db";
  $template = file_get_contents("../templates/cliente.template");
  
  $allArray = array();
  $fileExists = false;
  
  //Tema sobre el que trata ej: (sigular)Arbol, (plural)Arboles
  $pluralTheme = 'Clientes';
  $singularTheme = 'Cliente';
    
  $searchTo = "Name :";
  $arraySeparator = ",";
  $lineSeparator = "</br>";

  $dictionaryTemplate = [ "%NAME%", "%PHONE%", "%EMAIL%", "%DIRECTION%" ];  //Comodines del template
  $dictionaryData = [ 'name', 'phone', 'email', 'direction' ];  //Campos de los datos estructurados 
  $toDelete = "[Name :|Phone :|Email :|Direction :]";  //Lo que se debe limpiar (La basura)


//===================================================================
  //Model to pack up
function model_to_package( $array ) {
  
  global $searchTo;
  global $lineSeparator;
  global $arraySeparator;

  $pack = $searchTo . $array['name'] . "$lineSeparator\n";
  $pack .= "Phone :" . $array['phone'] . "$lineSeparator\n";
  $pack .= "Email :" . $array['email'] . "$lineSeparator\n";
  $pack .= "Direction :" . $array['direction'] . "$lineSeparator\n";

  return $pack;
}


//PACK UP TO CREATE
function package_to_create( $array ) { 
  
  global $arraySeparator;

  $data = model_to_package( $array );
  $data .= "$arraySeparator\n";

  return $data;
}


//PACK UP TO UPDATE
function package_to_update( $array ) {

  $data = model_to_package( $array );
  $data = "\n" . $data; 

  return $data;
}


//DECODE
function decode( $filename ) {

  global $arraySeparator;

  $data = file_get_contents( $filename );
  $array = explode( $arraySeparator , $data );

  return $array;
}
//========================================================================


if ( file_exists( $filename ) ) {

  $fileExists = true;

  $allArray = decode( $filename );

  $totalData = count( $allArray ) - 1;
}

