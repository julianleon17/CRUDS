<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php');
  include('../libraries/forms.php');
    
  $filename = "../carros.db";
  $template = file_get_contents("../templates/carros.template");
  
  $allArray = array();
  $fileExists = false;
  
  //Tema sobre el que trata ej: (sigular)Arbol, (plural)Arboles
  $pluralTheme = 'Carros';
  $singularTheme = 'Carro';
    
  $searchTo = "Color :";
  $arraySeparator = ",";
  $lineSeparator = "</br>";
  // [ 'code' => "%CODE%", 'name' => "%NAME%" ]
  $dictionaryTemplate = [ "%PLACA%", "%MARCA%", "%MODELO%" , "%COLOR%" , "%PRECIO%" ];  //Comodines del template
  $dictionaryData = [ 'placa', 'marca', 'modelo' , 'color', 'precio' ];  //Campos de los datos estructurados 
  $toDelete = "[Placa :|Marca :|Modelo :|Color :|Precio :]";  //Lo que se debe limpiar (La basura)


//===================================================================
  //Model to pack up
function model_to_package( $array ) {

  global $lineSeparator;

  $pack = "Placa :" . $array['placa'] . "$lineSeparator\n";
  $pack .= "Marca :" . $array['marca'] . "$lineSeparator\n";
  $pack .= "Modelo :" . $array['modelo'] . "$lineSeparator\n";
  $pack .= "Color :" . $array['color'] . "$lineSeparator\n";
  $pack .= "Precio :" . $array['precio'] . "$lineSeparator\n";

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

