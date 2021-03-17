<?php  

require_once('../read/read.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacer Pedido</title>

    <link rel="stylesheet" href="../../../CSS/styles.css">
</head>
<body>
    <?php 
    
        if( file_exists($filename) ){
            echo $mensaje;
        }else{
            echo "
            <form action='create.php' method='POST'>
        
                <p><b>Dato:</b> <input type='text' placeholder='Su Dato' name='dato'> </p>
                <br>
        
                <input type='submit' value='Enviar' >
                <input type='reset' value='Borrar' >
                <br>    
        
            </form>
            ";
        }
    
    ?>
    
    <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al Inicio </a> </li>
            </ul>
        </div>
    </div>
</body>
</html>