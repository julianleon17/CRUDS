<?php

$filename = "../baseDatos.db";

$mensaje;

if ( file_exists( $filename ) ) {
    $mensaje = " (El pedido ya existe)";
}else{
    $mensaje = " (El pedido aún no existe)";
}

?>