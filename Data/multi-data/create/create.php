<?php

$nombre = $_POST['nombre'];
$telefono = $_POST['celular'];
$pedido = $_POST['pedido'];

$template = file_get_contents("../templates/pedido.template");

$orden = str_replace( "%NAME%", $nombre, $template );
$orden = str_replace( "%TEL%", $telefono, $orden );
$orden = str_replace( "%PED%", $pedido, $orden );

$data = "Nombre : $nombre </br>\nTelefono : (57)$telefono </br>\nPedido : $pedido</br> \n,\n";


$filename = "../baseDatos.db";

if ( file_exists( $filename ) ) {
    $oldData = file_get_contents($filename);
    $oldData .= $data; 
    file_put_contents($filename, $oldData, $FILE_APPEND);
}else{
    file_put_contents($filename, $data);    
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
