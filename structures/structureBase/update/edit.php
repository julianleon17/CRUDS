<?php
  require_once( "../boot.php" );
  require_once( $reference_path . "/read/read.php" );

  $id = $_GET['id'];

//===============

create_header_of_page( "Editar $singularTheme", $styles );

  if ( $fileExists ) {

    if ( $id > ( $totalData - 1 ) ) {

	  echo $singularTheme . ' NO existente!' ;    
	  create_button( "../index.php" , 'Volver al Inicio' );
    }else{

      echo '<h1> Edit '. $singularTheme .'</h1>';

	  $extractedData = extract_data( $dictionaryData, $allArray, $id, $lineSeparator );
      $form = build_the_form( "upDAte", array( "action" => "update.php?id=$id", "method" =>"POST" ),  $dictionaryData, $extractedData );

      echo $form;

	  create_button( "../read/show.php?id=$id", 'Cancelar' );
    }
  }else{

    create_button( "../index.php" , 'Volver al Inicio' );
  }

create_footer_of_page();
