<?php
  
  $pluralTheme = 'Clientes';
  $singularTheme = 'Cliente';
    
  
  //==================View :
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de <?php echo $pluralTheme ?> </title>

    <link rel="stylesheet" href="../../CSS/styles.css">
</head>
<body>
    <h1>Restaurante Nalaska</h1>
    <p>(Multiples Structs)</p>
    <p>Bienvenido al restaurante Nalaska - Administrador de <?php echo $pluralTheme ?> </p>

    <div class="menu" >
        <div class="opcion" >
            <ul>
                <li> <a href="create/new.php">Crear <?php echo $singularTheme ?> </a> </li> 
            </ul>
        </div>

        <div class="opcion" >
            <ul>
                <li> <a href="read/list.php">Listado de <?php echo $pluralTheme ?> </a> </li> 
            </ul>
        </div>

        <div class="opcion" >
            <ul>
                <li> <a href="../index.html"> Volver al inicio </a> </li> 
            </ul>
        </div>
    </div>
</body>
</html>
