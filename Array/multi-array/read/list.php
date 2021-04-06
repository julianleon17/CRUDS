<?php

require_once("read.php");

if ( file_exists($filename) ) {
    $data = file_get_contents( $filename );
    $clientes = explode("," , $data );
    $totalClientes = (count($clientes) - 1);
	$totalClientes = "<h2>~~~~ Clientes encontrados $totalClientes ~~~~</h2> </br><hr></br>";
		
		
	//$template = file_get_contents( "../templates/pedido.template" );
		
									//Opciones  "LISTAR USUARIOS"
							


	function mostrar(){
	
  	global $filename;
  	$handle = fopen($filename, "r" );
	
  	
  		if ( $handle ) {
    		$numDatos = 1;
    		$id = 0;
  		
    		while( ( $line = fgets($handle) ) !== false ) {
      		// process the line read.
      			if ( strpos( $line, "Nombre :" ) !== false ) {
      			
    				$line = preg_replace("[Nombre :|</br>]","",$line);
        			echo "($numDatos) <b> Cliente :</b> " . $line . "\n</br> <ul class='verMas'> <li> <a href='show.php?id=" . $id . "'>Ver más</a> </li> </ul> <hr> </br>";
        			$numDatos += 1;
        			$id += 1;
      			}
    		}
    		
    		fclose( $handle );
  		} else {
    		// error opening the file.
    		echo 'Error abriendo la base de datos' . "\n";
  		}
	}

				/*================================================================*/
    
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
    
    <?php 
    	
    	if( file_exists($filename) ){
		    echo $totalClientes; 
    		mostrar();
    	}else{
    		echo $mensaje;
    	}
 
    ?>

    <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </ul>
        </div>
    </div>

    <?php
        if ( file_exists($filename) ) {
            echo "
    		<div class='menu' >
	            <div class='opcion' >
    	            <ul>
        	            <li class='delete' > <a  href='../delete/confirm.php'> Eliminar Historial </a> </li>    
            	    </ul>
	            </div>
	        </div>        
            ";
        }
    ?>
        
    
</body>
</html>
