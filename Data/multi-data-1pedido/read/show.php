<?php

require_once("../read/read.php");

if ( file_exists($filename) ) {
    $pedidos = file_get_contents( $filename );
}else{
    $pedidos = $mensaje;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
    
<style>

.delete a{
    color: white;
    background-color: red;
}


</style>

</head>
<body>
    <h1>Historial de Pedidos</h1>
    <?php echo $pedidos; ?>

    <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </ul>
        </div>

        <?php
            if ( file_exists($filename) ) {
                echo "
                <div class='opcion' >
                    <ul>
                        <li class='delete' > <a  href='../delete/delete.php'> Eliminar Historial </a> </li>    
                    </ul>
                </div>        
                ";
            }
        ?>
    </div>
</body>
</html>