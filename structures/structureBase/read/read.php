<?php
  require_once( '../../libraries/loader.php' );

  //============== INICIALIZADORES ====================

  $searchTo = strtolower( $searchTo );

  $filename = "../" . strtolower( $pluralTheme ) . ".db";
  $pathTemplate = "../templates/template.tpl";
  $arraySeparator = "|";
  $lineSeparator = ",";

  $allArray = array();
  $fileExists = false;
  $totalData = -1;

  // Indica si el archivo existe o no
  if ( file_exists( $filename ) ) {

    $fileExists = true;

    $allArray = decode( $filename, $arraySeparator );

    $totalData = count( $allArray ) - 1;
  }

  $wildcards = create_default_wildcards( $dictionaryData );  //Comodines del template

  //============== INICIALIZADORES ====================

  build_template_automaty( $modifyTemplate, $wildcards, $singularTheme, $pathTemplate );
