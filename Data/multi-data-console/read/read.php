<?php

$filename = "../baseDatos2.db";

$mensaje;

if ( file_exists( $filename ) ) {
    $mensaje = " (El historial ya existe)";
}else{
    $mensaje = " (El historial aún no existe)";
}

?>
