<?php
  require_once('../read/read.php');
  $id = $_GET[ 'id' ];


//================View :

  create_header_of_page( 'Eliminado' );

  if ( $fileExists  ) {
		
    if ( $id > $totalData ) {
    
      echo 'Este ' . $singularTheme . ' NO existe!' ;    
    }else { 
    
			$singleField = extract_data( $allArray, $id, $dictionaryData, $toDelete );
			$name = $singleField['name'];

			delete_data( $allArray , $id , $filename , "$singularTheme <b>( $name )</b> fue eliminado exitosamente" );
    }
    
      create_button( "../read/list.php" , 'Volver al Listado' ); 
  } else {
    
    echo 'El archivo de ' . $singularTheme . ' NO existe! ';
    create_button( "../index.php" , "Volver al Inicio" );
  }


?>

