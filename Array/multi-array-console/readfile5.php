<?php

require_once( "read/read.php" );

	$data = file_get_contents($filename);
	$pedidos = explode( ',', trim($data) );

	$cantidadPedidos = count($pedidos);
	


/*==============================================
 *                    Templates
 *==============================================*/	

$template = file_get_contents("show.template");

/*============================================================================================
 *													Functions
 *=============================================================================================*/

							//Opciones Principales MAIN

$opcionesMain = "
    \n
    MENU\n
    Entrar como: \n
    (1)Admin \n
    (2)Cliente \n
    (3)Salir \n=====================================
";
							
$password;
$passwordTrue = "123";				

function main(){

	global $opcionesMain;
	global $password;
	global $passwordTrue;

	do{
  	
  		echo $opcionesMain;
  		$opcion = readline("Elige tu opción \n");
  	
  	switch( $opcion ){
  		
  		case 1:
			$password = getPassword();
  			
  			if( $password == $passwordTrue ){
  				mainAdmin();
  			}else{
  				echo " Contraseña incorrecta \n";
  			}
  				
  		break;
  		
  		case 2:
  			echo "Aún no está disponible \n";
  		break;
  		
  		case 3:
  			echo "Gracias por usar \n";
  			die();
  		break;
  		
  		default:
  		echo "Opcion Invalida \n";
  	}
  	
  }while( $opcion != 3 );
}



								//Obtener contraseña

function getPassword($prompt = "Ingresa Contraseña : ") {
	echo $prompt;

 	system('stty -echo');

  	$password = trim(fgets(STDIN));

	system('stty echo');

   	return $password;
}




					      //Opciones de ADMIN


$opcionesAdmin = "
    \n
       MENU DE ADMIN\n
    (1)Ver Clientes\n
    (2)Salir \n=====================================
";
					   
function mainAdmin(){
	
	global $opcionesAdmin;

	do{
    
    echo $opcionesAdmin;
    $opcion = readline("Elige tu opción \n");
    

    switch( $opcion ){
      
      case 1:
        mostrar();
		elegirUser();
      break;
      
      case 2:
        main();
      break;

      default:
      echo "Opcion Invalida \n";
    }
      
     
  }while( $opcion != 2 );
}



							//Opciones  "LISTAR USUARIOS"
							

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




							//Elegir usuarios

function elegirUser(){

	global $filename;
	global $data;
	global $cantidadPedidos;

	$pregunta = readLine("Deseas Ver Un Cliente? y/n : ");
        
    if($pregunta == "y"){
    
		$num = readLine("Que usuario deseas ver? : \n");
    	
    	if( is_numeric($num) != true){
    		echo "\nSolo números! \n";
    	}else{
    	
			if( $num < $cantidadPedidos ){
				extractData($num);   	
    		}else{
				echo "El cliente número $num no existe \n";
				
				$num = readLine("Que Cliente deseas ver? : \n");
				extractData($num);
			}
    	}
	
		
	}else if($pregunta != "y" && $pregunta != "n" ){
		echo "Opción invalida \n";
		elegirUser();
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

	

					      //Opciones de CLIENTE en proceso


$opcionesClienten = "
    \n
       MENU DE CLIENTE\n
    (1)Ver Clientes\n
    (2)Salir \n=====================================
";
					   
function mainCliente(){
	
	global $opcionesClienten;

	do{
    
    echo $opcionesClienten;
    $opcion = readline("Elige tu opción \n");
    

    switch( $opcion ){
      
      case 1:
        mostrar();
		elegirUser();
      break;
      
      case 2:
        main();
      break;

      default:
      echo "Opcion Invalida \n";
    }
      
     
  }while( $opcion != 2 );
}





	
/*=============================================================================================
 *												Execute
 *=============================================================================================*/
	
	
if( file_exists( $filename ) == true ){
  
  main();
  
}else{
  echo $mensaje . "\n";
}
	
	
	
/*==========================================Ejemplos Templates==============================================*/	

/*

echo $text;



function getTemplate( $templateName ) {
    $template = 'Hola <strong>%NAME%</strong>, ¿Còmo estas? ¿Puedo llamarte %NAME%? o ¿te gustarìa otro nombre?';

	ob_start();
	require_once( $templateName . '.template' );
	$template = ob_get_clean();

	return( $template );
  }

  $template = getTemplate( 'saludo' );

  $texto = str_replace( '%NAME%', $pedido[ 0 ], $template );
  $texto = str_replace( '%ID%', 23, $texto );
  $texto = str_replace( '%ADDRESS%', 'Daniel no se la sabe!', $texto );
  //echo $texto;

	
	//Listar Todos los Pedidos Con for
	//for ( $i = 0; $i < $cantidadPedidos; $i++ ){
	//}

	
*/
	
	
	/*                   BASURA
	
	 	print_r($pedidos);
		print_r( $pedidos );
		echo $pedidos[0] ;	

		foreach( $datos[$i] as $line ){
			echo $line . "\n" ;		
		}

	  . "</br></br>" 
	*/

?>
