<?php

/*======================================================================================================================================================
 *
 *                                                        F   U   N   C   T   I   O   N   S
 *
 *======================================================================================================================================================*/
																		


/*==================================================================
 *                 SIRVE DE FORMA GLOBAL (Otras estructuras)
 *==================================================================*/




         //Crear un nuevo dato

function create_data( $data , $filename , $message='' ) {

  if ( file_exists( $filename ) ) {
  
    $oldData = file_get_contents($filename);
    $oldData .= $data; 
    file_put_contents($filename, $oldData);
        
  } else {
  
    file_put_contents($filename, $data);    
    
  }
  echo $message;
}

      

         //Eliminar un dato específico
      
function delete_data( $array, $key, $filename, $arraySeparator, $message='' ){

	unset( $array[ $key ] );
			
	$array = array_values( $array );
      
	update_Base( $array, $filename, $arraySeparator, $message );
}



           //Sobre escribir la base de datos

function update_Base( $newData, $filename, $arraySeparator, $message='' ) {

	$array = $newData;
	$newData = implode( $arraySeparator, $array );
	
	if( file_exists($filename) ) {
			
		file_put_contents( $filename, $newData);
		
		echo $message;
	
	}else{
		echo "No existe.\n";
	}
}




          //Extrae los datos del objeto que se pida y devuelve un array asociativo
            
function extract_data( $array, $key, $dictionaryData, $toDelete, $lineSeparator ){

  $dataFields = [];  
 
  $array = $array[ $key ];
	
	
	$arrayFields = explode( $lineSeparator , $array );
	$arrayFields = preg_replace( $toDelete , "" , $arrayFields );

	$numFields = count($arrayFields) - 1;
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $dataFields[ $dictionaryData[ $i ] ] = $arrayFields[ $i ];
	}

	return $dataFields;
}



             //Retornar el template de los datos recien creados y actualizados

function return_data_on_template( $array , $template , $dictionaryTemplate , $dictionaryData ) {
  
  $numFields = count( $array );
  for ( $i = 0; $i < $numFields; $i++ ) {
	  $template	= str_replace( $dictionaryTemplate[$i] , $array[ $dictionaryData[$i] ] , $template );
  }

  return $template;
}





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
  
  $search = array( "#", "$", "%", "&", "(", ")", ",", "<", ">", "[", "]", "{", "}" );
  $replace = array("&#35;", "&#36;", "&#37;", "&#38;", "&#40;", "&#41;", "&#44;", "&#60;", "&#62;", "&#91;", "&#93;", "&#123;", "&#125;" );
  
  $searchSize = count( $search );

  for ( $i = 0; $i < $arraySize; $i++ ) {
      
    for ( $j = 0; $j < $searchSize; $j++ ) {
      
      $array[ $dictionaryData[$i] ] = str_replace( $search[$j] , $replace[$j] , $array[ $dictionaryData[$i] ] );
    }
  }

  return $array;
}

/*
    

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

    foreach ( $disctionary as $key => $value ) {
      $array[ $dictionaryData[$i] ] = str_replace( $key , $value , $array[ $dictionaryData[$i] ] );
    }

*/


/**============================================================================================================
 *                                            B    A    S    U    R    A   
 *=============================================================================================================*/ 

function extract_data_on_template( $array , $key , $template , $dictionaryTemplate , $toDelete ) {
   
  $product = $array[$key];
	$productFields = explode( "</br>" , $product );
	$productFieldsData = preg_replace( $toDelete , "" , $productFields ); // Sanitize Fields
  
	$numFields = count( $productFieldsData );
	$idProduct = $key + 1;
	
	$template = str_replace( "DATOS DEL PRODUCTO", "DATOS DEL PRODUCTO ( $idProduct )" , $template );
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $template = str_replace( $dictionaryTemplate[ $i ], $productFieldsData[ $i ], $template );
	}
	return $template;
}






