<?php

require_once("../read/read.php");

$template = file_get_contents("../templates/cliente.template");

    $data = file_get_contents( $filename );
    $clients = explode(',' , $data );

							//Extraer los datos de cada cliente
		

function extractData($key){
	//Mirar linea por linea cada cliente
	
	global $clients;
	global $template;
	
  $numUser = $clients[$key];
	
	$client = explode( "</br>" , $numUser );
	$client = preg_replace("[Nombre :|Telefono :|Email :|Direccion :]" , "" , $client);

	$numDatos = count($client);
	$idCliente = $key + 1;
	
	for($i = 0; $i < $numDatos; $i ++){
	
		if( $i == 0 ){
			$template = str_replace( "%NAME%", $client[$i], $template );
		}
		
		if( $i == 1 ){
			$template = str_replace( "%TEL%", $client[$i], $template );
		}
			
		if( $i == 2 ){
			$template = str_replace( "%EMAIL%", $client[$i], $template );
		}
		
		if( $i == 3 ){
			$template = str_replace( "%ADR%", $client[$i], $template );
		}
	}
	
	$template = str_replace( "DATOS DEL CLIENTE" , "DATOS DEL CLIENTE ( $idCliente )" , $template );
	
	echo $template ;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
    
<style>

.delete {
    color: white;
    background-color: red;
}


.top-options{
	margin:auto;
	float:center;
}

</style>

</head>
<body>
    
    <?php 
    
    	$id = $_GET['id'];
    	
    	extractData($id);		
    ?>

    <div class="menu" >
        
        <div class="opcion" >
            <ul class="top-options" >
                <li > <a href="../update/edit.php?id=<?php echo $id; ?>" > Editar </a> </li>
            </ul>
        </div>
        
        <div class="opcion" >
            <ul class="top-options">
                <li > <a class="delete" href="../delete/confirm-user.php?id=<?php echo $id; ?>" > Eliminar </a> </li>
            </ul>
        </div>

        <div class="opcion" >
            <ul>
                <li> <a href="list.php"> Volver a la Lista </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>
