<?php
  $handle = fopen( 'baseDatos2.db', 'r' );

  if ( $handle ) {
    $datos = [];
    $dato = '';
    $numDatos = 0;

    while( ( $line = fgets( $handle ) ) !== false ) {
      // process the line read.
      if ( ( strpos( $line, 'Nombre :' ) !== false ) || ( strpos( $line, 'Telefono :' ) !== false ) || ( strpos( $line, 'Pedido :' ) !== false ) ) {
        if ( strpos( $line, 'Nombre :' ) !== false ) {
          $numDatos += 1;
          $dato = '';
        }

        $dato .= $line;

        if ( strpos( $line, 'Pedido :' ) !== false ) {
          array_push( $datos, $dato );
        }
      }
    }

    if ( $numDatos > 0 ) {
      echo $numDatos . ' Encontrados.';
      print_r( $datos );
    } else {
      echo 'No se encontraron datos.';
    }
    
    fclose( $handle );
  } else {
    // error opening the file.
    echo 'Error abriendo la base de datos';
  }

