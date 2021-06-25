<?php
  require_once( 'settings.php' );
  require_once( '../libraries/helpers.php' );
  
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
    <h1>Administrador de <?php echo $pluralTheme ?></h1>
    <p>(Multiples Structs)</p>

    <?php
      create_button( "create/new.php", "Crear $singularTheme" );
      create_button( "read/list.php", "Listado de $pluralTheme" );
      create_button( "../index.php", "Volver al inicio" );
    ?>

</body>
</html>
