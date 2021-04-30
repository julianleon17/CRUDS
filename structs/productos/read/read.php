<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php');
  include('../libraries/forms.php');
    
  $filename = "../productos.db";
  $template = file_get_contents("../templates/producto.template");
  
  $allArray = array();
  $fileExists = false;
  
  //Tema sobre el que trata ej: (sigular)Arbol, (plural)Arboles
  $pluralTheme = 'Productos';
  $singularTheme = 'Producto';
    
  $searchTo = "Name :";
  $arraySeparator = ",";
  $lineSeparator = "</br>";

  $dictionaryTemplate = [ "%NAME%", "%PRC%" , "%DESC%" ];  //Comodines del template
  $dictionaryData = [ 'name', 'price' , 'description' ];  //Campos de los datos estructurados 
  $toDelete = "[Name :|Price :|Description :]";  //Lo que se debe limpiar (La basura)


//===================================================================
  //Model to pack up
function model_to_package( $array ) {
  
  global $searchTo;
  global $lineSeparator;
  global $arraySeparator;

  $pack = $searchTo . $array['name'] . "$lineSeparator\n";
  $pack .= "Price :" . $array['price'] . "$lineSeparator\n";
  $pack .= "Description :" . $array['description'] . "$lineSeparator\n";

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

