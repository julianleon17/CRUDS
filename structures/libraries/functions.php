<?php

/*======================================================================================================================================================
 *
 *                                                        F   U   N   C   T   I   O   N   S
 *
 *======================================================================================================================================================*/



  //Imprime una lista de todo lo que existe en la base de datos linea por linea, (searchTo)=Bucar por, ej: buscar por "Name :" (subject)=Para saber que se busca, ej: carro o pedido

  function print_list( $dictionaryData, $allArray, $searchTo, $lineSeparator, $singularTheme ) {

  $size = count( $allArray ) - 1;
  $num = 1;

  for ( $i=0; $i<$size; $i++ ) {
    $dataToList = extract_data( $dictionaryData, $allArray, $i, $lineSeparator );

    $line  = '<hr><b>';
	$line .= $singularTheme . '(' . $num . ') : </b>' . $dataToList[ $searchTo ];
	$line .= '<br>';
    $line .= "</br><li class='verMas'>";
    $line .= "<a href='show.php?id=" . $i . "'> Ver más </a>";
    $line .= "</li>";   

    echo $line;
    $num++;
  }
}



/*
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


  //Eliminar un dato específico

  function delete_data( $allArray, $id, $arraySeparator, $filename ){

    unset( $allArray[ $id ] );

    $newAllArray = array_values( $allArray );

    update_data( $newAllArray, $filename, $arraySeparator );
  }



  //Sobre escribir la base de datos

  function update_data( $data, $filename, $arraySeparator ) {

    $newData = implode( $arraySeparator, $data );

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
  $numFields = count($arrayFields) - 1;
  $i = 0;

  foreach ( $dictionaryData as $key => $content ) {
    $toReturn[ $key ] = $arrayFields[ $i ]; 
    $i++;
  }
  return $toReturn;
}




  //Retornar el template de los datos recien creados y actualizados

function return_data_on_template( $extractedData, $pathTemplate, $wildcards ) {

  $template = file_get_contents( $pathTemplate );

  $numFields = count( $extractedData );
  $toReturn = $template;

  foreach ( $extractedData as $key => $value ) {
	$toReturn = str_replace( $wildcards[ $key ], $value, $toReturn );
  }

  return $toReturn;
}




  //Saneamiento de los datos del cliente para crear y actualizar


  function sanitize_data( $arrayToClean ) {

    // $arraySize = count( $arrayToClean );
    $toReturn = [];
    $cleanUp = array(
      "$" => "&#36;",
      "%" => "&#37;",
      "&" => "&#38;",
      "(" => "&#40;",
      ")" => "&#41;",
      "," => "&#44;",
      "/" => "&#47",
      ";" => "&#59;",
      "<" => "&#60;",
      ">" => "&#62;",
      "@" => "&#64;",
      "[" => "&#91;",
      "]" => "&#93;",
      "{" => "&#123;",
      "}" => "&#125;",
    );

    foreach ( $arrayToClean as $key => $value ) {
	    foreach ( $cleanUp as $search => $replace ) {
	      $arrayToClean[ $key ] = str_replace( $search , $replace , $arrayToClean[ $key ] );
	    }
	  }
    return $arrayToClean;
  }



// Administra la construcción del temmplate, dependiendo de si se desea modificar o no

function build_template_automaty( $modifyTemplate, $wildcards, $singularTheme, $pathTemplate ) {

  if ( $modifyTemplate ) {
	if ( !( file_exists( $pathTemplate ) ) ) {
      $template = create_default_template( $wildcards, $singularTheme, $pathTemplate );
	  file_put_contents( $pathTemplate, $template );
    }
  }else{
	if ( !( file_exists( $pathTemplate ) ) ) {
      $template = create_default_template( $wildcards, $singularTheme, $pathTemplate );
	  file_put_contents( $pathTemplate, $template );

    }
    else if ( file_exists( $pathTemplate ) ) {
      $oldTemplate = file_get_contents( $pathTemplate );
      $newTemplate = create_default_template( $wildcards, $singularTheme, $pathTemplate );

      if ( $oldTemplate != $newTemplate ) {
        file_put_contents( $pathTemplate, $newTemplate );
	  }
    }
  }
}


/**============================================================================================================
 *                                            B    A    S    U    R    A   
 *=============================================================================================================


*/
