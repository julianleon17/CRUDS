<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php');
  
  //Tema sobre el que trata ej: (sigular)Arbol, (plural)Arboles
  $pluralTheme = 'Carros';
  $singularTheme = 'Carro';


  $template = file_get_contents("../templates/template.tpl");
  $filename = "../" . $pluralTheme . ".db";

  $allArray = array();
  $fileExists = false;

  $searchTo = "Marca :";
  $arraySeparator = ",";
  $lineSeparator = "</br>";

  // [ 'code' => "%CODE%", 'name' => "%NAME%" ]
  $dictionaryTemplate = [ "%PLACA%", "%MARCA%", "%MODELO%" , "%COLOR%" , "%PRECIO%" ];  //Comodines del template
  
  //Campos de los datos estructurados
  $dictionaryData = [ 
    'placa' => 'text',
    'marca' => 'text',
    'modelo' => 'text',
    'color' => 'text',
    'precio' => 'number'
  ];


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

  $pack  = $array['placa'] . "$lineSeparator\n";
  $pack .= $array['marca'] . "$lineSeparator\n";
  $pack .= $array['modelo'] . "$lineSeparator\n";
  $pack .= $array['color'] . "$lineSeparator\n";
  $pack .= $array['precio'] . "$lineSeparator\n";

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


