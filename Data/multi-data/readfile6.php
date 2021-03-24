<?php

require_once( './read/read.php' );
$filename = './baseDatos2.db';


$dato = array(
  'Nombre :',
  'Telefono :',
  'Pedido :'
);

$menuOpciones = "
    \n
    MENU\n
    (1)Ver Clientes\n
    (2)Salir \n=====================================
";




/***************************************************************************
 * 								Funciones								   *
 ***************************************************************************/
 

						//Opciones principales  "LISTAR USUARIOS"

function mostrar(){

  global $filename;
  $handle = fopen($filename, "r" );

  
  if ( $handle ) {
    $numDatos = 0;
  
    while( ( $line = fgets($handle) ) !== false ) {
      // process the line read.
      if ( strpos( $line, "Nombre :" ) !== false ) {
      
    	$line = preg_replace("[Nombre :|</br>]","",$line);
        echo "($numDatos) Cliente : " . $line . "\n";
        $numDatos += 1;
      }
    }
  
    if ( $numDatos > 0 ) {
      echo "\n" . $numDatos . " Encontrados. \n";
    } else {
      echo 'No se encontraron datos.';
    }
    
    fclose( $handle );
  } else {
    // error opening the file.
    echo 'Error abriendo la base de datos' . "\n";
  }
}




								//Saco cada pedido limpio
	
$data;
						
function elegirUser(){

	global $filename;
	global $data;

	$pregunta = readLine("Deseas Ver Un Cliente? y/n : ");
        
    if($pregunta == "y"){
    
		$numUser = readLine("Elige el Número del Cliente : \n");

		$data = file_get_contents($filename);
		$pedidos = explode( ',', trim($data) );
		$pedidos = preg_replace("[</br>]", " ", $pedidos);
	
		echo "\n\n" . "Usuario Número ( $numUser ) \n" . $pedidos[$numUser];
        
    }else{
    
    }
	
}



/***************************************************************************
 * 								Ejecuciones                                  *
 ***************************************************************************/



if( file_exists( $filename ) == true ){
  
  do{
    
    echo $menuOpciones;
    $opcion = readline("Elige tu opción \n");
    

    switch( $opcion ){
      
      case 1:
        mostrar();
		elegirUser();
      break;
      
      case 2:
        echo "Gracias por usar \n";
      break;

      default:
      echo "Opcion Invalida \n";
    }
      
     
  }while( $opcion != 2 );
  
}else{
  echo $mensaje . "\n";
}
