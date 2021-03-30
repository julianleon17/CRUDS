<?php
  $datosRaw = file_get_contents( 'baseDatos2.db' );
  $datos = explode( '<julian>', $datosRaw );
	
  echo $datos[0] ;
  
  
  //echo str_replace( '<julian>', '', $datosRaw );
