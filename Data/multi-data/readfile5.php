<?php
	$data = file_get_contents('baseDatos2.db');
	$pedidos = explode( ',', trim($data) );

	$cantidadPedidos = count($pedidos);
	
	/*=========================
	 *			Functions
	 *=========================*/
	
	$pedido;
	
	function extractData($key){
		//Mirar linea por linea cada pedido
		
		global $pedidos;
		global $pedido;
		$numUser = $pedidos[$key];
		
		$pedido = explode( "</br>", $numUser );
		$pedido = preg_replace("[Nombre :|Telefono :|Pedido :|</br>]","",$pedido);
		//print_r($pedido) . "\n";
		
		$numDatos = 3;
		echo "\n\n\n============Usuario Número ($key) \n";
		for($i = 0; $i < $numDatos; $i ++){
			echo "\n" .$pedido[$i] . "\n";
		}	
	}
	
	
	
	/*=========================
	 *			Execute
	 *=========================*/
	
	$num = readLine("Que usuario deseas ver? : \n");
	
	if( $num < $cantidadPedidos ){
		extractData($num);
	}else{
		echo "Solo hay $cantidadPedidos clientes contando desde 0 
		
		
		\n";
		$num = readLine("Que usuario deseas ver? : \n");
		extractData($num);
	}
	
	
	
/*==========================================Ejemplos Templates==============================================*/	

/*
$template = file_get_contents("show.template");

$text = str_replace( "%NAME%", $pedido[0], $template );
$text = str_replace( "%TEL%", $pedido[1], $text );
$text = str_replace( "%PED%", $pedido[2], $text );





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
