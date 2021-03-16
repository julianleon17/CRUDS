<?php
$filename = "../baseDatos.db";
$pedidos = file_get_contents( $filename );
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
        
*{
    text-align: left;
}

h1{
    text-align: center;
}   

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
        <ul>
            <div class="opcion" >
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </div>

            <div class="opcion" >
                <li class="delete" > <a  href="delete-multidata.php"> Eliminar Historial </a> </li>
            </div>
        </ul>
    </div>
</body>
</html>