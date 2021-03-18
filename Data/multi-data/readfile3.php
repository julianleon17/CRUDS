<?php
  $datosRaw = file_get_contents( 'baseDatos2.db' );
  $datos = explode( '<julian>', $datosRaw );

  echo str_replace( '<julian>', '', $datosRaw );
  print_r( $datos );



