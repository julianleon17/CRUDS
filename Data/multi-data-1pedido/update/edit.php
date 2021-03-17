<?php

require_once('../read/read.php');

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
    <?php

        if( file_exists($filename) ){
            $oldData = file_get_contents($filename);

            echo "
            <b>Pedido existente</b></br></br>
            $oldData </hr>
            <form action='update.php' method='POST'>
        
            <p><b>Nuevo Nombre del Cliente:</b> <input type='text' placeholder='Su Nombre' name='nombre'> </p>
            <p><b>Nuevo Número Celular:</b> <input type='number' placeholder='Número de celular' name='celular'> </p>
            <br>

            <p> <b>Nuevo Pedido:</b>  
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
        }else{
            $mensaje = '(El pedido aún no existe)';
            echo $mensaje;
        }
    ?>   
    
    <div class='menu' >
    <ul>
        <div class='opcion' >
            <li> <a href='../index.html'> Volver al Inicio </a> </li>
        </div>
    </ul>
</div>
</body>
</html>

