<?php

  $dir = './';
  $dirs = scandir( $dir );

// Carpetas para ignorar ( Black List )
$ignoreDirs = [
  '.',
  '..',
  'pedidos',
  'clientes',
  'productos',
  'structureBase',
  'libraries',
  //'celulares'
];


$listOfStructures = '';

foreach ( $dirs as $key => $value ) {

  if ( in_array( $value, $ignoreDirs ) ) {
    continue;
  }else{

    if ( is_dir( $value ) ) {

      $folder = scandir( $value );

      if ( count( $folder ) <= 2 ) {
        system( "cd structureBase;cp -r . ../$value/" );
        system( "chgrp -R www-data $value/" );
      }



      $listOfStructures .= '
      <div class="opcion" >
        <ul>
          <li> <a href="'. $value .'">Administrar '. ucfirst( $value ) .'</a> </li>
        </ul>
      </div>' . "\n";
    }
  }
}


//print_r( $dirs );


// system( 'cd structureBase;cp -r . ../prueba/' );
// system( 'chgrp -R www-data prueba/' );
// system( 'ls -l' );



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

    <link rel="stylesheet" href="../CSS/styles.css">

</head>
<body>
    <h1>STRUCTS</h1>

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
