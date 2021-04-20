<?php
  require_once('../read/read.php');
  $id = $_GET[ 'id' ];



  create_header_of_page( 'Cliente Eliminado' );

  if ( $fileExists  ) {
		
    if ( $id > $totalData ) {
    
      echo 'Este cliente NO existe!' ;    
    }else { 
			
			deleteClient( $clients , $id , $filename );
    }
  } else {
    
    echo 'El archivo de "Clientes" NO existe! ';
  }


  create_button( "../read/list.php" , 'Volver al Listado' ); 
?>

