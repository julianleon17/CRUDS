<?php
require_once("../read/read.php");

$pedido = $_POST['pedido'];
$nombre = filter_var( $_POST['nombre'] );
$telefono = filter_var( $_POST['celular'] );

$id = $_GET['id'];

$datos = "\nNombre : \"$nombre\" </br>\nTelefono : $telefono </br>\nPedido : $pedido</br>\n";
	
	
	leerBase();
	
	$pedidos[$id] = $datos;
	
	$pedidos = array_values($pedidos);
	
	sobre_escribir_Base($pedidos);


$template = "../templates/pedido.template";

$template = file_get_contents($template);

$template = str_replace("%NAME%" , $nombre , $template);
$template = str_replace("%TEL%" , $telefono , $template);
$template = str_replace("%PED%" , $pedido , $template);

echo $template;


/*=====================
 *		Functios
 *=====================*/
 
function sobre_escribir_Base($newData){

	global $filename;
	
	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ){
			
		file_put_contents( $filename, $newData);
		
			
		echo "</br></br> Actualizado correctamente.\n";
		
	}else{
		echo "No existe.\n";
	}
}



function leerBase(){

	global $filename;
	global $pedidos;
	
	$data = file_get_contents($filename);
	$pedidos = explode("," , $data );
	
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizado</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
</head>
<body>

        <div class="menu" >
            <div class="opcion" >
	            <ul>
                    <li> <a href="../index.html"> Volver al Inicio </a> </li>
    	        </ul>
            </div>
        </div>
        
</body>
</html>
