<?php
  require_once('../read/read.php');
  $id = $_GET[ 'id' ];


//================View :

  create_header_of_page( 'Eliminado' );

  if ( $fileExists  ) {
		
    if ( $id > $totalData ) {
    
      echo 'Este ' . $singularTheme . ' NO existe!' ;    
    }else { 

        $lines = explode( "\n", $allArray[$id] );
        $numLines = count( $lines );
        $line = '';

        for ( $i = 0; $i < $numLines; $i++ ) {
          $line = $lines[ $i ];
  
          if ( strpos( $line , $searchTo ) !== false ) {
              $line = str_replace( $searchTo, "", $line );
              $line = str_replace( "</br>", "", $line );
              break;
          }
        }


       delete_data( $allArray, $id, $filename, $arraySeparator );
       echo "$singularTheme <b>( $line )</b> fue eliminado exitosamente";
    }

      create_button( "../read/list.php" , 'Volver al Listado' ); 
  } else {
    
    echo 'El archivo de ' . $singularTheme . ' NO existe! ';
    create_button( "../index.php" , "Volver al Inicio" );
  }


?>
