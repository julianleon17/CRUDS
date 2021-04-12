<?php

$pedido = $_POST['pedido'];
$nombre = filter_var( $_POST['nombre'] , FILTER_SANITIZE_STRING );
$telefono = filter_var( $_POST['celular'] , FILTER_SANITIZE_NUMBER_INT );



$data = "Nombre : $nombre </br>\nTelefono : $telefono </br>\nPedido : $pedido</br> \n,\n";


$filename = "../baseDatos.db";

if ( file_exists( $filename ) ) {
	
	echo ;
}else{
    file_put_contents($filename, $data);    
}


					/*========Template=========*/


$template = file_get_contents("../templates/pedido.template");

$orden = str_replace( "%NAME%", $nombre, $template );
$orden = str_replace( "%TEL%", $telefono, $orden );
$orden = str_replace( "%PED%", $pedido, $orden );

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../CSS/styles.css">

</head>
<body>
    <p> <?php echo $orden; ?> </p>
    <p>Tu pedido ha sido realizado ;)</p>
    
    <div class="menu" >
        <ul>
            <div class="opcion" >
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </div>
        </ul>
    </div>
</body>
</html>
