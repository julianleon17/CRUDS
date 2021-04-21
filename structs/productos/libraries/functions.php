<?php

/*======================================================================================================================================================
 *
 *                                                        F   U   N   C   T   I   O   N   S
 *
 *======================================================================================================================================================*/
																		

       //Saneamiento de los datos del cliente para crear y actualizar
       
function sanitize_data( $array ) {
    
    $array['name'] = filter_var( $array[ 'name' ] , FILTER_SANITIZE_STRING );
    $array[ 'description' ] = str_replace( "," , "&#44;" , $array[ 'description' ] );

    return $array;
}







          //Extrae los datos del producto y devuelve un array asociativo. Estos son los campos del array devuelto : ('name', 'description')
            
function extract_product_data( $array , $key ){

  $dictionary = [ 'name', 'description' , 'price' ];
  $dataFields = [];  
    
  $product = $array[ $key ];
	
	$productFields = explode( "</br>" , $product );
	$productFields[1] = str_replace( "\n" , "</br>" , $productFields[1] );
	$productFieldsData = preg_replace( "[Name :|Description :|Price :]" , "" , $productFields );

	$numFields = count($productFieldsData);
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $dataFields[ $dictionary[ $i ] ] = $productFieldsData[ $i ];
	}

	return $dataFields;
}

             //Imprimir el template de los datos recien creados y actualizados

function print_data_on_template( $array , $template , $dictionaryTemplate , $dictionaryData ) {

  $template = file_get_contents( $template );
  
  
  $numFields = count( $array );
  
  for ( $i = 0; $i < $numFields; $i++ ) {
	  $template	= str_replace( $dictionaryTemplate[ $i ] , $array[ $dictionaryData[ $i ] ] , $template );
  }

  return $template;
}




function print_list( $filename , $totalData , $searchTo , $subject ) {
  
  echo "<h2>~~~ " . $subject . "s encontrados " . $totalData . " ~~~</h2> </br><hr>";
  
  $handle = fopen( $filename , "r" );
  $num = 1;
  $id = 0;
  
  while( ( $line = fgets( $handle ) ) !== false ) {
  
    if( strpos( $line , $searchTo ) !== false ) {
    
      $line = str_replace( $searchTo , "<b>$subject ($num) : </b>" , $line );
      
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



/*==================================================================
 *                 SIRVE DE FORMA GLOBAL
 *==================================================================*/




             //Crear un nuevo dato

function createData( $data , $filename , $message='' ) {

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
      
function deleteData( $array , $key , $filename , $message='' ){

			unset( $array[ $key ] );
			
			$array = array_values( $array );
      
			update_Base( $array , $filename , $message );
}



           //Sobre escribir la base de datos

function update_Base( $newData , $filename , $message='' ) {

	$array = $newData;
	$newData = implode(",", $array);
	
	if( file_exists($filename) ) {
			
		file_put_contents( $filename, $newData);
		
		echo $message;
	
	}else{
		echo "No existe.\n";
	}
}



							//Extraer los datos del producto y lo retorna sobre el template para mostrar (show.php)

function extract_product_data_on_template( $array , $key , $template , $dictionaryTemplate , $toDelete ) {
   
  $product = $array[$key];
	$productFields = explode( "</br>" , $product );
	$productFields[1] = str_replace( "\n" , "</br>" , $productFields[1] );
	$productFieldsData = preg_replace( $toDelete , "" , $productFields ); // Sanitize Fields
  
	$numFields = count( $productFieldsData );
	$idProduct = $key + 1;
	
	$template = str_replace( "DATOS DEL PRODUCTO", "DATOS DEL PRODUCTO ( $idProduct )" , $template );
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $template = str_replace( $dictionaryTemplate[ $i ], $productFieldsData[ $i ], $template );
	}
	return $template;
}




