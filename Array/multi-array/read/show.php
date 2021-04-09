<?php

require_once("../read/read.php");

$template = file_get_contents("../templates/pedido.template");

    $data = file_get_contents( $filename );
    $pedidos = explode(',' , $data );
    
	$totalClientes = (count($clientes) - 1) . " Clientes encontrados. </br></br>";



							//Extraer los datos de cada pedido
		

		
$pedido;
	
function extractData($key){
	//Mirar linea por linea cada pedido
	
	global $pedidos;
	global $pedido;
	global $template;
	
	$numUser = $pedidos[$key];
	
	$pedido = explode( "</br>" , $numUser );
	$pedido = preg_replace("[Nombre :|Telefono :|Pedido :]" , "" , $pedido);

	$numDatos = count($pedido);
	$idCliente = $key + 1;
	
	echo "Cliente Número ($idCliente) ";
	
	for($i = 0; $i < $numDatos; $i ++){
	
		if( $i == 0 ){
			$template = str_replace( "%NAME%", $pedido[$i], $template );
		}
		
		if( $i == 1 ){
			$template = str_replace( "%TEL%", $pedido[$i], $template );
		}
		
		if( $i == 2 ){
			$template = str_replace( "%PED%", $pedido[$i], $template );
		}
	}	
	echo $template ;
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
                <li> <a href="list.php"> Volver al Historial </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>
