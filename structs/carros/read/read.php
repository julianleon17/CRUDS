<?php
  require_once( '../settings.php' );
  include('../libraries/functions.php');
  include('../libraries/helpers.php');

  $filename = "../" . strtolower( $pluralTheme ) . ".db";
  $urlTemplate = "../templates/template.tpl";
  $allArray = array();
  $fileExists = false;
  $arraySeparator = ",";
  $lineSeparator = "\n";

  $wildcards = create_default_wildcards( $dictionaryData );  //Comodines del template

  if ( $modifyTemplate ) {
	if ( !( file_exists( $urlTemplate ) ) ) {
      $template = create_default_template( $wildcards, $singularTheme, $urlTemplate );
	  file_put_contents( $urlTemplate, $template );
    }
  }else{
	if ( !( file_exists( $urlTemplate ) ) ) {
      $template = create_default_template( $wildcards, $singularTheme, $urlTemplate );
	  file_put_contents( $urlTemplate, $template );
    }
    else if ( file_exists( $urlTemplate ) ) {
	  $oldTemplate = file_get_contents( $urlTemplate );
	  $newTemplate = create_default_template( $wildcards, $singularTheme, $urlTemplate );
	  file_put_contents( $urlTemplate, $newTemplate );
    }
  }

  if ( !( file_exists( $urlTemplate ) ) ) {
    $template = create_default_template( $wildcards, $singularTheme, $urlTemplate );
	file_put_contents( $urlTemplate, $template );
  }/*
  else if ( file_exists( $urlTemplate ) ) {
	$oldTemplate = file_get_contents( $urlTemplate );
  }*/

//==================================
  //Indica si el archivo existe o no

  if ( file_exists( $filename ) ) {

    $fileExists = true;

    $allArray = decode( $filename );

    $totalData = count( $allArray ) - 1;
  }


//===================================================================
  //Model to pack up
function model_to_package( $arrayToPackage ) {
  //Es como se guardará la información, su orden
  global $lineSeparator;

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
function package_to_create( $arrayToPackage ) { 
  
  global $arraySeparator;

  $data = model_to_package( $arrayToPackage );
  $data .= $arraySeparator . "\n";

  return $data;
}


//PACK UP TO UPDATE
function package_to_update( $arrayToPackage ) {

  $data = "\n";
  $data .= model_to_package( $arrayToPackage ); 

  return $data;
}


//DECODE
function decode( $filename ) {

  global $arraySeparator;

  $data = file_get_contents( $filename );
  $array = explode( $arraySeparator , $data );
    
  return $array;
}