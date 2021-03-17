<?php

require_once('../read/read.php');

$telefono = $_POST['celular'];
$pedido = $_POST['pedido'];
$nombre = $_POST['nombre'];

$orden = "<h1>SU PEDIDO</h1></br><b>Nombre :</b> $nombre</br></br> <b>Telefono :</b> $telefono</br></br> <b>Pedido :</b> $pedido</br>";

$data = "Nombre : $nombre </br>\nTelefono : (57)$telefono </br>\nPedido : $pedido</br></br></br><hr> \n\n";


if ( file_exists( $filename ) ) {
    $mensaje;
}else{
    file_put_contents($filename, $data);  
    $mensaje = 'El pedodo fue realizado exitosamente ;)';  
}

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
    <p> <?php echo $mensaje; ?> </p>
    
    <div class="menu" >
        <ul>
            <div class="opcion" >
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </div>
        </ul>
    </div>
</body>
</html>