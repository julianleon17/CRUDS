<?php

require_once('../read/read.php');
$telefono = $_POST['celular'];
$pedido = $_POST['pedido'];
$nombre = $_POST['nombre'];

$orden = "<h1>SU PEDIDO</h1></br><b>Nombre :</b> $nombre</br></br> <b>Telefono :</b> $telefono</br></br> <b>Pedido :</b> $pedido</br>";

$data = "Nombre : $nombre </br>\nTelefono : (57)$telefono </br>\nPedido : $pedido</br></br></br><hr> \n\n";

if ( file_exists( $filename ) ) {
    $oldData = file_get_contents($filename);
    $oldData = $data;
    file_put_contents($filename, $oldData, $FILE_APPEND);
    echo "$orden </br>El dato fue actualizado con exito :D";
}else{
    echo $mensaje;
}

?>

<link rel="stylesheet" href="../../../CSS/styles.css">

<div class="menu" >
    <div class="opcion" >
        <ul>
            <li> <a href="../index.html"> Volver al Inicio </a> </li>
        </ul>
    </div>
</div>