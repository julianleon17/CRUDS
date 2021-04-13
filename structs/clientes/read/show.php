<?php

require_once("read.php");

$template = file_get_contents("../templates/cliente.template");

							//Extraer los datos del cliente y lo retorna sobre el template

function extractClientData_on_Template( $array , $key , $template ) {

  $dictionary = [ "%NAME%", "%TEL%", "%EMAIL%", "%ADR%" ];

  $clients = $array;
  $client = $clients[$key];

	$clientFields = explode( "</br>" , $client );
	$clientFieldsData = preg_replace( "[Nombre :|Telefono :|Email :|Direccion :]" , "" , $clientFields ); // Sanitize Fields

	$numFields = count( $clientFieldsData );
	$idCliente = $key + 1;
	
	$template = str_replace( "DATOS DEL CLIENTE", "DATOS DEL CLIENTE ( $idCliente )" , $template );
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $template = str_replace( $dictionary[ $i ], $clientFieldsData[ $i ], $template );
	}
	
	return $template;
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
    	
    	$template = extractClientData_on_Template( $clients , $id , $template );		
    	
    	echo $template;
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
