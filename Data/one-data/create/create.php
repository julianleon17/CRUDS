<?php

$data = $_POST['dato'];

$dato = "<h1>SU DATO</h1></br><b>Dato : $data</b> </br></br>";

require_once('../read/read.php');

if (file_exists($filename)) {
    $mensaje;
}else{
    file_put_contents($filename, $data);    
    $mensaje = 'El dato fue creado exitosamente';
}


?>    

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando...</title>
    <link rel="stylesheet" href="../../../CSS/styles.css">

</head>

<p> <?php echo $dato; ?> </p>
<p> <?php echo $mensaje;  ?> </p>

<div class="menu" >
    <ul>
        <div class="opcion" >
            <li> <a href="../index.html"> Volver al Inicio </a> </li>
        </div>
    </ul>
</div>
