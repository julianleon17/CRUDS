<?php

require_once( '../read/read.php' );
$filename = './baseDatos2.db';

	$data = file_get_contents($filename);
	$pedidos = explode( ',', trim($data) );

	$cantidadPedidos = count($pedidos);
	
$menuOpciones = "
    \n
    MENU\n
    (1)Ver Clientes\n
    (2)Salir \n=====================================
";


/*==============================================
 *                    Templates
 *==============================================*/	

$template = file_get_contents("show.template");

/*============================================================================================
 *													Functions
 *=============================================================================================*/


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




							//Extraer los datos de cada pedido
		
		
$pedido;
	
function extractData($key){
	//Mirar linea por linea cada pedido
	
	global $pedidos;
	global $pedido;
	global $text;
	global $template;
	
	$numUser = $pedidos[$key];
	
	$pedido = explode( "</br>", $numUser );
	$pedido = preg_replace("[Nombre :|Telefono :|Pedido :|</br>]","",$pedido);
	//print_r($pedido) . "\n";
	
	$numDatos = 3;
	
	echo "\n\n\n============Cliente Número ($key) \n";
	
	for($i = 0; $i < $numDatos; $i ++){
	
		if( $i == 0 ){
			$text = str_replace( "%NAME%", $pedido[$i], $template );
		}
		
		if( $i == 1 ){
			$text = str_replace( "%TEL%", $pedido[$i], $text );
		}
		
		if( $i == 2 ){
			$text = str_replace( "%PED%", $pedido[$i], $text );
		}
	}	
	echo "\n" . str_replace("</br>","",$text) . "\n";
}


							//Elegir usuarios

function elegirUser(){

	global $filename;
	global $data;
	global $cantidadPedidos;

	$pregunta = readLine("Deseas Ver Un Cliente? y/n : ");
        
    if($pregunta == "y"){
    
		$num = readLine("Que usuario deseas ver? : \n");
	
		if( $num < $cantidadPedidos ){
			extractData($num);   
    	}else{
			echo "Solo hay $cantidadPedidos clientes contando desde 0 \n";
			$num = readLine("Que usuario deseas ver? : \n");
			extractData($num);
		}
	}else{
	
	}
}


	
	
	
/*=============================================================================================
 *												Execute
 *=============================================================================================*/
	
	
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
