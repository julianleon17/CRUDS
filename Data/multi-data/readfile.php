<?php
  $handle = fopen( 'baseDatos2.db', 'r' );

  if ( $handle ) {
    $numDatos = 0;

    while( ( $line = fgets( $handle ) ) !== false ) {
      // process the line read.
      if ( strpos( $line, 'Nombre :' ) !== false ) {
        $numDatos += 1;
        echo $line;
      }
    }

    if ( $numDatos > 0 ) {
      echo $numDatos . ' Encontrados.' . "\n";
    } else {
      echo 'No se encontraron datos.';
    }
    
    fclose( $handle );
  } else {
    // error opening the file.
    echo 'Error abriendo la base de datos';
  }
