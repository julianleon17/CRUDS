<?php

/*======================================================================================================================================================
 *
 *                                                        F   U   N   C   T   I   O   N   S
 *
 *======================================================================================================================================================*/
																		

							//Extraer los datos del cliente y lo retorna sobre el template

function extractClientData_on_Template( $array , $key , $template ) {

  $dictionary = [ "%NAME%", "%TEL%", "%EMAIL%", "%ADR%" ];

  $client = $array[$key];

	$clientFields = explode( "</br>" , $client );
	$clientFieldsData = preg_replace( "[Nombre :|Telefono :|Email :|Direccion :]" , "" , $clientFields ); // Sanitize Fields

	$numFields = count( $clientFieldsData );
	$idCliente = $key + 1;
	
	$template = str_replace( "DATOS DEL CLIENTE", "DATOS DEL CLIENTE ( $idCliente )" , $template );
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $template = str_replace( $dictionary[ $i ], $clientFieldsData[ $i ], $template );
	}
	
	return $template;
}

           //Eliminar un cliente

function deleteClient( $array , $key , $filename ){

			$client = $array[ $key ];
			$client = explode( "</br>" , $client );
			$client = str_replace( "Nombre :" , "" , $client );
			$client = $client[0];	
			
			echo "</br></br>El Cliente ( <b>$client</b> ) fue eliminado con éxito.";

			unset( $array[ $key ] );
			
			$array = array_values( $array );
      
			update_Base( $array , $filename );
}





          //Extrae los datos del cliente y devuelve un array asociativo. Estos son los campos del array devuelto : ('name', 'phone', 'email', 'address')
            
function extractClientData( $array , $key ){

  $dictionary = [ 'name', 'phone', 'email', 'address' ];
  $dataFields = [];  
    
  $clients = $array;
  $client = $clients[ $key ];
	
	$clientFields = explode( "</br>" , $client );
	$clientFieldsData = preg_replace( "[Nombre :|Telefono :|Email :|Direccion :]" , "" , $clientFields );

	$numFields = count($clientFieldsData);
	$idCliente = $key + 1;
	
	for ( $i = 0; $i < $numFields; $i++ ) {
	  $dataFields[ $dictionary[ $i ] ] = $clientFieldsData[ $i ];
	}

	return $dataFields;
}





//Imprime una lista de todo lo que existe en la base de datos linea por linea, (searchTo)=Bucar por, ej: buscar por "Name :" (subject)=Para saber que se busca, ej: carro o pedido
          
  // Controller          
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
       
function sanitize_dataClient( $client ) {

    $client['name'] = filter_var( $client[ 'name' ] , FILTER_SANITIZE_STRING );
    $client[ 'phone' ] = filter_var( $client[ 'phone' ] , FILTER_SANITIZE_NUMBER_INT );
    $client = str_replace( "," , "" , $client );

    return $client;
}




         //Imprimir el template de los datos recien creados y actualizados
         
function print_Data_on_Template( $array , $template ) {

  $template = file_get_contents( $template );

  $dictionaryTemplate = [ "%NAME%", "%TEL%", "%EMAIL%", "%ADR%" ];
  $dictionaryData = [ 'name', 'phone', 'email', 'address' ];
  
  $numFields = count( $array );
  
  for ( $i = 0; $i < $numFields; $i++ ) {
	  $template	= str_replace( $dictionaryTemplate[ $i ] , $array[ $dictionaryData[ $i ] ] , $template );
  }

  echo $template;
}













		/*BASURA
// printClientData
// echoClientData
// getClientData
// extractAndRaturnClientData
// extractClientData( $param1, $param2, $param3 )
// extractClientData( $args )
// $arg[ 'param1' ]
// $arg[ 'param2' ]
// $arg[ 'param3' ]
// $arg[ 'param4' ]
// extractClientData( $clients[ $key ], $template = '' )
*/
