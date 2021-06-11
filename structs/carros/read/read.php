<?php
  require_once( '../settings.php' );
  //include('../libraries/functions.php');
  include('../libraries/helpers.php');


  $filename = "../" . $pluralTheme . ".db";
  $template = "../templates/template.tpl";
  $allArray = array();
  $fileExists = false;

  $wildcards = create_default_wildcards( $dictionaryData );  //Comodines del template

  if ( !( file_exists( $template ) ) ) {
    $template = create_default_template( $wildcards, $singularTheme, $template );
  }

  $searchTo = "Marca :";
  $arraySeparator = ",";
  $lineSeparator = "</br>";


//==================================
  //Indica si el archivo existe o no

  if ( file_exists( $filename ) ) {

    $fileExists = true;

    $allArray = decode( $filename );

    $totalData = count( $allArray ) - 1;
  }


//===================================================================
  //Model to pack up
function model_to_package( $dictionaryData ) {

  //Es como se guardará la información, su orden
  global $lineSeparator;

  foreach ( $dictionaryData as $key ) {
    $pack .= $dictionaryData[ $key ] . "$lineSeparator\n";
  }

  return $pack;
}


//PACK UP TO CREATE
function package_to_create( $dictionaryData ) { 
  
  global $arraySeparator;

  $data = model_to_package( $dictionaryData );
  $data .= "$arraySeparator\n";

  return $data;
}


//PACK UP TO UPDATE
function package_to_update( $dictionaryData ) {

  $data = model_to_package( $dictionaryData );
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
//print_r( $wildcards );
