<?php
  require_once( "../boot.php" );
  require_once( $reference_path . "/read/read.php" ); // Model

  $id = $_GET[ 'id' ];
  $objectExists = false;

//=================View :

create_header_of_page( "Datos $singularTheme" );

  if ( !$fileExists ) {

    echo 'El archivo de ' . $pluralTheme . ' NO existe! ';  	
  }else{

    if ( !( $id > ( $totalData - 1 ) ) ) {
      $objectExists = true;
      $extractedData = extract_data( $dictionaryData, $allArray, $id, $lineSeparator );
      $template = return_data_on_template( $extractedData, $pathTemplate, $wildcards );

      echo $template;
    }else{
      echo $singularTheme . ' NO existente!' ;
    }
  }


  //Valida los botones
  if ( !$objectExists ){  

  }else{
    create_button( "/update/edit.php?id=$id" , 'Editar' ); 
    create_button( "/delete/confirm-object.php?id=$id" , 'Eliminar' , 'delete'); 
  } 

  create_button( "/read/list.php" , 'Volver al Listado' );

create_footer_of_page();
