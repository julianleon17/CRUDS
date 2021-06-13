<?php

/*======================================================================================================================================================
 *
 *                                                        F   U   N   C   T   I   O   N   S
 *
 *======================================================================================================================================================*/


  //Eliminar un dato específico

  function delete_data( $allArray, $id, $arraySeparator ){

    unset( $allArray[ $id ] );

    $newAllArray = array_values( $allArray );

    update_data( $newAllArray, $filename, $arraySeparator );
  }



  //Sobre escribir la base de datos

  function update_data( $newData, $filename, $arraySeparator ) {

    $array = $newData;
    $newData = implode( $arraySeparator, $array );
    
    if( file_exists($filename) ) {
        
      file_put_contents( $filename, $newData);   
    }else{
      
    }
  }



  //Extrae los datos del objeto que se pida y devuelve un array asociativo

function extract_data( $dictionaryData, $allArray, $id, $lineSeparator ){

  $toReturn = [];  
  $toExtract = $allArray[ $id ];
  $arrayFields = explode( $lineSeparator, $toExtract );
  // $numFields = count($arrayFields) - 1;
  $i = 0;

  foreach ( $dictionaryData as $key => $content ) {
	
	$toReturn[ $key ] = $arrayFields[ $i ]; 
    $i++;
  }

  return $toReturn;
}




  //Retornar el template de los datos recien creados y actualizados

function return_data_on_template( $extractedData, $urlTemplate, $wildcards ) {

  $template = file_get_contents( $urlTemplate );

  $numFields = count( $extractedData );
  $toReturn = $template;

  foreach ( $extractedData as $key => $value ) {
	$toReturn = str_replace( $wildcards[ $key ], $value, $toReturn );
  }

  return $toReturn;
}



/*

  //Imprime una lista de todo lo que existe en la base de datos linea por linea, (searchTo)=Bucar por, ej: buscar por "Name :" (subject)=Para saber que se busca, ej: carro o pedido

  function print_list( $filename, $totalData, $searchTo, $pluralTheme, $singularTheme ) {

    echo "<h2>~~~ " . $pluralTheme . " encontrados " . $totalData . " ~~~</h2> </br><hr>";

    $handle = fopen( $filename , "r" );
    $num = 1;
    $id = 0;

    while( ( $line = fgets( $handle ) ) !== false ) {

      if( strpos( $line , $searchTo ) !== false ) {

        $line = str_replace( $searchTo , "<b>$singularTheme ($num) : </b>" , $line );

        $line .= "</br><li class='verMas'>";
        $line .= "<a href='show.php?id=" . $id . "'> Ver más </a>";
        $line .= "</li> </br> <hr>";   

        echo $line;

        $id += 1;
        $num += 1;
      }
    }

    fclose( $handle );
  }




  //Saneamiento de los datos del cliente para crear y actualizar

  function sanitize_data( $array, $dictionaryData ) {
    
    $arraySize = count( $array );
    
    $cleanUp = array( 
      "$" => "&#36;", 
      "%" => "&#37;", 
      "&" => "&#38;", 
      "(" => "&#40;", 
      ")" => "&#41;", 
      "," => "&#44;", 
      "<" => "&#60;", 
      ">" => "&#62;", 
      "[" => "&#91;", 
      "]" => "&#93;", 
      "{" => "&#123;",
      "}" => "&#125;",
    );
    
    for ( $i=0; $i <$arraySize ; $i++ ) { 
      
      foreach( $cleanUp as $search => $replace ){
    
        $array[ $dictionaryData[$i] ] = str_replace( $search , $replace , $array[ $dictionaryData[$i] ] );
      }
    }
    
    return $array;
  }
*/


/*DISTINTAS FORMAS EN LAS QUE SE PUEDE LIMPIAR LA INFORMACIÓN

  Forma de sanitizar 1=====================

  for( $i = 0; $i < $arraySize; $i++ ){
    $array[ $dictionaryData[$i] ] = str_replace( "#" , "&#35;" , $array[ $dictionaryData[$i] ] );
    $array[ $dictionaryData[$i] ] = str_replace( "$" , "&#36;" , $array[ $dictionaryData[$i] ] );
    $array[ $dictionaryData[$i] ] = str_replace( "%" , "&#37;" , $array[ $dictionaryData[$i] ] );
    $array[ $dictionaryData[$i] ] = str_replace( "&" , "&#38;" , $array[ $dictionaryData[$i] ] );
    $array[ $dictionaryData[$i] ] = str_replace( "(" , "&#40;" , $array[ $dictionaryData[$i] ] );
    $array[ $dictionaryData[$i] ] = str_replace( ")" , "&#41;" , $array[ $dictionaryData[$i] ] );
    $array[ $dictionaryData[$i] ] = str_replace( "," , "&#44;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( "<" , "&#60;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( ">" , "&#62;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( "[" , "&#91;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( "]" , "&#93;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( "{" , "&#123;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( "}" , "&#125;" , $array[ $dictionaryData[$i] ] );    
    $array[ $dictionaryData[$i] ] = str_replace( "php" , "&#112;&#104;&#112;" , $array[ $dictionaryData[$i] ] );    
  }



  Forma de sanitizar 2=====================

  $search = array( "#",        "$",    "%",    "&",      "(",     ")",     ",",     "<",     ">",     "[",     "]",     "{",      "}"    );
  $replace = array("&#35;", "&#36;", "&#37;", "&#38;", "&#40;", "&#41;", "&#44;", "&#60;", "&#62;", "&#91;", "&#93;", "&#123;", "&#125;" );
  
  $searchSize = count( $search );


  for ( $i = 0; $i < $arraySize; $i++ ) {
      
    for ( $j = 0; $j < $searchSize; $j++ ) {
      
      $array[ $dictionaryData[$i] ] = str_replace( $search[$j] , $replace[$j] , $array[ $dictionaryData[$i] ] );
    }
  }


  Forma de sanitizar 3====================

  $cleanUp = array( 
    "#" => "&#35;", 
    "$" => "&#36;", 
    "%" => "&#37;", 
    "&" => "&#38;", 
    "(" => "&#40;", 
    ")" => "&#41;", 
    "," => "&#44;", 
    "<" => "&#60;", 
    ">" => "&#62;", 
    "[" => "&#91;", 
    "]" => "&#93;", 
    "{" => "&#123;",
    "}" => "&#125;"
  );
  
  for ( $i=0; $i <$arraySize ; $i++ ) { 
    
    foreach( $cleanUp as $search => $replace ){
  
      $array[ $dictionaryData[$i] ] = str_replace( $search , $replace , $array[ $dictionaryData[$i] ] );
    }
  }
*/


 /*==================================================================
  *                 SIRVE DE FORMA GLOBAL (Otras estructuras)
  *==================================================================*/


  //Crear un nuevo dato

  function create_data( $data, $filename ) {

    if ( file_exists( $filename ) ) {
    
      $oldData = file_get_contents($filename);
      $oldData .= $data; 
      file_put_contents($filename, $oldData);

    } else {

      file_put_contents($filename, $data);    
    }
  }




/**============================================================================================================
 *                                            B    A    S    U    R    A   
 *=============================================================================================================


*/





