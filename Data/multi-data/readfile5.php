<?php
	$data = file_get_contents('baseDatos2.db');
	$pedidos = explode( ',', trim($data) );

	$cantidadPedidos = count($pedidos);

	print_r($pedidos);


	$pedido = explode( "\n",  $pedidos[0]   );

	//print_r($pedido[0] . "\n");
  
/*==========================================Ejemplos Templates==============================================*/	

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
  echo $texto;

	
	//Listar Todos los Pedidos Con for
	//for ( $i = 0; $i < $cantidadPedidos; $i++ ){
	//}

	
	
	
	
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
