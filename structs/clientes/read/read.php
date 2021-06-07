<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php');
  include('../libraries/forms.php');
  
  //Tema sobre el que trata ej: (sigular)Arbol, (plural)Arboles
  $pluralTheme = 'Clientes';
  $singularTheme = 'Cliente';


  $template = file_get_contents("../templates/template.tpl");
  $filename = "../" . $pluralTheme . ".db";

  $allArray = array();
  $fileExists = false;

  $searchTo = "name :";
  $arraySeparator = ",";
  $lineSeparator = "</br>";

  // [ 'code' => "%CODE%", 'name' => "%NAME%" ]
  $dictionaryTemplate = [ "%NAME%", "%PHONE%", "%AGE%" , "%EMAIL%" ];  //Comodines del template
  $dictionaryData = [ 'name', 'phone', 'age' , 'email' ];  //Campos de los datos estructurados 
  $toDelete = "[name :|phone :|age :|email :]";  //Lo que se debe limpiar (La basura)


//=================================================================== 
//Indica si el archivo existe o no

  if ( file_exists( $filename ) ) {

    $fileExists = true;

    $allArray = decode( $filename );

    $totalData = count( $allArray ) - 1;
  }


//===================================================================
  //Model to pack up
function model_to_package( $array ) {

  //Es como se guardará la información, su orden
  global $lineSeparator;

  $pack = "name :" . $array['name'] . "$lineSeparator\n";
  $pack .= "phone :" . $array['phone'] . "$lineSeparator\n";
  $pack .= "age :" . $array['age'] . "$lineSeparator\n";
  $pack .= "email :" . $array['email'] . "$lineSeparator\n";

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


