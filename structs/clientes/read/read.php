<?php
  include('../libraries/library.php');
  
  
  $filename = "../clientes.db";
  $data = null;
  $clients = array();
  $fileExists = false;

  if ( file_exists( $filename ) ) {
    $fileExists = true;
    $data = file_get_contents( $filename );
    $clients = explode("," , $data );
    
    $totalClientes = count($clients) - 1;
  }
