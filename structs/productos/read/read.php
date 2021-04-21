<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php'); 
  
  
  $filename = "../productos.db";
  $template = file_get_contents("../templates/producto.template");
  
  $data = null;
  $products = array();
  $fileExists = false;
  $tema = 'Producto';
  
  $dictionaryTemplate = [ "%NAME%", "%DESC%", "%PRC%" ];  //Comodines del template
  $dictionaryData = [ 'name', 'description' , 'price' ];  //Campos de los datos estructurados 
  $toDelete = "[Name :|Description :|Price :]";  //Lo que se debe limpiar (La basura)



  if ( file_exists( $filename ) ) {
    $fileExists = true;
    $data = file_get_contents( $filename );
    $array = explode("," , $data );
    
    $totalData = count( $array ) - 1;
     
    $products = $array;
  }
