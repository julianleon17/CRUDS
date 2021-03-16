<?php

require_once('../read/read.php');

if ( file_exists($filename) ) {
    unlink($filename);
    echo 'El dato fue eliminado con exito';
}else{
    echo $mensaje;
}

?>

<link rel="stylesheet" href="../../../CSS/styles.css">

<div class="menu" >
    <ul>
        <div class="opcion" >
            <li> <a href="../index.html"> Volver al Inicio </a> </li>
        </div>
    </ul>
</div>