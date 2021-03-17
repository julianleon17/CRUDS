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

            <p><b>Nombre del Cliente:</b> <input type='text' placeholder='Su Nombre' name='nombre'> </p>
            <p><b>Número Celular:</b> <input type='number' placeholder='Número de celular' name='celular'> </p>
            <br>
            
            <p> <b>Pedido:</b>  
                <br> 
                <br> 
            
                <input type='radio' name='pedido' id='Hamburguesa'  value='Hamburguesa'> 
                <label for='Hamburguesa'>Hamburguesa</label>
                <br>
                <br>
    
                <input type='radio' name='pedido' id='Platano'  value='Platano'>  
                <label for='Platano'>Platano</label>
                <br>
                <br>
    
                <input type='radio' name='pedido' id='PerroFrito'  value='Perro Frito'> 
                <label for='PerroFrito'>Perro Frito</label>
                <br>
                <br>
    
                <input type='radio' name='pedido' id='GatoFrito'  value='Gato Frito'> 
                <label for='GatoFrito'>Gato Frito</label>
                <br>
                <br>
            </p>
    
            <input type='submit' value='Enviar' >
            <input type='reset' value='Borrar' >
            <br>    
    
            </form>        
            ";
        }
        ?>

<div class='menu' >
    <div class='opcion' >
        <ul>
            <li> <a href='../index.html'> Volver al Inicio </a> </li>
        </ul>
    </div>
</div>
</body>
</html>