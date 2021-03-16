<?php

$filename = "../baseDatos.db";

$mensaje;

if ( file_exists( $filename ) ) {
    $mensaje = " (El dato ya existe, debes editarlo o borrarlo)";
}else{
    $mensaje = " (El dato aún no existe)";
}

?>