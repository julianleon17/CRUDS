<?php
  include('../libraries/functions.php');
  include('../libraries/helpers.php'); 
  
  
  $filename = "../productos.db";
  $template = file_get_contents("../templates/producto.template");
  
  $allArray = array();
  $fileExists = false;
  
  //Tema sobre el que trata ej: (sigular)Arbol,(plural)Arboles
  $pluralTheme = 'Productos';
  $singularTheme = 'Producto';
  
  
  $searchTo = 'Name :';
  $dictionaryTemplate = [ "%NAME%", "%PRC%" , "%DESC%" ];  //Comodines del template
  $dictionaryData = [ 'name', 'price' , 'description' ];  //Campos de los datos estructurados 
  $toDelete = "[Name :|Description :|Price :]";  //Lo que se debe limpiar (La basura)



  if ( file_exists( $filename ) ) {
    $fileExists = true;
    $data = file_get_contents( $filename );
    $array = explode("," , $data );
    
    $totalData = count( $array ) - 1;
     
    $allArray = $array;
  }

