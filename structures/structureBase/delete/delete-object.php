<?php
  require_once( "../boot.php" );
  require_once( $reference_path . "/read/read.php" );

  $id = $_GET[ 'id' ];


//================View :

create_header_of_page( 'Eliminado' );

  if ( $fileExists  ) {
    if ( $id > $totalData ) {

      echo 'Este ' . $singularTheme . ' NO existe!' ;
    }else {

       $extractedData = extract_data( $dictionaryData, $allArray, $id, $lineSeparator );
       echo "$singularTheme $searchTo <b>( $extractedData[$searchTo] )</b> fue eliminado exitosamente";

       delete_data( $allArray, $id, $arraySeparator, $filename );
    }

      create_button( "/read/list.php" , 'Volver al Listado' );
  } else {

    echo 'El archivo de ' . $singularTheme . ' NO existe! ';
    create_button( "/index.php" , "Volver al Inicio" );
  }

create_footer_of_page();
