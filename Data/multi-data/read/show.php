<?php

require_once("../read/read.php");

if ( file_exists($filename) ) {
    $data = file_get_contents( $filename );
    
	$template = file_get_contents( "../templates/pedido.template" );
		
		
		
		/*
								//Extraer los datos de cada pedido
			
	$pedidos = explode( "," , $data )
			
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
/*==========================================================================================================*/


    $clientes = str_replace(",","</br> <ul class='verMas'> <li> <a href='#'>Ver más</a> </li> </ul>  </br><hr>",$data);	

    
}else{
    $clientes = $mensaje;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
    
<style>

.delete a{
    color: white;
    background-color: red;
}

.verMas{
	list-style: none;
}

.verMas a{
	text-decoration: none;
}

.verMas a:hover{
	color: blue;
	font-size: 15px;
}

</style>

</head>
<body>
    <h1>Historial de Pedidos</h1>
    <?php echo $clientes; ?>

    <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </ul>
        </div>

        <?php
            if ( file_exists($filename) ) {
                echo "
                <div class='opcion' >
                    <ul>
                        <li class='delete' > <a  href='../delete/delete.php'> Eliminar Historial </a> </li>    
                    </ul>
                </div>        
                ";
            }
        ?>
    </div>
</body>
</html>
