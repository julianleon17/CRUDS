<?php

require_once('../read/read.php');

if ( file_exists($filename) == false )  {
    echo $mensaje;
}else{
    echo "<form action='update.php' method='POST'>

    <p><b>Nuevo Dato:</b> <input type='text' placeholder='Su Nuevo Dato' name='new-dato'> </p>
    <br>

    <input type='submit' value='Enviar' >
    <input type='reset' value='Borrar' >
    <br>    
</form>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizando...</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
</head>
<body>
    
<div class='menu' >
    <ul>
        <div class='opcion' >
            <li> <a href='../index.html'> Volver al Inicio </a> </li>
        </div>
    </ul>
</div>

</body>
</html>