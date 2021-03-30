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
    (1)Ver Usuarios\n
    (2)Seleccionar Un Usuario\n
    (3)Decir 'Que util' :D\n
    (4)Salir \n=====================================
";




/***************
 * Funciones
 ***************/


function mostrar($variable){

  global $filename;
  $handle = fopen($filename, "r" );

  
  if ( $handle ) {
    $numDatos = 0;
  
    while( ( $line = fgets($handle) ) !== false ) {
      // process the line read.
      if ( strpos( $line, "Nombre :" ) !== false ) {
      
    	$line = preg_replace("[Nombre :|</br>]","",$line);
        echo "$numDatos Usuario : " . $line . "\n";
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

/**************
 * Ejecuciones
 **************/

if( file_exists( $filename ) == true ){
  
  do{
    
    echo $menuOpciones;
    $opcion = readline("Elige tu opción \n");
    

    switch( $opcion ){
      
      case 1:
        $variable = $dato[0];
        mostrar($variable);
      break;
      
      case 2:
        $variable = $dato[1];
        mostrar($variable);
      break;
      
      case 3:
        echo 'Que Util! :D';
      break;
      
      case 4:
        echo "Gracias por usar \n";
      break;

      default:
      echo "Opcion Invalida \n";
    }
      
     
  }while( $opcion != 4 );
  
}else{
  echo $mensaje . "\n";
}


/*===================================CANASTA

					//Otra forma de sacar limpios los datos
    //$pos1 = 8;
    //$pos2 = ( strpos( $line, "\n" ) - strlen( $line ) );
    //echo "$numDatos Usuario : " . trim( substr( $line, $pos1, $pos2 ) ) . "\n";
*/
