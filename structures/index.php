<?php

  $dirToScan = './settings';
  $directories = scandir( $dirToScan );

$listOfStructures = '';

foreach ( $directories as $key => $controller ) {

  if ( !( is_dir( $controller ) ) ) { // is_file

    $controller = str_replace( '.php', '', $controller ); // basename

    $listOfStructures .= '
      <div class="opcion" >
        <ul>
          <li> <a href="structureBase?controller='. $controller .'">Administrar '. ucfirst( $controller ) .'</a> </li>
        </ul>
      </div>
    ' . "\n";
  }
}

/*
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRUCTS</title>

    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    <h1>STRUCTURES</h1>

    <div class="menu" >

        <?php echo $listOfStructures; ?>

        <div class="opcion" >
            <ul>
                <li> <a href="../"> Regresar </a> </li>
            </ul>
        </div>

    </div>
</body>
</html>
