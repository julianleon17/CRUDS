<?php

$filename = "../clientes.db";
$mensaje;

if ( file_exists( $filename ) ) {

    $mensaje = "(El archivo ya existe)";
    
}else{

    $mensaje = "(El archivo no existe)";
}

?>
