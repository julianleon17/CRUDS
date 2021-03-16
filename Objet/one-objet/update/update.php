<?php

require_once('../read/read.php');

$data = $_POST['new-dato'];


if ( file_exists( $filename ) ) {
    $oldData = file_get_contents($filename);
    $oldData = $data;
    file_put_contents($filename, $oldData, $FILE_APPEND);
    echo 'El dato fue actualizado con exito :D';
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