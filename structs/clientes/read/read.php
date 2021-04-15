<?php
  include('../libraries/libraryFunctions.php');
  
  
  $filename = "../clientes.db";
  $data = null;
  $clients = array();
  $fileExists = false;

  if ( file_exists( $filename ) ) {
    $fileExists = true;
    $data = file_get_contents( $filename );
    $array = explode("," , $data );
    
    $totalData = count( $array ) - 1;
     
    $clients = $array;
  }
